<?php
include('../inc/conf.php');
include('../inc/f_token.php');

if (!USER_LOGGED) { echo '2'; exit; }

$user = mysqli_fetch_assoc(mysqli_query($connect_db, "SELECT * FROM t_users WHERE uid='$u_id' LIMIT 1"));
if ($user['level'] >= 4) { echo '3'; exit; }

$next_level = $nowusr['level']+1;

//Lvl 1
if ($next_level == 1) {
$ref_pay = $nowusr['ref'];
}

//Lvl 1
if ($next_level == 1) {
$users_z = mysqli_num_rows(mysqli_query($connect_db, "SELECT uid FROM t_users WHERE ref='$ref_pay' AND level > 0 LIMIT 2"));
if ($users_z >= 3) {
//Построение дерева
$tree = array();

function tree_view($index)
    {
        global $tree;
        global $connect_db;
        $q = mysqli_query($connect_db, "SELECT uid,level FROM t_users WHERE ref='$index'");
        if (!mysqli_num_rows($q))
            return;
        while ($arr = mysqli_fetch_assoc($q))
        {
		$users_d = mysqli_num_rows(mysqli_query($connect_db, "SELECT uid FROM t_users WHERE ref='$arr[uid]' LIMIT 4"));
if ($arr['level'] > 0) { $tree[$arr['uid']] = $users_d; }
            tree_view($arr['uid']);
        }
    }
tree_view($ref_pay);

//Сортировка по возрастанию
ksort($tree);

//Выявление минимального юзера
$tree_end_usr = '';
foreach ($tree as $key => $val)
{
if ($val < 3) { $tree_end_usr = $key; break; }
}

if (empty($tree_end_usr)) { $tree_end_usr = $ref_pay; }
} else { $tree_end_usr = $ref_pay; }
mysqli_query($connect_db, "UPDATE `t_users` SET `ref` = '$tree_end_usr' WHERE uid = '$u_id' LIMIT 1");
$ref_pay = $tree_end_usr;
}

//Lvl 2
if ($next_level == 2) {
$f_ref_pre_1 = mysqli_fetch_assoc(mysqli_query($connect_db, "SELECT uid,ref FROM t_users WHERE uid='$u_id' LIMIT 1"));
$f_ref_pre_2 = mysqli_fetch_assoc(mysqli_query($connect_db, "SELECT uid,ref FROM t_users WHERE uid='$f_ref_pre_1[ref]' LIMIT 1"));
$ref_pay = $f_ref_pre_2['ref'];
}

//Lvl 3
if ($next_level == 3) {
$f_ref_pre_1 = mysqli_fetch_assoc(mysqli_query($connect_db, "SELECT uid,ref FROM t_users WHERE uid='$u_id' LIMIT 1"));
$f_ref_pre_2 = mysqli_fetch_assoc(mysqli_query($connect_db, "SELECT uid,ref FROM t_users WHERE uid='$f_ref_pre_1[ref]' LIMIT 1"));
$f_ref_pre_3 = mysqli_fetch_assoc(mysqli_query($connect_db, "SELECT uid,ref FROM t_users WHERE uid='$f_ref_pre_2[ref]' LIMIT 1"));
$ref_pay = $f_ref_pre_3['ref'];
}

//Lvl 4
if ($next_level == 4) {
$f_ref_pre_1 = mysqli_fetch_assoc(mysqli_query($connect_db, "SELECT uid,ref FROM t_users WHERE uid='$u_id' LIMIT 1"));
$f_ref_pre_2 = mysqli_fetch_assoc(mysqli_query($connect_db, "SELECT uid,ref FROM t_users WHERE uid='$f_ref_pre_1[ref]' LIMIT 1"));
$f_ref_pre_3 = mysqli_fetch_assoc(mysqli_query($connect_db, "SELECT uid,ref FROM t_users WHERE uid='$f_ref_pre_2[ref]' LIMIT 1"));
$f_ref_pre_4 = mysqli_fetch_assoc(mysqli_query($connect_db, "SELECT uid,ref FROM t_users WHERE uid='$f_ref_pre_3[ref]' LIMIT 1"));
$ref_pay = $f_ref_pre_4['ref'];
}

$referer = mysqli_fetch_assoc(mysqli_query($connect_db, "SELECT * FROM t_users WHERE uid='$ref_pay' LIMIT 1"));
$reas = '';
if (!empty($referer['ban'])) { $reas = 'Пользователь заблокирован по следующей причине: '.$referer['ban']; }
$past_n = $dt-432000;
if ($referer['uid'] > 305 && $referer['last'] < $past_n) { $reas = 'Пользователь неактивен'; }
if ($referer['level'] < $next_level) { $reas = "Не куплен уровень $next_level"; }

if (empty($reas) && $nowusr['level'] == 0) {
$payed_users = mysqli_num_rows(mysqli_query($connect_db, "SELECT uid FROM t_users WHERE ref='$referer[uid]' AND level > 0"));
if ($payed_users >= 3) { $reas = "Заполненные места"; }
}

if (!empty($reas)) { $referer = mysqli_fetch_assoc(mysqli_query($connect_db, "SELECT * FROM t_users WHERE uid='$admin_uid' LIMIT 1")); }

$out_sum = $levels[$next_level];

if ($user['bal'] < $out_sum) { echo '0'; exit; }

mysqli_query($connect_db, "UPDATE `t_users` SET `bal` = `bal`+'$out_sum'-$out_sum*20/100, `profit` = `profit`+'$out_sum'-$out_sum*20/100 WHERE uid = '$referer[uid]' LIMIT 1");
mysqli_query($connect_db, "UPDATE `t_users` SET `bal` = `bal`-'$out_sum', `level` = `level`+'1' WHERE uid = '$u_id' LIMIT 1");


mysqli_query($connect_db, "INSERT INTO t_in (usr,sum,ty,st,dt) VALUES ('$referer[uid]','$out_sum'-$out_sum*20/100,'1','1','$dt')");

echo '1';