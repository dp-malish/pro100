<?php
include('../inc/conf.php');
include('../inc/f_token.php');

if(!USER_LOGGED || $u_id != $admin_uid) { exit('3'); }

if(isset($_POST['usr']) && isset($_POST['payeer']) && isset($_POST['pm'])){
$usr = intval($_POST['usr']);
$payeer = mysqli_real_escape_string($connect_db, trim($_POST['payeer']));
$pm = mysqli_real_escape_string($connect_db, trim($_POST['pm']));

mysqli_query($connect_db, "UPDATE `t_users` SET `pay_payeer` = '$payeer', `pay_pm` = '$pm' WHERE uid = '$usr' LIMIT 1");
echo '1';
} else { echo '3'; }
?>