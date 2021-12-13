<?php
include('../inc/conf.php');
include('../inc/f_token.php');

if (!USER_LOGGED) { echo '2'; exit; }

if(isset($_POST['text'])){
if(!empty($_POST['text'])){
$text = mysqli_real_escape_string($connect_db, $_POST['text']);
mysqli_query($connect_db, "INSERT INTO `t_rev` (usr,msg,dt) VALUES ('$u_id','$text','$dt')");
echo '1';
} else { echo '0'; }
} else { echo '3'; }
?>