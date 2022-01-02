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
    public $reflist_3='';
    public $arrIdLine1=[];
    public $arrIdLine2=[];
    public $arrIdLine3=[];
    private $DB=null;

    function __construct(){
        if(User::$arrDBUser['level']<=4){//если уровень соответствует диапазону

            $this->next_level=User::$arrDBUser['level']+1;

            //Сделать проверку баланса пользователя
            if(User::$arrDBUser['bal']>=Def100\OptCab::LEVEL_COST[$this->next_level]){
                //баланс соответствует
                $this->DB=new Def\SQLi();
                if($this->next_level==1)$this->firstLine();
                //Temp
                else echo json_encode(['err'=>false,'answer'=>Def100\LangLibCabMain::ARR_LEVEL_UP[Def\Opt::$lang]['name']]);









            }else{//низкий баланс
                echo json_encode(['err'=>false,'answer'=>Def100\LangLibCabMain::ARR_LEVEL_UP[Def\Opt::$lang]['low_balance'].': $'.User::$arrDBUser['bal']]);
            }
        }else echo json_encode(['err'=>false,'answer'=>Def100\LangLibPay::ARR_ERR_PAY[Def\Opt::$lang]['post_null']]);

    }


    private function firstLine(){

        //echo 'класс первая линия';

        if($this->getReferer()){
            //echo $this->arrDBPapa['uid'];
            if($this->arrDBPapa['uid']==Def100\OptCab::ID_ADMIN){
                //если папа админ
                $this->assignFirst();
            }else{
            //echo '<br><br>сначала если папа имеет меньше 3 рефералов';
            $res=$this->DB->arrSQL('SELECT uid FROM t_users WHERE ref='.$this->arrDBPapa['uid'].' AND `level`>0 LIMIT 3');

            if(!$res){
                //echo '<br><br>У папы нет ни одного ';
                $this->assignFirst();
            }elseif(count($res)<3){/*!!!!!!!!!!!!!!33333333333333333333333!!!!!!!!!!!!!!!!!!*/
                //echo 'регистрируем человека - просто спивав с него деньги, а папе зачислили';
                $this->assignFirst();
            }else{


                //echo '<br><br>У папы уже есть три человека';
                foreach ($res as $k => $val) {
                    $this->reflist_1 .= $val['uid'] . ',';
                    array_push($this->arrIdLine1, $val['uid']);
                    $this->refs_all++;
                }
                $this->reflist_1 = substr($this->reflist_1, 0, -1);//Отрезать запятую
                $res = $this->DB->arrSQL('SELECT uid,log,ref,dt FROM t_users WHERE ref IN (' . $this->reflist_1 . ') AND level >0');
                if (!$res) {
                    //echo '<br><br>У следующего папы нет ни одного ';
                    $this->arrDBPapa['uid'] = $this->arrIdLine1[0];
                    echo '<br><br>У следующего папы id ' . $this->arrDBPapa['uid'];

                    $this->assignFirst();
                } elseif (count($res) < 9) {/*!!!!!!!!!!!!!!9999999999999!!!!!!!!!!!!!!!!!!!!*/
                    $u0=0;$u1=0;$u2=0;
                    foreach($res as $k=>$val){
                        if($val['ref']==$this->arrIdLine1[0]){
                            $u0++;
                        }elseif($val['ref']==$this->arrIdLine1[1]){
                            $u1++;
                        }elseif($val['ref']==$this->arrIdLine1[2]){
                            $u2++;
                        }
                    }
                    //echo '<br><br><br>$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$****' . $u0 . ' ' . '*****' . $u1 . '*******' . $u2 . '<br>';
                    if ($u0 < 3) {
                        $this->arrDBPapa['uid'] = $this->arrIdLine1[0];
                        //echo '<br><br>Победил:' . $this->arrDBPapa['uid'] . '<br>';
                        $this->assignFirst();
                    } elseif ($u1 < 3) {
                        $this->arrDBPapa['uid'] = $this->arrIdLine1[1];
                        //echo '<br><br>Победил:' . $this->arrDBPapa['uid'] . '<br>';
                        $this->assignFirst();
                    } elseif ($u2 < 3) {
                        $this->arrDBPapa['uid'] = $this->arrIdLine1[2];
                        //echo '<br><br>Победил:' . $this->arrDBPapa['uid'] . '<br>';
                        $this->assignFirst();
                    }
                } else{



                    //переходим к следующей линии, где ищем детей 9-ти человек
                    //типа 3-я линия
                    //echo '<br><br>У папы уже есть девять человек';
                    foreach ($res as $k => $val) {
                        $this->reflist_2 .= $val['uid'] . ',';
                        array_push($this->arrIdLine2, $val['uid']);
                        $this->refs_all++;
                    }
                    $this->reflist_2 = substr($this->reflist_2, 0, -1);//Отрезать запятую
                    $res = $this->DB->arrSQL('SELECT uid,log,ref,dt FROM t_users WHERE ref IN (' . $this->reflist_2 . ') AND level >0');
                    if (!$res) {
                        //echo '<br><br>У следующего папы (9 чел) нет ни одного ';
                        $this->arrDBPapa['uid'] = $this->arrIdLine2[0];
                        //echo '<br><br>У следующего папы id ' . $this->arrDBPapa['uid'];

                        $this->assignFirst();
                    }elseif(count($res) < 27){
                        //echo '<br>если меньше чем 27 человек';
                        $u0 = 0;$u1 = 0;$u2 = 0;$u3 = 0;$u4 = 0;$u5 = 0;$u6 = 0;$u7 = 0;$u8 = 0;
                        foreach ($res as $k => $val) {
                            if($val['ref']==$this->arrIdLine2[0]){
                                $u0++;
                            } elseif ($val['ref'] == $this->arrIdLine2[1]) {
                                $u1++;
                            }elseif($val['ref']==$this->arrIdLine2[2]){
                                $u2++;
                            }elseif($val['ref']==$this->arrIdLine2[3]){
                                $u3++;
                            }elseif($val['ref']==$this->arrIdLine2[4]){
                                $u4++;
                            }elseif($val['ref']==$this->arrIdLine2[5]){
                                $u5++;
                            }elseif($val['ref']==$this->arrIdLine2[6]){
                                $u6++;
                            }elseif($val['ref']==$this->arrIdLine2[7]){
                                $u7++;
                            }elseif($val['ref']==$this->arrIdLine2[8]){
                                $u8++;
                            }
                        }

                        //echo '<br><br><br>$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$****' . $u0 . ' ' . '*****' . $u1 . '*******' . $u2 .' ******' . $u3 . '******' . $u4 . '******' . $u5 . '******' . $u6 . '******' . $u7 . '******' . $u8 . '<br>';

                        if ($u0 < 3) {
                            $this->arrDBPapa['uid'] = $this->arrIdLine2[0];
                            //echo '<br><br>Победил:' . $this->arrDBPapa['uid'] . '<br>';
                            $this->assignFirst();
                        } elseif ($u1 < 3) {
                            $this->arrDBPapa['uid'] = $this->arrIdLine2[1];
                            //echo '<br><br>Победил:' . $this->arrDBPapa['uid'] . '<br>';
                            $this->assignFirst();
                        } elseif ($u2 < 3) {
                            $this->arrDBPapa['uid'] = $this->arrIdLine2[2];
                            //echo '<br><br>Победил:' . $this->arrDBPapa['uid'] . '<br>';
                            $this->assignFirst();
                        }elseif ($u3 < 3) {
                            $this->arrDBPapa['uid'] = $this->arrIdLine2[3];
                            //echo '<br><br>Победил:' . $this->arrDBPapa['uid'] . '<br>';
                            $this->assignFirst();
                        }elseif ($u4 < 3) {
                            $this->arrDBPapa['uid'] = $this->arrIdLine2[4];
                            //echo '<br><br>Победил:' . $this->arrDBPapa['uid'] . '<br>';
                            $this->assignFirst();
                        }elseif ($u5 < 3) {
                            $this->arrDBPapa['uid'] = $this->arrIdLine2[5];
                            //echo '<br><br>Победил:' . $this->arrDBPapa['uid'] . '<br>';
                            $this->assignFirst();
                        }elseif ($u6 < 3) {
                            $this->arrDBPapa['uid'] = $this->arrIdLine2[6];
                            //echo '<br><br>Победил:' . $this->arrDBPapa['uid'] . '<br>';
                            $this->assignFirst();
                        }elseif ($u7 < 3) {
                            $this->arrDBPapa['uid'] = $this->arrIdLine2[7];
                            //echo '<br><br>Победил:' . $this->arrDBPapa['uid'] . '<br>';
                            $this->assignFirst();
                        }elseif ($u8 < 3) {
                            $this->arrDBPapa['uid'] = $this->arrIdLine2[8];
                            echo '<br><br>Победил:' . $this->arrDBPapa['uid'] . '<br>';
                            $this->assignFirst();
                        }

                    }else{
                        //echo '<br><br>переходим к следующей линии, где ищем 27-мь человек<br>';
                        //типа 3-я линия
                        //---------------------------------------------
                        //---------------------------------------------
                        //---------------------------------------------
                        //типа 3-я линия
                        foreach ($res as $k => $val) {
                            $this->reflist_3 .= $val['uid'] . ',';
                            array_push($this->arrIdLine3, $val['uid']);
                            $this->refs_all++;
                        }
                        $this->reflist_3 = substr($this->reflist_3, 0, -1);//Отрезать запятую

                        $this->levelOne27users();
                    }


                }

                /*echo '<br>$refs_all - ' . $this->refs_all . '<br>' . '<br>$reflist_1 - ' . $this->reflist_1 . '******************************************************<br>';
                echo '<br>$refs_all - ' . $this->refs_all . '<br>' . '<br>$reflist_2 - ' . $this->reflist_2 . '******************************************************<br>';
                echo '<br>$refs_all - ' . $this->refs_all . '<br>' . '<br>$reflist_3 - ' . $this->reflist_3 . '******************************************************<br>';*/


            }
            }
        }else{echo json_encode(['err'=>false,'answer'=>Def100\LangLibPay::ARR_ERR_PAY[Def\Opt::$lang]['post_null']]);}
    }

    private function levelOne27users(){
        $res = $this->DB->arrSQL('SELECT uid,log,ref,dt FROM t_users WHERE ref IN (' . $this->reflist_3 . ') AND level >0');
        if (!$res) {
            //echo '<br><br>У следующего папы (27 чел) нет ни одного ';
            $this->arrDBPapa['uid'] = $this->arrIdLine3[0];
            //echo '<br><br>У следующего папы id ' . $this->arrDBPapa['uid'];

            $this->assignFirst();
        }
        elseif(count($res)<81){
            //echo '<br>если меньше чем 81 человек';
            $u0 = 0;$u1 = 0;$u2 = 0;$u3 = 0;$u4 = 0;$u5 = 0;$u6 = 0;$u7 = 0;$u8 = 0;
            $u9 = 0;$u10 = 0;$u11 = 0;$u12 = 0;$u13 = 0;$u14 = 0;$u15 = 0;$u16 = 0;$u17=0;
            $u18 = 0;$u19 = 0;$u20 = 0;$u21 = 0;$u22 = 0;$u23 = 0;$u24 = 0;$u25 = 0;$u26=0;
            foreach ($res as $k => $val) {
                if($val['ref']==$this->arrIdLine3[0]){
                    $u0++;
                } elseif ($val['ref'] == $this->arrIdLine3[1]) {
                    $u1++;
                }elseif($val['ref']==$this->arrIdLine3[2]){
                    $u2++;
                }elseif($val['ref']==$this->arrIdLine3[3]){
                    $u3++;
                }elseif($val['ref']==$this->arrIdLine3[4]){
                    $u4++;
                }elseif($val['ref']==$this->arrIdLine3[5]){
                    $u5++;
                }elseif($val['ref']==$this->arrIdLine3[6]){
                    $u6++;
                }elseif($val['ref']==$this->arrIdLine3[7]){
                    $u7++;
                }elseif($val['ref']==$this->arrIdLine3[8]){
                    $u8++;
                }elseif($val['ref']==$this->arrIdLine3[9]){
                    $u9++;
                }elseif($val['ref']==$this->arrIdLine3[10]){
                    $u10++;
                }elseif($val['ref']==$this->arrIdLine3[11]){
                    $u11++;
                }elseif($val['ref']==$this->arrIdLine3[12]){
                    $u12++;
                }elseif($val['ref']==$this->arrIdLine3[13]){
                    $u13++;
                }elseif($val['ref']==$this->arrIdLine3[14]){
                    $u14++;
                }elseif($val['ref']==$this->arrIdLine3[15]){
                    $u15++;
                }elseif($val['ref']==$this->arrIdLine3[16]){
                    $u16++;
                }elseif($val['ref']==$this->arrIdLine3[17]){
                    $u17++;
                }elseif($val['ref']==$this->arrIdLine3[18]){
                    $u18++;
                }elseif($val['ref']==$this->arrIdLine3[19]){
                    $u19++;
                }elseif($val['ref']==$this->arrIdLine3[20]){
                    $u20++;
                }elseif($val['ref']==$this->arrIdLine3[21]){
                    $u21++;
                }elseif($val['ref']==$this->arrIdLine3[22]){
                    $u22++;
                }elseif($val['ref']==$this->arrIdLine3[23]){
                    $u23++;
                }elseif($val['ref']==$this->arrIdLine3[24]){
                    $u24++;
                }elseif($val['ref']==$this->arrIdLine3[25]){
                    $u25++;
                }elseif($val['ref']==$this->arrIdLine3[26]){
                    $u26++;
                }
            }

            //echo '<br><br><br>$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$****' . $u0 . ' ' . '*****' . $u1 . '*******' . $u2 .' ******' . $u3 . '******' . $u4 . '******' . $u5 . '******' . $u6 . '******' . $u7 . '******' . $u8 . '***' . $u9 . '***' . $u10 . '***' . $u11 . '***' . $u12 . '***' . $u13 . '***' . $u14 .'***' . $u15 .'***' . $u16 .'***' . $u17 .'***' . $u18 .'***' . $u19 .'***' . $u20 .'***' . $u21 .'***' . $u22 .'***' . $u23 .'***' . $u24 .'***' . $u25 .'***' . $u26 .'***' .'<br>';

            if ($u0 < 3) {
                $this->arrDBPapa['uid'] = $this->arrIdLine3[0];
                //echo '<br><br>Победил:' . $this->arrDBPapa['uid'] . '<br>';
                $this->assignFirst();
            } elseif ($u1 < 3) {
                $this->arrDBPapa['uid'] = $this->arrIdLine3[1];
                //echo '<br><br>Победил:' . $this->arrDBPapa['uid'] . '<br>';
                $this->assignFirst();
            } elseif ($u2 < 3) {
                $this->arrDBPapa['uid'] = $this->arrIdLine3[2];
                //echo '<br><br>Победил:' . $this->arrDBPapa['uid'] . '<br>';
                $this->assignFirst();
            }elseif ($u3 < 3) {
                $this->arrDBPapa['uid'] = $this->arrIdLine3[3];
                //echo '<br><br>Победил:' . $this->arrDBPapa['uid'] . '<br>';
                $this->assignFirst();
            }elseif ($u4 < 3) {
                $this->arrDBPapa['uid'] = $this->arrIdLine3[4];
                //echo '<br><br>Победил:' . $this->arrDBPapa['uid'] . '<br>';
                $this->assignFirst();
            }elseif ($u5 < 3) {
                $this->arrDBPapa['uid'] = $this->arrIdLine3[5];
                //echo '<br><br>Победил:' . $this->arrDBPapa['uid'] . '<br>';
                $this->assignFirst();
            }elseif ($u6 < 3) {
                $this->arrDBPapa['uid'] = $this->arrIdLine3[6];
                //echo '<br><br>Победил:' . $this->arrDBPapa['uid'] . '<br>';
                $this->assignFirst();
            }elseif ($u7 < 3) {
                $this->arrDBPapa['uid'] = $this->arrIdLine3[7];
                //echo '<br><br>Победил:' . $this->arrDBPapa['uid'] . '<br>';
                $this->assignFirst();
            }elseif ($u8 < 3) {
                $this->arrDBPapa['uid'] = $this->arrIdLine3[8];
                //echo '<br><br>Победил:' . $this->arrDBPapa['uid'] . '<br>';
                $this->assignFirst();
            }elseif ($u9 < 3) {
                $this->arrDBPapa['uid'] = $this->arrIdLine3[9];
                //echo '<br><br>Победил:' . $this->arrDBPapa['uid'] . '<br>';
                $this->assignFirst();
            }elseif ($u10 < 3) {
                $this->arrDBPapa['uid'] = $this->arrIdLine3[10];
                //echo '<br><br>Победил:' . $this->arrDBPapa['uid'] . '<br>';
                $this->assignFirst();
            }elseif ($u11 < 3) {
                $this->arrDBPapa['uid'] = $this->arrIdLine3[11];
                //echo '<br><br>Победил:' . $this->arrDBPapa['uid'] . '<br>';
                $this->assignFirst();
            }elseif ($u12 < 3) {
                $this->arrDBPapa['uid'] = $this->arrIdLine3[12];
                //echo '<br><br>Победил:' . $this->arrDBPapa['uid'] . '<br>';
                $this->assignFirst();
            }elseif ($u13 < 3) {
                $this->arrDBPapa['uid'] = $this->arrIdLine3[13];
                //echo '<br><br>Победил:' . $this->arrDBPapa['uid'] . '<br>';
                $this->assignFirst();
            }elseif ($u14 < 3) {
                $this->arrDBPapa['uid'] = $this->arrIdLine3[14];
                //echo '<br><br>Победил:' . $this->arrDBPapa['uid'] . '<br>';
                $this->assignFirst();
            }elseif ($u15 < 3) {
                $this->arrDBPapa['uid'] = $this->arrIdLine3[15];
                //echo '<br><br>Победил:' . $this->arrDBPapa['uid'] . '<br>';
                $this->assignFirst();
            }elseif ($u16 < 3) {
                $this->arrDBPapa['uid'] = $this->arrIdLine3[16];
                //echo '<br><br>Победил:' . $this->arrDBPapa['uid'] . '<br>';
                $this->assignFirst();
            }elseif ($u17 < 3) {
                $this->arrDBPapa['uid'] = $this->arrIdLine3[17];
                //echo '<br><br>Победил:' . $this->arrDBPapa['uid'] . '<br>';
                $this->assignFirst();
            }elseif ($u18 < 3) {
                $this->arrDBPapa['uid'] = $this->arrIdLine3[18];
                //echo '<br><br>Победил:' . $this->arrDBPapa['uid'] . '<br>';
                $this->assignFirst();
            }elseif ($u19 < 3) {
                $this->arrDBPapa['uid'] = $this->arrIdLine3[19];
                //echo '<br><br>Победил:' . $this->arrDBPapa['uid'] . '<br>';
                $this->assignFirst();
            }elseif ($u20 < 3) {
                $this->arrDBPapa['uid'] = $this->arrIdLine3[20];
                //echo '<br><br>Победил:' . $this->arrDBPapa['uid'] . '<br>';
                $this->assignFirst();
            }elseif ($u21 < 3) {
                $this->arrDBPapa['uid'] = $this->arrIdLine3[21];
                //echo '<br><br>Победил:' . $this->arrDBPapa['uid'] . '<br>';
                $this->assignFirst();
            }elseif ($u22 < 3) {
                $this->arrDBPapa['uid'] = $this->arrIdLine3[22];
                //echo '<br><br>Победил:' . $this->arrDBPapa['uid'] . '<br>';
                $this->assignFirst();
            }elseif ($u23 < 3) {
                $this->arrDBPapa['uid'] = $this->arrIdLine3[23];
                //echo '<br><br>Победил:' . $this->arrDBPapa['uid'] . '<br>';
                $this->assignFirst();
            }elseif ($u24 < 3) {
                $this->arrDBPapa['uid'] = $this->arrIdLine3[24];
                //echo '<br><br>Победил:' . $this->arrDBPapa['uid'] . '<br>';
                $this->assignFirst();
            }elseif ($u25 < 3) {
                $this->arrDBPapa['uid'] = $this->arrIdLine3[25];
                //echo '<br><br>Победил:' . $this->arrDBPapa['uid'] . '<br>';
                $this->assignFirst();
            }elseif ($u26 < 3) {
                $this->arrDBPapa['uid'] = $this->arrIdLine3[26];
                //echo '<br><br>Победил:' . $this->arrDBPapa['uid'] . '<br>';
                $this->assignFirst();
            }

        }
    }


    function getReferer(){
        $this->arrDBPapa=$this->DB->strSQL('SELECT uid,level FROM t_users WHERE uid=' . User::$arrDBUser['ref'] . ' LIMIT 1');
        if($this->arrDBPapa){
            if($this->arrDBPapa['level']>0){return true;}else{
                //if($this->updateReferer(Def100\OptCab::ID_ADMIN)){}return false;//!!!!!!!!!!!!изменить юзвера нужно в конце, что-бы не пришлось два раза это делать
                    //изменил реф на админа
                    $this->arrDBPapa['uid']=Def100\OptCab::ID_ADMIN;
                    return true;//($this->arrDBPapa?true:false);
            }
        }return false;
    }

    private function updateReferer($id){
        $res=$this->DB->boolSQL('UPDATE `t_users` SET `ref`='.$id.' WHERE uid='.
            User::$arrDBUser['uid'].' LIMIT 1;');
        return($res?true:false);
    }

    private function assignFirst($ps=1){
        //echo '<br><br>присвоить пользователю первую линию';
        $err=false;
        if(User::$arrDBUser['ref']!=$this->arrDBPapa['uid']){
            //echo ' - ne sovpalo';
            //надо изменить папу
            if($this->updateReferer($this->arrDBPapa['uid'])){
                $err=false;
            }else $err=true;
        }
        if(!$err){
            $dt=time();
            //снять деньги с пользователя
            $res=$this->DB->boolSQL('INSERT INTO `t_out`(`id`,`usr`, `sum`, `ps`, `dt`) VALUES (null,"'.User::$arrDBUser['uid'].'","'.Def100\OptCab::LEVEL_COST[$this->next_level].'",'.$ps.','.$dt.')');
            $err=(!$res?true:false);
            if(!$err){
               $sum=Def100\OptCab::LEVEL_COST[$this->next_level]-(Def100\OptCab::LEVEL_COST[$this->next_level]*0.2);
                $res=$this->DB->boolSQL('INSERT INTO `t_in`(`usr`, `sum`, `ty`, `ba`, `batch_pm`, `st`, `dt`) VALUES ('.$this->arrDBPapa['uid'].',"'.$sum.'",1,"'.$this->arrDBPapa['uid'].'_'.$dt.'",null,1,'.$dt.')');
                 $err=(!$res?true:false);
                if(!$err){
                    //echo '<br><br><br>**************Продолжить теперь таблицу пользователя******************<br><br>';

                    $sql='UPDATE t_users SET `bal`=`bal`-'.Def100\OptCab::LEVEL_COST[$this->next_level].',level=1 WHERE uid ='.User::$arrDBUser['uid'].' LIMIT 1';
                    $res=$this->DB->boolSQL($sql);
                    $err=(!$res?true:false);
                    if(!$err){
                        $sql='UPDATE `t_users` SET `bal`=`bal`+' . $sum . ', `profit` = `profit`+' . $sum . ' WHERE uid = ' . $this->arrDBPapa['uid'] . ' LIMIT 1';
                        $res=$this->DB->boolSQL($sql);
                        $err=(!$res?true:false);
                        if(!$err){
                            //уровень изменён на 1
                            echo json_encode(['err'=>false,'answer'=>Def100\LangLibCabMain::ARR_LEVEL_UP[Def\Opt::$lang]['current_level'].$this->next_level]);
                        }else{
                            //надо сделать дамп на всякий случай
                        }
                    }
                }
            }
        }
    }
}