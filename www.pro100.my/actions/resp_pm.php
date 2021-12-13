<?php
include('../inc/conf.php');

$_alt_phrase = $perfect_alt_phrase;

$sum=$_POST['PAYMENT_AMOUNT'];

$hash=$_POST['PAYMENT_ID'].':'.$_POST['PAYEE_ACCOUNT'].':'.
$_POST['PAYMENT_AMOUNT'].':'.$_POST['PAYMENT_UNITS'].':'.
$_POST['PAYMENT_BATCH_NUM'].':'.
$_POST['PAYER_ACCOUNT'].':'.$_alt_phrase.':'.
$_POST['TIMESTAMPGMT'];
/*$id=(int)$_POST['IDENT'];*/
$hash=strtoupper(md5($hash));

if($hash==$_POST['V2_HASH']){
$batch=$_POST['PAYMENT_ID'];
$dt = time();
//Надо проверку суммы добавить
$pa = mysqli_fetch_assoc(mysqli_query($connect_db, "SELECT id,usr,sum FROM t_in WHERE ba = '$batch' AND st = '0' LIMIT 1"));
$usr = $pa['usr'];
if ($usr > 0) {
mysqli_query($connect_db, "UPDATE `t_in` SET `st` = '1' WHERE ba = '$batch' LIMIT 1");
mysqli_query($connect_db, "UPDATE `t_users` SET `bal` = `bal`+'$sum' WHERE uid = '$usr' LIMIT 1");
}
}
