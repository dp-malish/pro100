<?php
include('../inc/conf.php');
include('../inc/f_token.php');
if (!USER_LOGGED) { echo '3'; exit; }

if(isset($_POST['to']) && isset($_POST['text'])){
if(!empty($_POST['to']) && !empty($_POST['text'])){

if($u_id == $_POST['to']) { exit('3'); }

$usri = mysqli_fetch_assoc(mysqli_query($connect_db, "SELECT * FROM t_users WHERE uid = '$u_id' LIMIT 1"));
//if($usri['level'] == 0) { exit('5'); }

$to = intval($_POST["to"]);
$text = mysqli_real_escape_string($connect_db, $_POST["text"]);
//if ($to < 308) { exit('2'); }
$nusr = mysqli_num_rows(mysqli_query($connect_db, "SELECT uid FROM t_users WHERE uid='$to' LIMIT 1"));
if ($nusr == 0) { exit('2'); }
mysqli_query($connect_db, "INSERT INTO `t_messages` (fr,tou,msg,dt,st) VALUES ('$u_id','$to','$text','$dt','1')");
echo '1';
} else { echo '0'; }
} else { echo '3'; }
?>