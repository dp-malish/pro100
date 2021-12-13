<?php
include('../inc/conf.php');
include('mail/wu_mail.php');

//if (USER_LOGGED){ exit('Вы авторизованы'); }
if (empty($_GET['q'])) { exit('<link href="/static/cabinet/css/bootstrap.min.css" rel="stylesheet" type="text/css"><div class="alert alert-danger"><center>Ошибка</center></div>'); }
$q = mysqli_real_escape_string($connect_db, $_GET['q']);
list($user, $exp, $md) = explode('_', $q);
$user = intval($user);

//Проверка данных
$user_a = mysqli_fetch_assoc(mysqli_query($connect_db, "SELECT uid,log,dt,em FROM t_users WHERE `uid` = '$user' LIMIT 1"));
if (empty($user_a['uid'])) { exit('<link href="/static/cabinet/css/bootstrap.min.css" rel="stylesheet" type="text/css"><div class="alert alert-danger"><center>Ошибка</center></div>'); }
$hash = $user_a['uid'].'_'.$exp.'_'.md5(md5($user_a['uid'].'_'.$user_a['log'].'_'.$user_a['dt'].'_'.$exp)).'wu';
if ($q !== $hash) { exit('<link href="/static/cabinet/css/bootstrap.min.css" rel="stylesheet" type="text/css"><div class="alert alert-danger"><center>Ошибка</center></div>'); }
if ($exp < $dt) { exit('<link href="/static/cabinet/css/bootstrap.min.css" rel="stylesheet" type="text/css"><div class="alert alert-danger"><center>Время действия ссылки истекло</center></div>'); }

//Генерация пароля
$chars="qazxswedcvfrtgbnhyujmkiolp1234567890QAZXSWEDCVFRTGBNHYUJMKIOLP";
$max=10; 
$size=StrLen($chars)-1; 
$pass=null;            
while($max--) {
$pass.=$chars[rand(0,$size)]; 
}
$hpass = md5(md5(trim($pass)));

//Сохранение пароля
mysqli_query($connect_db, "UPDATE t_users SET pas = '$hpass' WHERE uid = '$user' LIMIT 1");

$em = $user_a['em'];
$fe_sbj = "Ваш новый пароль";
$fe_mid = '<center>Ваш новый пароль: <b>'.$pass.'</b><br />Пожалуйста, не сообщайте его третьим лицам.</center>';
esend($em, $user_a['log'], $fe_sbj, $fe_mid, 'clear');

echo '<link href="/static/cabinet/css/bootstrap.min.css" rel="stylesheet" type="text/css"><div class="alert alert-info"><center>Новый пароль отправлен на E-mail</center></div>';
?>