<?php
include('../inc/conf.php');
include('../inc/f_token.php');
if (!USER_LOGGED) { echo '3'; exit; }

if(isset($_POST['text'])){
if(!empty($_POST['text'])){

$usri = mysqli_fetch_assoc(mysqli_query($connect_db, "SELECT uid,level FROM t_users WHERE uid = '$u_id' LIMIT 1"));
if($usri['level'] == 0) { exit('5'); }

$text = mysqli_real_escape_string($connect_db, $_POST["text"]);
mysqli_query($connect_db, "INSERT INTO `t_ch` (usr,msg,dt) VALUES ('$u_id','$text','$dt')");
echo '1';
} else { echo '0'; }
} else { echo '3'; }
?>