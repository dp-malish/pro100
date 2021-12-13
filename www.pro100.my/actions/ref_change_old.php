<?php
include('../inc/conf.php');
include('../inc/f_token.php');

if (!USER_LOGGED) { echo '2'; exit; }

if(isset($_POST['ref'])){
if(!empty($_POST['ref'])){

$usri = mysqli_fetch_assoc(mysqli_query($connect_db, "SELECT * FROM t_users WHERE uid = '$u_id' LIMIT 1"));
if ($usri['level'] > 0) { exit('3'); }

$batches = mysqli_num_rows(mysqli_query($connect_db, "SELECT id FROM t_newlevels WHERE usr = '$u_id' LIMIT 1"));
if ($batches > 0) { exit('3'); }

$ref_p = mysqli_real_escape_string($connect_db, trim($_POST['ref']));

$ref_level = mysqli_fetch_assoc(mysqli_query($connect_db, "SELECT uid,level FROM t_users WHERE log='$ref_p' LIMIT 1"));
if ($ref_level['level'] == 0 || empty($ref_level['uid'])) { exit('3'); }
$ref = $ref_level['uid'];

if ($ref == $u_id) { exit('3'); }
if ($ref < 305) { exit('3'); }
if ($ref > $u_id) { exit('3'); }

//Проверяем реферера
$ref_how = mysqli_num_rows(mysqli_query($connect_db, "SELECT uid FROM t_users WHERE ref='$ref' AND level > 0"));
if ($ref_how >= 3) {

$iend = 0;
//если у рефа 4 рефа
$wu_q = mysqli_query($connect_db, "SELECT uid FROM t_users WHERE ref='$ref' AND level > 0 AND uid > 304 ORDER BY uid ASC");
while($row = mysqli_fetch_assoc($wu_q)) {
$ref_line_1_how = mysqli_num_rows(mysqli_query($connect_db, "SELECT uid FROM t_users WHERE ref='$row[uid]' AND level > 0"));
if ($ref_line_1_how < 3) { $iend = 1; $ref = $row['uid']; break; }
}

//линия 2
if ($iend == 0) {
$wu_q = mysqli_query($connect_db, "SELECT uid FROM t_users WHERE ref='$ref' AND level > 0 ORDER BY uid ASC");
while($row = mysqli_fetch_assoc($wu_q)) {
$wu_q_2 = mysqli_query($connect_db, "SELECT uid FROM t_users WHERE ref='$row[uid]' AND level > 0 ORDER BY uid ASC");
while($row2 = mysqli_fetch_assoc($wu_q_2)) {
$ref_line_1_how = mysqli_num_rows(mysqli_query($connect_db, "SELECT uid FROM t_users WHERE ref='$row2[uid]' AND level > 0"));
if ($ref_line_1_how < 3) { $iend = 1; $ref = $row2['uid']; break 2; }
}
}
}

//линия 3
if ($iend == 0) {
$wu_q = mysqli_query($connect_db, "SELECT uid FROM t_users WHERE ref='$ref' AND level > 0 ORDER BY uid ASC");
	while($row = mysqli_fetch_assoc($wu_q)) {
		$wu_q_2 = mysqli_query($connect_db, "SELECT uid FROM t_users WHERE ref='$row[uid]' AND level > 0 ORDER BY uid ASC");
		while($row2 = mysqli_fetch_assoc($wu_q_2)) {
				$wu_q_3 = mysqli_query($connect_db, "SELECT uid FROM t_users WHERE ref='$row2[uid]' AND level > 0 ORDER BY uid ASC");
				while($row3 = mysqli_fetch_assoc($wu_q_3)) {
				$ref_line_1_how = mysqli_num_rows(mysqli_query($connect_db, "SELECT uid FROM t_users WHERE ref='$row3[uid]' AND level > 0"));
				if ($ref_line_1_how < 3) { $iend = 1; $ref = $row3['uid']; break 3; }
				}
		
		}
	}
}

//линия 4
if ($iend == 0) {
$wu_q = mysqli_query($connect_db, "SELECT uid FROM t_users WHERE ref='$ref' AND level > 0 ORDER BY uid ASC");
	while($row = mysqli_fetch_assoc($wu_q)) {
		$wu_q_2 = mysqli_query($connect_db, "SELECT uid FROM t_users WHERE ref='$row[uid]' AND level > 0 ORDER BY uid ASC");
		while($row2 = mysqli_fetch_assoc($wu_q_2)) {
				$wu_q_3 = mysqli_query($connect_db, "SELECT uid FROM t_users WHERE ref='$row2[uid]' AND level > 0 ORDER BY uid ASC");
				while($row3 = mysqli_fetch_assoc($wu_q_3)) {
					$wu_q_4 = mysqli_query($connect_db, "SELECT uid FROM t_users WHERE ref='$row3[uid]' AND level > 0 ORDER BY uid ASC");
					while($row4 = mysqli_fetch_assoc($wu_q_4)) {
					$ref_line_1_how = mysqli_num_rows(mysqli_query($connect_db, "SELECT uid FROM t_users WHERE ref='$row4[uid]' AND level > 0"));
					if ($ref_line_1_how < 3) { $iend = 1; $ref = $row4['uid']; break 4; }
					}
				}
		
		}
	}
}

if ($iend == 0) { exit('3'); }


}

mysqli_query($connect_db, "UPDATE t_users SET `ref` = '$ref'  WHERE uid = '$u_id' LIMIT 1");

echo '1';
} else { echo '0'; }
} else { echo '3'; }
?>