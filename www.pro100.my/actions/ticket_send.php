<?php
include('../inc/conf.php');
include('../inc/f_token.php');
if (!USER_LOGGED) { echo '3'; exit; }

if(isset($_POST['to']) && isset($_POST['text'])){
if(!empty($_POST['to']) && !empty($_POST['text'])){

$usri = mysqli_fetch_assoc(mysqli_query($connect_db, "SELECT * FROM t_users WHERE uid = '$u_id' LIMIT 1"));
//if($usri['level'] == 0) { exit('5'); }

$to = intval($_POST["to"]);
$text = mysqli_real_escape_string($connect_db, $_POST["text"]);

$nt = mysqli_num_rows(mysqli_query($connect_db, "SELECT id FROM `t_ticket_name` WHERE id='$to' AND usr = '$u_id' LIMIT 1"));
if ($nt == 0) { exit('3'); }

mysqli_query($connect_db, "INSERT INTO `t_ticket_msg` (tid,msg,dt) VALUES ('$to','$text','$dt')");
mysqli_query($connect_db, "UPDATE `t_ticket_name` SET `dt` = '$dt', `sta` = '1' WHERE id='$to' LIMIT 1");
echo '1';
} else { echo '0'; }
} else { echo '3'; }
?>