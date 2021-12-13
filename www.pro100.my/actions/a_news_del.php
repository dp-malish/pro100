<?php
include('../inc/conf.php');
include('../inc/f_token.php');

if(!USER_LOGGED || $u_id != $admin_uid) { exit('3'); }

if(isset($_POST['id'])){
if(!empty($_POST['id'])){
$id = intval($_POST['id']);
mysqli_query($connect_db, "DELETE FROM `t_news` WHERE id = '$id' LIMIT 1");
echo '1';
} else { echo '3'; }
} else { echo '3'; }
?>