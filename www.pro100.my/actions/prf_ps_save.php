<?php
include('../inc/conf.php');
include('../inc/f_token.php');

if (!USER_LOGGED) { echo '2'; exit; }

if(isset($_POST['payeer']) && isset($_POST['pm'])){
$payeer = mysqli_real_escape_string($connect_db, trim($_POST['payeer']));
$pm = mysqli_real_escape_string($connect_db, trim($_POST['pm']));

if (!empty($payeer) && mysqli_num_rows(mysqli_query($connect_db, "SELECT uid FROM t_users WHERE pay_payeer = '$payeer' AND uid <> '$u_id' LIMIT 1")) > 0) { exit('e_payeer'); }
if (!empty($pm) && mysqli_num_rows(mysqli_query($connect_db, "SELECT uid FROM t_users WHERE pay_pm = '$pm' AND uid <> '$u_id' LIMIT 1")) > 0) { exit('e_pm'); }

mysqli_query($connect_db, "UPDATE `t_users` SET `pay_payeer` = '$payeer', `pay_pm` = '$pm' WHERE uid = '$u_id' LIMIT 1");
echo '1';
} else { echo '3'; }
?>