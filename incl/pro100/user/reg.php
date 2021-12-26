<?php
namespace incl\pro100\User;
use lib\Def as Def;
use lib\Post\Post as Post;
use incl\pro100\Def as DefCab;

class Reg{
    function __construct(){
        $err=0;
        if(Def\Opt::$live_user!=0){//echo'live_user';
            User::exitLogin();//Надо выйти из сессии
            echo json_encode(['err'=>false,'answer'=>DefCab\LangLibPay::ARR_ERR_REG[Def\Opt::$lang]['post_null'],'code'=>2]);
        }else{
            //Довести проверку регистрации $_REQUEST на $_POST
            //Проверить куку mob
            if(!Def\Validator::issetCookie('mob')){$err=1;
                echo json_encode(['err'=>false,'answer'=>DefCab\LangLibPay::ARR_ERR_LOGIN[Def\Opt::$lang]['bad_data'],'code'=>2]);
            }
            if(Post::issetPostKey(['reglog','pass','mail','offer']) && !$err){
                $login=Def\Validator::html_cod($_POST['reglog']);
                $pass=Def\Validator::html_cod($_POST['pass']);
                $mail=Def\Validator::html_cod($_POST['mail']);
                $oferta=Def\Validator::html_cod($_POST['offer']);



                if(strlen($login)<'4'){$err=1;
                    echo json_encode(['err'=>false,'answer'=>DefCab\LangLibPay::ARR_ERR_REG[Def\Opt::$lang]['login_small'],'code'=>2]);
                }elseif(!preg_match("#^[aA-zZ0-9\-_]+$#",$login)){ $err=1;
                    echo json_encode(['err'=>false,'answer'=>DefCab\LangLibPay::ARR_ERR_REG[Def\Opt::$lang]['login_err'],'code'=>2]);
                }
                if(strlen($pass)<'8' && !$err){$err=1;
                    echo json_encode(['err'=>false,'answer'=>DefCab\LangLibPay::ARR_ERR_REG[Def\Opt::$lang]['pass_small'],'code'=>2]);
                }elseif(!preg_match("#^[aA-zZ0-9\-_]+$#",$pass) && !$err){$err=1;
                    echo json_encode(['err'=>false,'answer'=>DefCab\LangLibPay::ARR_ERR_REG[Def\Opt::$lang]['pass_err'],'code'=>2]);}
                if(!$this->is_email($mail) && !$err){$err=1;
                    echo json_encode(['err'=>false,'answer'=>DefCab\LangLibPay::ARR_ERR_REG[Def\Opt::$lang]['mail_err'],'code'=>2]);}
                if(!$oferta && !$err){$err=1;
                    echo json_encode(['err'=>false,'answer'=>DefCab\LangLibPay::ARR_ERR_REG[Def\Opt::$lang]['offer'],'code'=>2]);
                }

                //if(!$err)echo json_encode(['err'=>false,'answer'=>'Test'.$pass,'code'=>2]);

                if(!$err){
                    $DB=new Def\SQLi();
                    //Логин и E-MAIL уникален должен быть
                    //$ulq = mysqli_query($connect_db, "SELECT uid FROM t_users WHERE log ='admin' OR em='zelejoy@ya.ru' LIMIT 2");
                    $res=$DB->arrSQL('SELECT uid,log,em FROM t_users WHERE log ='.$DB->realEscapeStr($login).' OR em='.$DB->realEscapeStr($mail).' LIMIT 2');
                    if($res){
                        //Логини E-MAIL проверка на уникальность
                        if(count($res)>1){
                            //Можно не проверять мыло и юзер заняты
                            echo json_encode(['err'=>false,'answer'=>DefCab\LangLibPay::ARR_ERR_REG[Def\Opt::$lang]['usrmail'],'code'=>2]);
                        }else{
                            foreach($res as $k =>$val){
                                if($val['log']==$login){
                                    echo json_encode(['err'=>false,'answer'=>DefCab\LangLibPay::ARR_ERR_REG[Def\Opt::$lang]['usr_reg'],'code'=>2]);}
                                elseif($val['em']==$mail){
                                    echo json_encode(['err'=>false,'answer'=>DefCab\LangLibPay::ARR_ERR_REG[Def\Opt::$lang]['mail_reg'],'code'=>2]);}
                            }
                        }
                    }else{
                        //Тут продолжить регать юзвера
                        $ref=Def\Validator::issetCookie('referer');
                        //echo '<br>Referal#('.$ref.')<br>';
                        if($ref){
                            //echo '<br>Проверка санкционного листа<br>';
                            //Проверка санкционного листа
                            if(in_array($ref,DefCab\OptCab::$arr_sanction_list)){
                                $ref_id=$this->tree_view();
                                //echo '<br>Referal_id#'.$ref_id.' sanction<br>';
                            }else{
                            $res=$DB->intSQL('SELECT uid,level FROM t_users WHERE log='.$DB->realEscapeStr($ref).' LIMIT 1');
                            $ref_id=($res?$res:$this->tree_view());
                            //echo '<br>Referal_id#'.$ref_id.'<br>';
                            }
                        }else $ref_id=$this->tree_view();
                        //Вставить юзвера
                        $this->insertUser($login,$pass,$ref_id,$mail);
                    }
                }//нет ошибок

                //delete temp echo json_encode(['err'=>false,'answer'=>DefCab\LangLibPay::ARR_ERR_REG[Def\Opt::$lang]['pass_err'],'code'=>2]);
            }//else{echo'error';}
        }

    }

    private function is_email($email){
        return preg_match("/^([a-zA-Z0-9])+([\.a-zA-Z0-9_-])*@([a-zA-Z0-9_-])+(\.[a-zA-Z0-9_-]+)*\.([a-zA-Z]{2,6})$/",$email);
    }
    private function tree_view(){
        if(!DefCab\OptCab::$neo_tree){
            $DB=new Def\SQLi();
            //Определение следующего на очереди
            $res=$DB->arrSQL('SELECT uid AS `druid`, (SELECT COUNT(`uid`) FROM t_users WHERE ref = druid AND level >= 0) as cnt FROM t_users WHERE level > 0 AND uid > '.DefCab\OptCab::MAX_PROMO.' ORDER BY uid ASC');
            //var_dump($res);
            foreach($res as $k =>$val){if($val['cnt']<3){$ref_id=$val['druid'];break;}}
            return $ref_id;
        }else return DefCab\OptCab::$neo_tree;
    }
    private function insertUser($login,$pass,$ref_id=DefCab\OptCab::ID_ADMIN,$mail){
        $DB=new Def\SQLi();
        $pass=md5(md5($pass));
        $ip=Def\Validator::getIp();
        $sql='INSERT INTO t_users (log,pas,ref,dt,ip,lastip,last,em,multi) VALUES (?,?,?,'.time().',?,?,'.time().',?,0)';
        $sql=$DB->realEscape($sql,[$login,$pass,$ref_id,$ip,$ip,$mail]);
        $res=$DB->boolSQL($sql);
        if($res){
            echo json_encode(['err'=>false,'answer'=>DefCab\LangLibPay::ARR_ERR_REG[Def\Opt::$lang]['user_reg'],'code'=>1]);
        }else{
            echo json_encode(['err'=>false,'answer'=>DefCab\LangLibPay::ARR_ERR_REG[Def\Opt::$lang]['post_null'],'code'=>2]);
            //echo json_encode(['err'=>false,'answer'=>$sql,'code'=>7]);
        }
    }
}