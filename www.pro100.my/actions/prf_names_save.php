<?php
include('../inc/conf.php');
include('../inc/f_token.php');

if (!USER_LOGGED) { echo '2'; exit; }

if(isset($_POST['name']) && isset($_POST['fam']) && isset($_POST['em'])){
if(!empty($_POST['em'])){
$em = mysqli_real_escape_string($connect_db, trim($_POST['em']));
$name = mysqli_real_escape_string($connect_db, trim($_POST['name']));
$fam = mysqli_real_escape_string($connect_db, trim($_POST['fam']));
function is_email($email) {
return preg_match("/^([a-zA-Z0-9])+([\.a-zA-Z0-9_-])*@([a-zA-Z0-9_-])+(\.[a-zA-Z0-9_-]+)*\.([a-zA-Z]{2,6})$/", $email);
}
$name_z = prfs($name);
if (!is_email($em)) { echo '0' ; exit; }

$nm = mysqli_fetch_assoc(mysqli_query($connect_db, "SELECT uid,em FROM t_users WHERE uid = '$u_id' LIMIT 1"));
$how_mail = mysqli_num_rows(mysqli_query($connect_db, "SELECT uid FROM t_users WHERE em = '$em' LIMIT 1"));
if ($how_mail > 0 && $nm['em'] != $em) { exit('5'); }

mysqli_query($connect_db, "UPDATE `t_users` SET `em` = '$em', `prf_name` = '$name', `prf_fam` = '$fam' WHERE uid = '$u_id' LIMIT 1");
echo '1';
} else { echo '4'; }
} else { echo '3'; }
?>