<?php
include('../inc/conf.php');
include('../inc/f_token.php');

if(!USER_LOGGED || $u_id != $admin_uid) { exit('3'); }

if(isset($_POST['usr']) && isset($_POST['name']) && isset($_POST['fam']) && isset($_POST['em']) && isset($_POST['log']) && isset($_POST['ref']) && isset($_POST['pass']) && isset($_POST['level']) && isset($_POST['bal']) && isset($_POST['profit']) && isset($_POST['ban'])){
if(!empty($_POST['usr']) && !empty($_POST['log']) && !empty($_POST['ref'])){
$usr = intval($_POST['usr']);
$em = mysqli_real_escape_string($connect_db, trim($_POST['em']));
$name = mysqli_real_escape_string($connect_db, trim($_POST['name']));
$fam = mysqli_real_escape_string($connect_db, trim($_POST['fam']));
$log = mysqli_real_escape_string($connect_db, trim($_POST['log']));
$ref = intval($_POST['ref']);
$level = intval($_POST['level']);
$bal = mysqli_real_escape_string($connect_db, trim($_POST['bal']));
$profit = mysqli_real_escape_string($connect_db, trim($_POST['profit']));
$ban = mysqli_real_escape_string($connect_db, trim($_POST['ban']));

$how_ref = mysqli_num_rows(mysqli_query($connect_db, "SELECT uid FROM t_users WHERE uid = '$ref' LIMIT 1"));
if ($how_ref == 0) { exit('5'); }

mysqli_query($connect_db, "UPDATE `t_users` SET `log` = '$log', `ref` = '$ref', `bal` = '$bal', `level` = '$level', `em` = '$em', `profit` = '$profit', `prf_name` = '$name', `prf_fam` = '$fam', `ban` = '$ban' WHERE uid = '$usr' LIMIT 1");

if (!empty($_POST['pass'])) {
$pass_n = md5(md5($_POST['pass']));
mysqli_query($connect_db, "UPDATE `t_users` SET `pas` = '$pass_n' WHERE uid = '$usr' LIMIT 1");
}

echo '1';
} else { echo '4'; }
} else { echo '3'; }
?>