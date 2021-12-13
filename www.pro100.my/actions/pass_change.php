<?php
include('../inc/conf.php');
include('../inc/f_token.php');

if (!USER_LOGGED) { echo '2'; exit; }

if(isset($_POST['now']) && isset($_POST['pnew']) && isset($_POST['pnewre'])){
if(!empty($_POST['now']) && !empty($_POST['pnew']) && !empty($_POST['pnewre'])){
$now = mysqli_real_escape_string($connect_db, trim($_POST['now']));
$pnew = mysqli_real_escape_string($connect_db, trim($_POST['pnew']));
$pnewre = mysqli_real_escape_string($connect_db, trim($_POST['pnewre']));
if($pnew != $pnewre) { echo '2'; exit; }
if(strlen($pnew) < '3') { echo '5'; exit; }

$np = mysqli_fetch_assoc(mysqli_query($connect_db, "SELECT uid,pas FROM t_users WHERE uid = '$u_id'"));
$nowp = $np['pas'];
$pass_h_o = md5(md5($_POST['now']));
$pass_h_n = md5(md5($_POST['pnew']));
if ($nowp != $pass_h_o) { echo '0'; exit; }
if ($nowp == $pass_h_n) { echo '3'; exit; }
$_SESSION['pass'] = $pass_h_n;
mysqli_query($connect_db, "UPDATE `t_users` SET `pas` = '$pass_h_n' WHERE uid = '$u_id' LIMIT 1");
echo '1';
} else { echo '7'; }
} else { echo '6'; }
?>