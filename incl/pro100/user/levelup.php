<?php
namespace incl\pro100\User;
use lib\Def as Def;
use \incl\pro100\Def as Def100;

class LevelUp{


    public $next_level=1;
    public $arrDBPapa=[];
    public $refs_all=0;
    public $reflist_1='';
    public $reflist_2='';
    public $arrIdLine1=[];
    public $arrIdLine2=[];
    private $DB=null;

    function __construct(){
        if(User::$arrDBUser['level']<=4){//если уровень соответствует диапазону

            $this->next_level=User::$arrDBUser['level']+1;

            //Сделать проверку баланса пользователя
            if(User::$arrDBUser['bal']>=Def100\OptCab::LEVEL_COST[$this->next_level]){
                //баланс соответствует
                $this->DB=new Def\SQLi();
                if($this->next_level==1)$this->firstLine();









            }else{//низкий баланс
                echo json_encode(['err'=>false,'answer'=>Def100\LangLibCabMain::ARR_LEVEL_UP[Def\Opt::$lang]['low_balance'].': $'.User::$arrDBUser['bal']]);
            }
        }else echo json_encode(['err'=>false,'answer'=>Def100\LangLibPay::ARR_ERR_PAY[Def\Opt::$lang]['post_null']]);

    }


    private function firstLine(){


        echo 'класс первая линия';
        echo '<br>***************************************************************';
        echo '<br>***************************************************************';

        if($this->getReferer()){
            //echo $this->arrDBPapa['uid'];
            echo '<br><br>сначала если папа имеет меньше 3 рефералов';
            $res=$this->DB->arrSQL('SELECT uid FROM t_users WHERE ref='.$this->arrDBPapa['uid'].' AND `level`>0 LIMIT 3');
            if(!$res){
                echo '<br><br>У папы нет ни одного ';
                $this->assignFirst();
            }elseif(count($res)<3){
                echo 'регистрируем человека - просто спивав с него деньги, а папе зачислили';
                $this->assignFirst();
            }else{
                echo '<br><br>У папы уже есть три человека';
                foreach ($res as $k =>$val) {
                    $this->reflist_1.=$val['uid'].',';
                    array_push($this->arrIdLine1,$val['uid']);
                    $this->refs_all++;
                }$this->reflist_1=substr($this->reflist_1,0,-1);//Отрезать запятую
                $res=$this->DB->arrSQL('SELECT uid,log,ref,dt FROM t_users WHERE ref IN ('.$this->reflist_1.') AND level >0');
                if(!$res){
                    echo '<br><br>У следующего папы нет ни одного ';
                    $this->arrDBPapa['uid']=$this->arrIdLine1[0];
                    echo '<br><br>У следующего папы id '.$this->arrDBPapa['uid'];

                    $this->assignFirst();
                }elseif(count($res)<9){
                    $u0=0;$u1=0;$u2=0;
                    foreach($res as $k =>$val){
                        if($val['ref']==$this->arrIdLine1[0]){$u0++;
                        }elseif($val['ref']==$this->arrIdLine1[1]){$u1++;
                        }elseif($val['ref']==$this->arrIdLine1[2]){$u2++;}
                    }
                    echo '<br><br><br>$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$****'.$u0.' '.'*****'.$u1.'*******'.$u2.'<br>';
                    if($u0<3){
                        $this->arrDBPapa['uid']=$this->arrIdLine1[0];
                        echo '<br><br>Победил:'.$this->arrDBPapa['uid'].'<br>';
                        $this->assignFirst();
                    }elseif($u1<3){
                        $this->arrDBPapa['uid']=$this->arrIdLine1[1];
                        echo '<br><br>Победил:'.$this->arrDBPapa['uid'].'<br>';
                        $this->assignFirst();
                    }elseif($u2<3){
                        $this->arrDBPapa['uid']=$this->arrIdLine1[2];
                        echo '<br><br>Победил:'.$this->arrDBPapa['uid'].'<br>';
                        $this->assignFirst();
                    }
                }else{//переходим к следующей линии, где ищем детей 9-ти человек
                    //типа 3-я линия
                    echo '<br><br>У папы уже есть девять человек';

                    foreach ($res as $k =>$val) {
                        $this->reflist_2.=$val['uid'].',';
                        array_push($this->arrIdLine2,$val['uid']);
                        $this->refs_all++;
                    }$this->reflist_2=substr($this->reflist_2,0,-1);//Отрезать запятую



                }

                echo '<br>$refs_all - '.$this->refs_all.'<br>'.'<br>$reflist_1 - '.$this->reflist_1.'******************************************************<br>';
                echo '<br>$refs_all - '.$this->refs_all.'<br>'.'<br>$reflist_2 - '.$this->reflist_2.'******************************************************<br>';




            }
        }else{echo json_encode(['err'=>false,'answer'=>Def100\LangLibPay::ARR_ERR_PAY[Def\Opt::$lang]['post_null']]);}
    }


    function getReferer(){
        $this->arrDBPapa=$this->DB->strSQL('SELECT uid,level FROM t_users WHERE uid=' . User::$arrDBUser['ref'] . ' LIMIT 1');
        if($this->arrDBPapa){
            if($this->arrDBPapa['level']>0){return true;}else{
                if($this->updateReferer(Def100\OptCab::ID_ADMIN)){//!!!!!!!!!!!!изменить юзвера нужно в конце, что-бы не пришлось два раза это делать
                    //изменил реф на админа
                    $this->arrDBPapa['uid']=Def100\OptCab::ID_ADMIN;
                        //$this->DB->strSQL('SELECT * FROM t_users WHERE uid='.User::$arrDBUser['ref'].' LIMIT 1');
                    return($this->arrDBPapa?true:false);
                }return false;
            }
        }return false;
    }

    private function updateReferer($id){
        $res=$this->DB->boolSQL('UPDATE `t_users` SET `ref`='.$id.' WHERE uid='.
            User::$arrDBUser['uid'].' LIMIT 1;');
        return($res?true:false);
    }

    private function assignFirst(){
        echo '<br><br>присвоить пользователю первую линию';
    }




}