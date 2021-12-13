<?php
include('../inc/conf.php');
include('../inc/f_token.php');
include('mail/wu_mail.php');

if(isset($_POST['mail'])){
if (!empty($_POST['mail'])) {
$mail = mysqli_real_escape_string($connect_db, $_POST['mail']);
function is_email($email) {
return preg_match("/^([a-zA-Z0-9])+([\.a-zA-Z0-9_-])*@([a-zA-Z0-9_-])+(\.[a-zA-Z0-9_-]+)*\.([a-zA-Z]{2,6})$/", $email);
}
if (!is_email($mail)) { exit('4'); }
$user = mysqli_fetch_assoc(mysqli_query($connect_db, "SELECT uid,log,dt,em FROM t_users WHERE em='$mail' LIMIT 1"));
if (empty($user['uid'])) { exit('0'); }

$expiry = $dt+86400;
$link = $Opt::$protocol.SITE.'/actions/lost_send.php?q='.$user['uid'].'_'.$expiry.'_'.md5(md5($user['uid'].'_'.$user['log'].'_'.$user['dt'].'_'.$expiry)).'wu';
$em = $user['em'];
$fe_sbj = "Восстановление пароля";
$fe_mid = '<center>Для аккаунта '.$user['log'].' было запрошено восстановление пароля. Для восстановления нажмите <a href="'.$link.'" tsrget="_blank">здесь</a>. Если вы не запрашивали восстановление, пожалуйста, проигнорируйте это письмо.</center>';
esend($em, $user['log'], $fe_sbj, $fe_mid, 'clear');

echo '1';
} else { echo '2'; }
} else { echo '3'; }
?>