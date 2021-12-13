<?php
include('../inc/conf.php');
include('../inc/f_token.php');

if(!USER_LOGGED || $u_id != $admin_uid) { exit('3'); }

if(isset($_POST['th']) && isset($_POST['msg'])){
if(!empty($_POST['th']) && !empty($_POST['msg'])){
$th = mysqli_real_escape_string($connect_db, $_POST["th"]);
$msg = mysqli_real_escape_string($connect_db, $_POST["msg"]);

mysqli_query($connect_db, "INSERT INTO `t_news` (ti,msg,dt) VALUES ('$th','$msg','$dt')");
echo '1';
} else { echo '0'; }
} else { echo '3'; }