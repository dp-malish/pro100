<?php
namespace incl\pro100\User;
use lib\Def as Def;
use incl\pro100\Def as DefCab;

class Reg{
    function __construct(){
        $err=0;
        if(Def\Opt::$live_user!=0){echo'live_user';
            User::exitLogin();//Надо выйти из сессии
        }else{
            //Довести проверку регистрации $_REQUEST на $_POST
            //echo 'Level 1 ';

            //Проверить куку mob
            if(isset($_REQUEST['login'])&&isset($_REQUEST['pass'])&& isset($_REQUEST['mail'])&&isset($_REQUEST['oferta'])){
                //echo 'Level 2 ';
                $login=Def\Validator::html_cod($_REQUEST['login']);//Проверку с класса пост брать
                //echo 'Level 3 ';
                $pass=Def\Validator::html_cod($_REQUEST['pass']);//Проверку с класса пост брать
                //echo 'Level 4 ';
                $mail=Def\Validator::html_cod($_REQUEST['mail']);
                //echo 'Level 5 ';
                $oferta=Def\Validator::html_cod($_REQUEST['oferta']);
                //echo 'Level 6 '.$oferta.'<br>';



                if(strlen($login)<'5'){echo 'lsmall';$err=1;}
                elseif(!preg_match("#^[aA-zZ0-9\-_]+$#",$login)){
                    echo 'nologin';$err=1;}
                if(strlen($pass)<'8' && !$err){echo 'psmall';$err=1;}
                elseif(!preg_match("#^[aA-zZ0-9\-_]+$#",$pass) && !$err){
                    echo 'nopass';$err=1;}

                if(!$this->is_email($mail) && !$err){echo 'mail';$err=1;}

                //echo '<br>'.$login.'<br>'.$pass.'<br>'.$mail.'<br>Офёрта '.$oferta;
                if(!$oferta && !$err){echo'offer';$err=1;}

                if(!$err){
                    //echo $oferta.' тут ошибок:'.$err.'<br>';
                    $DB=new Def\SQLi();
                    //Логин и E-MAIL уникален должен быть
                    //$ulq = mysqli_query($connect_db, "SELECT uid FROM t_users WHERE log ='admin' OR em='zelejoy@ya.ru' LIMIT 2");
                    $res=$DB->arrSQL('SELECT uid,log,em FROM t_users WHERE log ='.$DB->realEscapeStr($login).' OR em='.$DB->realEscapeStr($mail).' LIMIT 2');
                    if($res){
                        //Логини E-MAIL проверка на уникальность
                        if(count($res)>1){
                            //Можно не проверять мыло и юзер заняты
                            echo 'usrmail';
                        }else{
                            foreach($res as $k =>$val){
                                if($val['log']==$login){echo'regged';}
                                elseif($val['em']==$mail){echo'usrmail';}
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
            }else{echo'error';}
        }
    }

    private function is_email($email){
        return preg_match("/^([a-zA-Z0-9])+([\.a-zA-Z0-9_-])*@([a-zA-Z0-9_-])+(\.[a-zA-Z0-9_-]+)*\.([a-zA-Z]{2,6})$/",$email);
    }
    private function tree_view(){
        if(!DefCab\OptCab::$neo_tree){
            $DB=new Def\SQLi();
            //Определение следующего на очереди
            $res=$DB->arrSQL('SELECT uid AS `druid`, (SELECT COUNT(`uid`) FROM t_users WHERE ref = druid AND level > 0) as cnt FROM t_users WHERE level > 0 AND uid > '.DefCab\OptCab::MAX_PROMO.' ORDER BY uid ASC');
            //var_dump($res);
            foreach($res as $k =>$val){if($val['cnt']<3){$ref_id=$val['druid'];break;}}
            return $ref_id;
        }else return DefCab\OptCab::$neo_tree;
    }
    private function insertUser($login,$pass,$ref_id,$mail){
        $DB=new Def\SQLi();
        $pass=md5(md5($pass));
        $ip=Def\Validator::getIp();
        $sql='INSERT INTO t_users (log,pas,ref,dt,ip,lastip,last,em,multi) VALUES (?,?,?,'.time().',?,?,'.time().',?,0)';
        $sql=$DB->realEscape($sql,[$login,$pass,$ref_id,$ip,$ip,$mail]);
        $res=$DB->boolSQL($sql);
        echo ($res?1:'error');
        //echo $ref_id.'e4w'.$sql;
    }
}