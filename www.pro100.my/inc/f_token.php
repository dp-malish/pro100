<?php
if (empty($_REQUEST['token'])) { exit('3'); } else {
$gtkn = explode(":", $_POST['token']);
$salt = $gtkn['0'];
$vtkn = $salt.':'.md5($salt.':'.$_SESSION['pass'].':'.$_SESSION['uid']);
if($_POST['token'] != $vtkn) { exit('3'); }
}