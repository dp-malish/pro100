<?php
namespace incl\pro100\Pay;

use lib\Def as Def;
use lib\Post as Post;

use incl\pro100\Def as Def100;
use incl\pro100\User as User;

class Pay_PM{
    //выплаты
    public $valid_post_request=false;
    //выплаты
    public $arrPM=[];


    //выплаты
    function payOut(){
        if(Post\Post::issetPostKey(['sum'])){
            $sum=Def\Validator::html_cod($_POST['sum']);
            //провверка цифры
            if(!Def\Validator::paternInt($sum)){
                echo json_encode(['err'=>false,'answer'=>Def100\LangLibPay::ARR_ERR_PAY[Def\Opt::$lang]['sum_null'],'l'=>2]);
            }elseif($sum<Def100\OptCab::MIN_OUT){
                echo json_encode(['err'=>false,'answer'=>Def100\LangLibPay::ARR_ERR_PAY[Def\Opt::$lang]['sum_min'],'l'=>2]);
            }elseif($sum>Def100\OptCab::MAX_OUT){
                echo json_encode(['err'=>false,'answer'=>Def100\LangLibPay::ARR_ERR_PAY[Def\Opt::$lang]['sum_max'],'l'=>2]);
            }else{
                //Вывод по уровням добавить ограничения
                if($this->levelRestrictions($sum)){

                    $sum = number_format($sum, 2, '.', '');
                    $nbal = User\User::$arrDBUser['bal']; //начальный баланс;
                    $pm_wallet = User\User::$arrDBUser['pay_pm'];//perfect money wallet
                    $sum_w_commis = $sum + ($sum / 100 * Def100\OptCab::PM_COMMISSION);//сумма с комиссией

                    if($pm_wallet==''){
                        echo json_encode(['err' => false, 'answer' => Def100\LangLibPay::ARR_ERR_PAY[Def\Opt::$lang]['wallet_null'],'l'=>1]);
                    }elseif($sum>$nbal){
                        echo json_encode(['err' => false, 'answer' => Def100\LangLibPay::ARR_ERR_PAY[Def\Opt::$lang]['low_balance'] . '-' . $sum . '-' . $nbal,'l'=>2]);
                    }elseif($nbal<$sum_w_commis){
                        //тут с комиссией системы сравнить
                        echo json_encode(['err' => false, 'answer' => Def100\LangLibPay::ARR_ERR_PAY[Def\Opt::$lang]['low_balance_w_commis'],'l'=>2]);
                    }else{
                        $dt = time();
                        $payment_id = Def\Opt::$live_user_id . '_' . $dt . rand(10, 99);
                        //DB тут делать
                        //Def\Opt::$live_user_id;
                        /*$str='https://perfectmoney.is/acct/confirm.asp?AccountID=' . Def100\OptCab::PM_ID . '&PassPhrase=' . Def100\OptCab::PM_PASS . '&Payer_Account=' . Def100\OptCab::PM_NUMBER . '&Payee_Account=' . $pm_wallet . '&Amount=' . $sum . '&PAY_IN=1&PAYMENT_ID=' . $payment_id;
                        //$f=false;

                        $f = fopen('https://perfectmoney.is/acct/confirm.asp?AccountID=' . Def100\OptCab::PM_ID . '&PassPhrase=' . Def100\OptCab::PM_PASS . '&Payer_Account=' . Def100\OptCab::PM_NUMBER . '&Payee_Account=' . $pm_wallet . '&Amount=' . $sum . '&PAY_IN=1&PAYMENT_ID=' . $payment_id, 'rb');

                        if ($f === false) {//echo 'error openning url';
                            echo json_encode(['err' => false, 'answer' => Def100\LangLibPay::ARR_ERR_PAY[Def\Opt::$lang]['openning_url_null'],'l'=>2]);
                        } else {
                            $out = [];
                            while (!feof($f)) $out .= fgets($f);//Проверяет, достигнут ли конец файла и Читает строку из файла
                            //log платежей (!!!!!!ПРОВЕРИТЬ!!!!!!!!)
                            //log платежей (!!!!!!ПРОВЕРИТЬ!!!!!!!!)
                            //log платежей (!!!!!!ПРОВЕРИТЬ!!!!!!!!)
                            //log платежей (!!!!!!ПРОВЕРИТЬ!!!!!!!!)
                            //log платежей (!!!!!!ПРОВЕРИТЬ!!!!!!!!)
                            //log платежей (!!!!!!ПРОВЕРИТЬ!!!!!!!!)
                            file_put_contents('../../../log_pay/' . $payment_id . '.txt', file_get_contents($f));
                            fclose($f);
                            //echo json_encode(['err'=>false,'answer'=>$payment_id]);

                            if(!preg_match_all("/<input name='(.*)' type='hidden' value='(.*)'>/", $out, $result, PREG_SET_ORDER)){
                                //echo 'Ivalid output';
                                echo json_encode(['err'=>false,'answer'=>Def100\LangLibPay::ARR_ERR_PAY[Def\Opt::$lang]['openning_url_null'],'l'=>2]);
                            }else{
                                $ar=[];
                                foreach($result as $item){
                                    $key=$item[1];
                                    $ar[$key]=$item[2];
                                }
                                if(empty($ar['ERROR'])){ //$pay_system=1;//Perfect Money
                                    //тут отправить на почту если лажа

                                    $sql = 'INSERT INTO t_out(usr,sum,ps,dt,st)VALUES(' . Def\Opt::$live_user_id . ',"' . $sum_w_commis . '",1,' . $dt . ',1)';

                                    //INSERT INTO `t_out` (usr,sum,ps,dt,st) VALUES ('$uid','$sum+$sum/100*2.5','2','$dt','1')");
                                   //mysqli_query($connect_db, "UPDATE `t_users` SET `bal` = `bal`-'$sum+$sum/100*2.5' WHERE uid = '$uid' LIMIT 1");


                                    //file_put_contents($payment_id, file_get_contents($f));

                                    //echo json_encode(['err' => false, 'answer' => $str . ' Спасибо поням!!! ' . $nbal . ' ' . $pm_wallet,'l'=>2]);


                                } else {
                                    //print_r($ar['ERROR']).'<br />';
                                    echo json_encode(['err' => false, 'answer' => Def100\LangLibPay::ARR_ERR_PAY[Def\Opt::$lang]['openning_url_null'],'l'=>2]);
                                }
                            }
                        }*/
                    }//тут сама продседура от else{ начиная
                }
            }
        }else echo json_encode(['err'=>false,'answer'=>Def100\LangLibPay::ARR_ERR_PAY[Def\Opt::$lang]['post_null'],'l'=>2]);
    }

    private function levelRestrictions($sum){
        $l1_max=240;

        if(User\User::$arrDBUser['level']==0){
            echo json_encode(['err'=>false,'answer'=>Def100\LangLibPay::ARR_ERR_PAY[Def\Opt::$lang]['level_0'],'l'=>1]);
            return false;
        }elseif(User\User::$arrDBUser['level']==1 && $sum>$l1_max){
            echo json_encode(['err'=>false,'answer'=>Def100\LangLibPay::ARR_ERR_PAY[Def\Opt::$lang]['level_n'].$l1_max,'l'=>1]);
            return false;
        }
        else return true;
    }

    //*************************************************
    //*************************************************
    //*************************************************
    //*************************************************
    //*************************************************
    //*************************************************
    //*************************************************
    //*************************************************
    //*************************************************
    //*************************************************
    //*************************************************
    //*************************************************
    //*************************************************
    //*************************************************
    //Получение платежа
    //платежи в систему

    function fillFormPM(){//заполнить форму perfectMoney
        if(Post\Post::issetPostKey(['sum'])){
           $sum=Def\Validator::html_cod($_POST['sum']);
           if(preg_match("/^[0-9\.\,]+$/u",$sum)){
                $sum=str_replace(',','.',$sum);
                $dot=substr_count($sum,'.');
                if($dot<=1){
                    $sum=(float)$sum;
                    $dt=time();
                    $m_orderid =User\User::$u_id.'_'.$dt.rand(10,99);
                    $m_amount = number_format($sum, 2, '.', '');
                    $DB=new Def\SQLi();
                    $res=$DB->boolSQL($DB->realEscape('INSERT INTO t_in (usr,sum,ty,ba,st,dt) VALUES (?,?,0,?,0,?)',[User\User::$u_id,$m_amount,$m_orderid,$dt]));
//echo json_encode(['err'=>false,'answer'=>$sql,'l'=>1]);

                    if($res){
                        Def\Opt::$main_content.='<form id="pm-send" name="perfect_form" action="https://perfectmoney.is/api/step1.asp" method="post"><input type="hidden" name="PAYEE_ACCOUNT" value="'.Def100\OptCab::PM_NUMBER.'">';
//<!--PAYEE_NAME Имя, которое продавец желает отобразить в качестве получателя платежа -->
Def\Opt::$main_content.='<input type="hidden" name="PAYEE_NAME" value="'.User\User::$arrDBUser['log'].'">
<input type="hidden" name="PAYMENT_UNITS" value="USD">';
//<!--Идентификатора счета-фактуры делается самостоятельно-->
Def\Opt::$main_content.='<input type="hidden" name="PAYMENT_ID" value="'.$m_orderid.'">';
//<!--обработчик на моей стороне-->
Def\Opt::$main_content.='<input type="hidden" name="STATUS_URL" value="'.Def\Opt::$protocol.Def\Opt::$site.'/perfect">';
//<!--Это нормальный путь возврата покупателя в систему корзины покупок продавца-->
Def\Opt::$main_content.='<input type="hidden" name="PAYMENT_URL" value="'.Def\Opt::$protocol.Def\Opt::$site.'/cabinet">';
//<!--как используется значение поля PAYMENT_URL-->
Def\Opt::$main_content.='<input type="hidden" name="PAYMENT_URL_METHOD" value="LINK">
<input type="hidden" name="NOPAYMENT_URL" value="'.Def\Opt::$protocol.Def\Opt::$site.'/cabinet/cash-add">
<input type="hidden" name="NOPAYMENT_URL_METHOD" value="LINK">';
//<!-- baggage fields -->
Def\Opt::$main_content.='<input type="hidden" name="IDENT" value="'.User\User::$arrDBUser['log'].'">
<input type="hidden" name="BAGGAGE_FIELDS"  value="IDENT">
<input type="hidden" name="INTERFACE_LANGUAGE" value="'.Def100\LangLibPay::ARR_ERR_PAY[Def\Opt::$lang]['interface_lang'].'">
<input type="hidden" name="PAYMENT_AMOUNT" value="'.$m_amount.'"></form>';
/*<script type="text/javascript">
document.forms["pm-send"].submit();
</script>*/
                        echo json_encode(['err'=>false,'answer'=>Def\Opt::$main_content,'l'=>3]);
                    }else echo json_encode(['err'=>false,'answer'=>Def100\LangLibPay::ARR_ERR_PAY[Def\Opt::$lang]['post_null'],'l'=>1]);
                }else echo json_encode(['err'=>false,'answer'=>Def100\LangLibPay::ARR_ERR_PAY[Def\Opt::$lang]['post_null'],'l'=>1]);
           }else echo json_encode(['err'=>false,'answer'=>Def100\LangLibPay::ARR_ERR_PAY[Def\Opt::$lang]['post_null'],'l'=>1]);
        }else echo json_encode(['err'=>false,'answer'=>Def100\LangLibPay::ARR_ERR_PAY[Def\Opt::$lang]['post_null'],'l'=>1]);
    }

    private function validRequestPM(){//Приём платежей перфект мани (проверка запроса от сервера PM)

        //$this->putErrFile(1,'start');

        $alt_phrase=strtoupper(md5(Def100\OptCab::PM_ALT_PHRASE));

        if(Post\Post::issetPostArr()){

            //$this->putErrFile(3,'issetPostArr');
            /*
             * PAYMENT_ID счета-фактура которую я присвоил
             * PAYEE_ACCOUNT - счет, на который должна быть произведена оплата. Например U9007123.
             * Мой аккаунт perfect money (Def100\OptCab::PM_NUMBER==PAYEE_ACCOUNT)
             * PAYMENT_AMOUNT - Общая сумма покупки (надо проверять от подмены)
             * PAYMENT_UNITS - Валюта (USD)
             * PAYMENT_BATCH_NUM - Номер транзакции Perfect Money(32-бит положит. целое число)
             *PAYER_ACCOUNT - аккаунт покупателя
             *TIMESTAMPGMT - time() на стороне Perfect Money             *
             * */
            if(Post\Post::issetPostKey(['PAYMENT_ID','PAYEE_ACCOUNT','PAYMENT_AMOUNT','PAYMENT_UNITS','PAYMENT_BATCH_NUM','PAYER_ACCOUNT','TIMESTAMPGMT','V2_HASH'])){
                $this->arrPM['PAYMENT_ID']=Def\Validator::html_cod($_POST['PAYMENT_ID']);//БД
                $this->arrPM['PAYEE_ACCOUNT']=Def\Validator::html_cod($_POST['PAYEE_ACCOUNT']);//Локально
                $this->arrPM['PAYMENT_AMOUNT']=Def\Validator::html_cod($_POST['PAYMENT_AMOUNT']);//БД
                $this->arrPM['PAYMENT_UNITS']=Def\Validator::html_cod($_POST['PAYMENT_UNITS']);//Локально
                $this->arrPM['PAYMENT_BATCH_NUM']=Def\Validator::html_cod($_POST['PAYMENT_BATCH_NUM']);
                $this->arrPM['PAYER_ACCOUNT']=Def\Validator::html_cod($_POST['PAYER_ACCOUNT']);//БД
                $this->arrPM['TIMESTAMPGMT']=Def\Validator::html_cod($_POST['TIMESTAMPGMT']);
                $this->arrPM['V2_HASH']=Def\Validator::html_cod($_POST['V2_HASH']);

                if($this->arrPM['PAYEE_ACCOUNT']!=Def100\OptCab::PM_NUMBER){//Локально
                    Def\Opt::$arr_error[]='PAYEE_ACCOUNT error';

                    $this->putErrFile('PAYEE_ACCOUNT',$this->arrPM['PAYEE_ACCOUNT']);

                    $this->valid_post_request=true;
                }
                if($this->arrPM['PAYMENT_UNITS']!=Def100\OptCab::PM_UNITS){//Локально
                    Def\Opt::$arr_error[]='PAYEE_UNITS error';

                    $this->putErrFile('PAYMENT_UNITS',$this->arrPM['PAYMENT_UNITS']);

                    $this->valid_post_request=true;
                }
                $hash=$this->arrPM['PAYMENT_ID'].':'.$this->arrPM['PAYEE_ACCOUNT'].':'.
                    $this->arrPM['PAYMENT_AMOUNT'].':'.$this->arrPM['PAYMENT_UNITS'].':'.
                    $this->arrPM['PAYMENT_BATCH_NUM'].':'.
                    $this->arrPM['PAYER_ACCOUNT'].':'.$alt_phrase.':'.
                    $this->arrPM['TIMESTAMPGMT'];

                $this->putErrFile('SMALL_HASH',$hash);

                $hash=strtoupper(md5($hash));
                $this->putErrFile('BIG_HASH',$hash);
                if($hash==$this->arrPM['V2_HASH'] && empty(Def\Opt::$arr_error)){
                    $this->valid_post_request=true;
                    //echo 'if';
                }else $this->putErrFile('V2_HASH',$this->arrPM['V2_HASH']);//echo 'No';
            }else Def\Route::$module404=true;
        }else Def\Route::$module404=true;
    }

    function processPayment(){//Приём платежей перфект мани от системы
        $this->validRequestPM();
        if($this->valid_post_request){
            $DB=new Def\SQLi();
            $res=$DB->strSQL('SELECT id,usr,sum FROM t_in WHERE ba = '.$DB->realEscapeStr($this->arrPM['PAYMENT_ID']).' AND st = 0 LIMIT 1');
            if($res){
                if($res['sum']==$this->arrPM['PAYMENT_AMOUNT']){
                    $uid=$res['usr'];
                    $sum=$res['sum'];
                    $res=$DB->boolSQL('UPDATE t_in SET batch_pm='.$DB->realEscapeStr($this->arrPM['PAYMENT_BATCH_NUM']).' , st =1 WHERE id='.$res['id'].' LIMIT 1');
                    $res_=$DB->boolSQL('UPDATE `t_users` SET `bal` = `bal`+'.$DB->realEscapeStr($sum).' WHERE uid = '.$uid.' LIMIT 1');
                    if($res && $res_){return true;
                    }else return false;//если лажа сбросить мне файл на почту
                }else return false;
            }else return false;
        }else return false;
    }


/*    function fileErr(){
        $this->putErrFile('pisiki','super');
    }*/

    private function putErrFile($step,$var){
        file_put_contents('../log_pay/' . $step . '.txt', $var);
    }
    //PAYMENT_BATCH_NUM ложить в базу данных
}