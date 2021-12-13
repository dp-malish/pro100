<?php
include('../inc/conf.php');
include('../inc/f_token.php');

if (isset($_SESSION['uid'])){ echo '4'; exit; }
if(isset($_POST['login']) && isset($_POST['pass'])){
if (!empty($_POST['login']) && !empty($_POST['pass'])) {
$pdt = $dt + 300;
$ip =mysqli_real_escape_string($connect_db, $_SERVER['REMOTE_ADDR']);
$login = mysqli_real_escape_string($connect_db, $_POST['login']);
$login_c = wu_check_login($login);
$user = mysqli_fetch_assoc(mysqli_query($connect_db, "SELECT uid,log,pas FROM t_users WHERE log='$login' AND pas='".md5(md5($_POST['pass']))."' LIMIT 1"));



$c = mysqli_fetch_assoc(mysqli_query($connect_db, "SELECT c FROM t_login WHERE ip='$ip' LIMIT 1"));
$count = intval($c['c']);
if ($count > 10) { if ($count < $dt) { mysqli_query($connect_db, "UPDATE `t_login` SET `c` = '1' WHERE ip='$ip'"); $count = '1'; } else { echo '2'; exit; } }
if(!empty($user)) {
session_unset();
session_regenerate_id(true);
$_SESSION['uid']=$user['uid'];
$_SESSION['login']=$user['log'];
$_SESSION['pass']=$user['pas'];
$_SESSION['HTTP_USER_AGENT'] = md5($_SERVER['HTTP_USER_AGENT']);
if(!isset($_COOKIE['wu_i'])) { setcookie ('wu_i', $user['uid'], time()+31536000, '/', SITE); }
mysqli_query($connect_db, "UPDATE `t_users` SET `lastip` = '$ip', `last` = '$dt' WHERE uid = '$user[uid]' LIMIT 1");
echo '1';
} else {
if ($count == 0) { mysqli_query($connect_db, "INSERT INTO `t_login` (ip,c) VALUES ('$ip','1')"); }
if ($count > 0 && $count < 10) { mysqli_query($connect_db, "UPDATE `t_login` SET `c` = `c`+1 WHERE ip='$ip'"); }
if ($count == 10) { mysqli_query($connect_db, "UPDATE `t_login` SET `c` = '$pdt'"); }
echo '0';
}
} else { echo '3'; }
} else { echo '3'; }