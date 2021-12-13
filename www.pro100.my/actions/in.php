<?php
include('../inc/conf.php');

function wu_error_msg($msg) {
return '<link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"><div class="alert alert-danger fade in"><center>'.$msg.'</center></div>';
}

//if (!isset($_SESSION["uid"])){exit(wu_error_msg('Вы не авторизованы'));}

if(isset($_POST['sum'])){
if(!empty($_POST['sum'])){

/*if($_POST['ps'] == 1){
$sum = preg_replace("#[^0-9\.]+#i",'',mysqli_real_escape_string($connect_db, trim($_POST['sum'])));
$usr = intval($_SESSION["uid"]);
$m_shop = $p_shop_id;
$m_key = $p_m_key;
$dt = time();
$m_orderid = $usr.'_'.$dt.rand(0,99);
$m_amount = number_format($sum, 2, '.', '');
$m_curr = 'RUB';
$m_desc = base64_encode("Пополнение баланса");
$arHash = array(
$m_shop,
$m_orderid,
$m_amount,
$m_curr,
$m_desc,
$m_key
);
$sign = strtoupper(hash('sha256', implode(':', $arHash)));
mysqli_query($connect_db, "INSERT INTO `t_in` (usr,sum,ty,ba,st,dt) VALUES ('$usr','$m_amount','0','$m_orderid','0','$dt')");
echo '
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Переход к оплате</title>
<style>
.holder { position: absolute; top: 50%; left: 50%; } .global { height: 200px; width: 300px; margin-top:-100px; margin-left:-150px; } .gear { top: 0 !important; height: 100px; width: 100px; margin-left:-50px; } .label { font-family:Arial,Helvetica,Sans-serif; font-size:18px; width: 170px; top: 60% !important; margin-left:-75px; }
</style>
</head>
<body>
<div class="holder global">
<div class="holder gear">
<img src="/static/img/webupper_load.gif" alt="Оплата" />
</div>
<span class="holder label">Переход к оплате...</span>
</div>
<form id="wu-send" method="GET" action="https://payeer.com/merchant/" style="display:none">
<input type="hidden" name="m_shop" value="'.$m_shop.'">
<input type="hidden" name="m_orderid" value="'.$m_orderid.'">
<input type="hidden" name="m_amount" value="'.$m_amount.'">
<input type="hidden" name="m_curr" value="'.$m_curr.'">
<input type="hidden" name="m_desc" value="'.$m_desc.'">
<input type="hidden" name="m_sign" value="'.$sign.'">
<input type="submit" name="m_process" value="send" />
</form>
<script type="text/javascript">
document.forms["wu-send"].submit();
</script>
</body>
</html>
';

}
*/

if($_POST['ps'] == 2){
$host = $_SERVER["HTTP_HOST"];

$sum = preg_replace("#[^0-9\.]+#i",'',mysqli_real_escape_string($connect_db, trim($_POST['sum'])));
$usr = intval($_SESSION["uid"]);
$dt = time();

$m_orderid = $usr.'_'.$dt.rand(0,99);

$m_amount = number_format($sum, 2, '.', '');

mysqli_query($connect_db, "INSERT INTO `t_in` (usr,sum,ty,ba,st,dt) VALUES ('$usr','$m_amount','0','$m_orderid','0','$dt')");
echo '
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Переход к оплате</title>

</head>
<body>
<div class="holder global">
<div class="holder gear">
<img src="/static/img/webupper_load.gif" alt="Оплата" />
</div>
<span class="holder label">Переход к оплате...</span>
</div>
<form id="wu-send" name="perfect_form" action="https://perfectmoney.is/api/step1.asp" method="post" style="display:none">
<input type="hidden" name="PAYEE_ACCOUNT" value="'.$perfect_number.'">
<input type="hidden" name="PAYEE_NAME" value="'.$u_login.'">
<input type="hidden" name="PAYMENT_UNITS" value="USD">
<input type="hidden" name="PAYMENT_ID" value="'.$m_orderid.'">
<input type="hidden" name="STATUS_URL" value="'.$Opt::$protocol.$host.'/actions/resp_pm.php">
<input type="hidden" name="PAYMENT_URL" value="'.$Opt::$protocol.$host.'/cabinet">
<input type="hidden" name="PAYMENT_URL_METHOD" value="LINK">
<input type="hidden" name="NOPAYMENT_URL" value="'.$Opt::$protocol.$host.'/cabinet/in">
<input type="hidden" name="NOPAYMENT_URL_METHOD" value="LINK">
<!-- baggage fields -->
<input type="hidden" name="IDENT" value="'.$u_login.'">
<input name="BAGGAGE_FIELDS"  type=hidden value="IDENT">
<input type="hidden" name="INTERFACE_LANGUAGE" value="ru_RU">
<input type="hidden" name="PAYMENT_AMOUNT" value="'.$m_amount.'">
</form>
<script type="text/javascript">
document.forms["wu-send"].submit();
</script>
</body>
</html>
';

}

} else { exit(wu_error_msg('Вы не ввели сумму')); }
} else { exit(wu_error_msg('Ошибка')); }