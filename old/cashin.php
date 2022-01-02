<?php
namespace lib\Def;

use \lib\Post as Post;

use \incl\pro100\Def as Def100;

use \incl\pro100\User as User;

use \incl\pro100\Pay as Pay;


Opt::$main_content.='<h2>Cash In</h2>';



Opt::$main_content.=$_POST['sum'].'<br>';


if(Post\Post::issetPostArr()){//тут можно добавить платёжки
    if(Post\Post::issetPostKey(['sum'])){
        $sum=Validator::html_cod($_POST['sum']);
        if(preg_match("/^[0-9\.\,]+$/u",$sum)){
            $sum=str_replace(',','.',$sum);
            $dot= substr_count($sum,'.');
            if($dot<=1){
                $sum=(float)$sum;
                $dt=time();
                $m_orderid =User\User::$u_id.'_'.$dt.rand(10,99);
                $m_amount = number_format($sum, 2, '.', '');
                $DB=new SQLi();
                $res=$DB->boolSQL($DB->realEscape('INSERT INTO t_in (usr,sum,ty,ba,st,dt) VALUES (?,?,0,?,0,?)',[User\User::$u_id,$m_amount,$m_orderid,$dt]));

                if($res){
                    Opt::$main_content.='<p>Форма тут!</p>
<form id="pm-send" name="perfect_form" action="https://perfectmoney.is/api/step1.asp" method="post">
<!--style="display:none"-->
<input type="hidden" name="PAYEE_ACCOUNT" value="'.Def100\OptCab::PM_NUMBER.'">
<!--PAYEE_NAME Имя, которое продавец желает отобразить в качестве получателя платежа -->
<input type="hidden" name="PAYEE_NAME" value="'.User\User::$arrDBUser['log'].'">
<input type="hidden" name="PAYMENT_UNITS" value="USD">
<!--Идентификатора счета-фактуры делается самостоятельно-->
<input type="hidden" name="PAYMENT_ID" value="'.$m_orderid.'">
<!--обработчик на моей стороне-->
<input type="hidden" name="STATUS_URL" value="'.$Opt::$protocol.$Opt::$site.'/perfect.php">
<!--Это нормальный путь возврата покупателя в систему корзины покупок продавца-->
<input type="hidden" name="PAYMENT_URL" value="'.$Opt::$protocol.$Opt::$site.'/cabinet">
<!--как используется значение поля PAYMENT_URL-->
<input type="hidden" name="PAYMENT_URL_METHOD" value="LINK">
<input type="hidden" name="NOPAYMENT_URL" value="'.$Opt::$protocol.$Opt::$site.'/cabinet/cashin">
<input type="hidden" name="NOPAYMENT_URL_METHOD" value="LINK">
<!-- baggage fields -->
<input type="hidden" name="IDENT" value="'.User\User::$arrDBUser['log'].'">
<input type="hidden" name="BAGGAGE_FIELDS"  value="IDENT">
<input type="hidden" name="INTERFACE_LANGUAGE" value="ru_RU">
<input type="hidden" name="PAYMENT_AMOUNT" value="'.$m_amount.'">
</form>
<script type="text/javascript">
//document.forms["pm-send"].submit();
</script>';
                }else  echo 'неизвесная ошибка';
            }else echo 'использовать только число';
        }else echo 'использовать только число';
    }else Route::modul404();
}else Route::modul404();













