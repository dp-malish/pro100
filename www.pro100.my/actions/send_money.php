<?php
include('../inc/conf.php');

$user = $_POST['user'];
$sum = $_POST['sum'];


$nowusr = mysqli_fetch_assoc(mysqli_query($connect_db, "SELECT `bal` FROM t_users WHERE uid='$u_id' LIMIT 1"));

$date_time = time();


if($nowusr['bal'] < $sum) {
	echo '0';
}else {
	$sql = "UPDATE `t_users` SET `bal` = `bal` + '$sum' WHERE `uid` = '$user'";
	mysqli_query($connect_db, $sql);
	$sql = "UPDATE `t_users` SET `bal` = `bal` - '$sum' WHERE `uid` = '$u_id'";
	mysqli_query($connect_db, $sql);

	$sql = "INSERT INTO `t_send` (user_from, sum, user_to,  date_time) VALUES ('$u_id', '$sum', '$user',  '$date_time')";
	mysqli_query($connect_db, $sql);
	echo '1'; 
}
