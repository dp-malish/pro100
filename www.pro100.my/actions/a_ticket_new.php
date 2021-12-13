<?php
include('../inc/conf.php');
include('../inc/f_token.php');

if(!USER_LOGGED || $u_id != $admin_uid) { exit('3'); }

if(isset($_POST['usr']) && isset($_POST['th']) && isset($_POST['msg'])){
if(!empty($_POST['usr']) && !empty($_POST['th']) && !empty($_POST['msg'])){
$th = mysqli_real_escape_string($connect_db, $_POST["th"]);
$msg = mysqli_real_escape_string($connect_db, $_POST["msg"]);
$usr = mysqli_real_escape_string($connect_db, $_POST["usr"]);

$usrn = mysqli_fetch_assoc(mysqli_query($connect_db, "SELECT uid FROM t_users WHERE log='$usr'"));
if(empty($usrn['uid'])) { echo '4'; exit; }
$iusr = $usrn['uid'];

mysqli_query($connect_db, "INSERT INTO `t_ticket_name` (usr,theme,dt,stu,sta) VALUES ('$iusr','$th','$dt','1','0')");
$last = mysqli_insert_id($connect_db);
mysqli_query($connect_db, "INSERT INTO `t_ticket_msg` (tid,msg,dt) VALUES ('$last','$msg','$dt')");
echo '1';
} else { echo '0'; }
} else { echo '3'; }
?>