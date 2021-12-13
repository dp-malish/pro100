<?php
include('../inc/conf.php');
include('../inc/f_token.php');

if(!USER_LOGGED || $u_id != $admin_uid) { exit('3'); }

if(isset($_POST['usr']) && isset($_POST['vk']) && isset($_POST['ok']) && isset($_POST['fb']) && isset($_POST['wa']) && isset($_POST['vb']) && isset($_POST['sk']) && isset($_POST['tg']) && isset($_POST['icq']) && isset($_POST['sms'])){
$usr = intval($_POST['usr']);
$vk = mysqli_real_escape_string($connect_db, trim($_POST['vk']));
$ok = mysqli_real_escape_string($connect_db, trim($_POST['ok']));
$fb = mysqli_real_escape_string($connect_db, trim($_POST['fb']));
$wa = mysqli_real_escape_string($connect_db, trim($_POST['wa']));
$vb = mysqli_real_escape_string($connect_db, trim($_POST['vb']));
$sk = mysqli_real_escape_string($connect_db, trim($_POST['sk']));
$tg = mysqli_real_escape_string($connect_db, trim($_POST['tg']));
$icq = mysqli_real_escape_string($connect_db, trim($_POST['icq']));
$sms = mysqli_real_escape_string($connect_db, trim($_POST['sms']));

mysqli_query($connect_db, "UPDATE `t_users` SET `cont_vk` = '$vk', `cont_ok` = '$ok', `cont_fb` = '$fb', `cont_wa` = '$wa', `cont_vi` = '$vb', `cont_sk` = '$sk', `cont_te` = '$tg', `cont_icq` = '$icq', `cont_sms` = '$sms' WHERE uid = '$usr' LIMIT 1");
echo '1';
} else { echo '3'; }