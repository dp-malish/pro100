<?php
include('../inc/conf.php');
include('../inc/f_token.php');
if (!USER_LOGGED) { echo '3'; exit; }

if(isset($_POST['th']) && isset($_POST['msg'])){
if(!empty($_POST['th']) && !empty($_POST['msg'])){
$th = mysqli_real_escape_string($connect_db, $_POST["th"]);
$msg = mysqli_real_escape_string($connect_db, $_POST["msg"]);
mysqli_query($connect_db, "INSERT INTO `t_ticket_name` (usr,theme,dt) VALUES ('$u_id','$th','$dt')");
$last = mysqli_insert_id($connect_db);
ticket_n($last);
mysqli_query($connect_db, "INSERT INTO `t_ticket_msg` (tid,msg,dt) VALUES ('$last','$msg','$dt')");
echo '1';
} else { echo '0'; }
} else { echo '3'; }
?>