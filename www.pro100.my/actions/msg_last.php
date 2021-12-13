<?php
include('../inc/conf.php');
include('../inc/f_token.php');
if (!USER_LOGGED) { echo '3'; exit; }

if(isset($_POST['usr']) && isset($_POST['last'])){
if(!empty($_POST['last'])){
$usr = intval($_POST['usr']);
$last = mysqli_real_escape_string($connect_db, $_POST['last']);
$last = str_replace('m_', '', $last);
$last = intval($last);
$islast = mysqli_num_rows(mysqli_query($connect_db, "SELECT id FROM t_messages WHERE ((`fr` = '$u_id' AND `tou` = '$usr') OR (`fr` = '$usr' AND `tou` = '$u_id')) AND id > '$last' ORDER BY id DESC LIMIT 1"));
if ($islast > 0) { exit('1'); } else { exit('0'); }
} else { exit('3'); }
} else { exit('3'); }
?>