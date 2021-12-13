<?php
include('../inc/conf.php');
include('../inc/f_token.php');
if (!USER_LOGGED) { echo '3'; exit; }

if(isset($_POST['ticket']) && isset($_POST['last'])){
if(!empty($_POST['last'])){
$ticket = intval($_POST['ticket']);
$last = mysqli_real_escape_string($connect_db, $_POST['last']);
$last = str_replace('m_', '', $last);
$last = intval($last);
$islast = mysqli_num_rows(mysqli_query($connect_db, "SELECT id FROM t_ticket_msg WHERE tid = '$ticket' AND id > '$last' ORDER BY id DESC LIMIT 1"));
if ($islast > 0) { exit('1'); } else { exit('0'); }
} else { exit('3'); }
} else { exit('3'); }
?>