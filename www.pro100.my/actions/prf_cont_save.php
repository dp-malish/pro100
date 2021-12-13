<?php
include('../inc/conf.php');
include('../inc/f_token.php');

if (!USER_LOGGED) { echo '2'; exit; }

if(isset($_POST['vk']) && isset($_POST['ok']) && isset($_POST['fb']) && isset($_POST['wa']) && isset($_POST['vb']) && isset($_POST['sk']) && isset($_POST['tg']) && isset($_POST['icq']) && isset($_POST['sms'])){
$vk = mysqli_real_escape_string($connect_db, trim($_POST['vk']));
$ok = mysqli_real_escape_string($connect_db, trim($_POST['ok']));
$fb = mysqli_real_escape_string($connect_db, trim($_POST['fb']));
$wa = mysqli_real_escape_string($connect_db, trim($_POST['wa']));
$vb = mysqli_real_escape_string($connect_db, trim($_POST['vb']));
$sk = mysqli_real_escape_string($connect_db, trim($_POST['sk']));
$tg = mysqli_real_escape_string($connect_db, trim($_POST['tg']));
$icq = mysqli_real_escape_string($connect_db, trim($_POST['icq']));
$sms = mysqli_real_escape_string($connect_db, trim($_POST['sms']));

if (!empty($vk) && mysqli_num_rows(mysqli_query($connect_db, "SELECT uid FROM t_users WHERE cont_vk = '$vk' AND uid <> '$u_id' LIMIT 1")) > 0) { exit('e_vk'); }
if (!empty($ok) && mysqli_num_rows(mysqli_query($connect_db, "SELECT uid FROM t_users WHERE cont_ok = '$ok' AND uid <> '$u_id' LIMIT 1")) > 0) { exit('e_ok'); }
if (!empty($fb) && mysqli_num_rows(mysqli_query($connect_db, "SELECT uid FROM t_users WHERE cont_fb = '$fb' AND uid <> '$u_id' LIMIT 1")) > 0) { exit('e_fb'); }
if (!empty($wa) && mysqli_num_rows(mysqli_query($connect_db, "SELECT uid FROM t_users WHERE cont_wa = '$wa' AND uid <> '$u_id' LIMIT 1")) > 0) { exit('e_wa'); }
if (!empty($vb) && mysqli_num_rows(mysqli_query($connect_db, "SELECT uid FROM t_users WHERE cont_vi = '$vb' AND uid <> '$u_id' LIMIT 1")) > 0) { exit('e_vb'); }
if (!empty($sk) && mysqli_num_rows(mysqli_query($connect_db, "SELECT uid FROM t_users WHERE cont_sk = '$sk' AND uid <> '$u_id' LIMIT 1")) > 0) { exit('e_sk'); }
if (!empty($tg) && mysqli_num_rows(mysqli_query($connect_db, "SELECT uid FROM t_users WHERE cont_te = '$tg' AND uid <> '$u_id' LIMIT 1")) > 0) { exit('e_tg'); }
if (!empty($icq) && mysqli_num_rows(mysqli_query($connect_db, "SELECT uid FROM t_users WHERE cont_icq = '$icq' AND uid <> '$u_id' LIMIT 1")) > 0) { exit('e_icq'); }
if (!empty($sms) && mysqli_num_rows(mysqli_query($connect_db, "SELECT uid FROM t_users WHERE cont_sms = '$sms' AND uid <> '$u_id' LIMIT 1")) > 0) { exit('e_sms'); }

mysqli_query($connect_db, "UPDATE `t_users` SET `cont_vk` = '$vk', `cont_ok` = '$ok', `cont_fb` = '$fb', `cont_wa` = '$wa', `cont_vi` = '$vb', `cont_sk` = '$sk', `cont_te` = '$tg', `cont_icq` = '$icq', `cont_sms` = '$sms' WHERE uid = '$u_id' LIMIT 1");
echo '1';
} else { echo '3'; }
?>