<?php
include('../inc/conf.php');
include('../inc/f_token.php');
if (!USER_LOGGED) { echo '3'; exit; }

mysqli_query($connect_db, "UPDATE `t_users` SET `step` = `step`+1 WHERE uid='$u_id' LIMIT 1");

echo '1';
