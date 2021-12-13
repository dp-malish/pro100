<?php
include('../inc/conf.php');
include('../inc/f_token.php');
if (!USER_LOGGED) { echo '3'; exit; }

if(isset($_POST['id'])){
if(!empty($_POST['id'])){
$id = intval($_POST['id']);
$no = mysqli_fetch_assoc(mysqli_query($connect_db, "SELECT id,usr FROM t_ticket_name WHERE id='$id'"));
if ($no['usr'] != $u_id) { echo '3'; exit; }
mysqli_query($connect_db, "DELETE FROM `t_ticket_name` WHERE id = '$id'");
mysqli_query($connect_db, "DELETE FROM `t_ticket_msg` WHERE tid = '$id'");
echo '1'; exit;
} else { echo '3'; exit; }
} else { echo '3'; exit; }
?>