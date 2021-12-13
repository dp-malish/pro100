<?php
$pname = 'История операций';
$pkey = 'операции';
$pdesc = 'История операций';
include('../inc/top_menu.php');
if(!USER_LOGGED || $u_id != $admin_uid) { header ("Location: /"); exit; }
?>
<!-- Контент -->

<div class="row">

<?php
$page = intval($_GET['page']);
$num = 10;
if ($page==0) $page=1;
$querys = "SELECT count(`id`) FROM t_newlevels";
$mysql_result = mysqli_query($connect_db, $querys);
if(mysqli_num_rows($mysql_result)>0){
$count=mysqli_fetch_row($mysql_result);
}
$posts = $count[0];
$total = intval(($posts - 1) / $num) + 1;
$page = intval($page);
if(empty($page) or $page < 0) $page = 1;
if($page > $total) $page = $total;
$start = $page * $num - $num;
if ($page != 1) $pervpage = '<li><a href="/m_admin/operations?page='. ($page - 1).'">Предыдущая страница</a></li>';
if ($page != $total) $nextpage = '<li><a href="/m_admin/operations?page='. ($page + 1).'">Следующая страница</a></li>';
$qm = mysqli_query($connect_db, "SELECT * FROM t_in WHERE st = '1' ORDER BY id DESC LIMIT $start, $num");
$hm = mysqli_num_rows($qm);
if ($hm > 0) {
while($row = mysqli_fetch_array($qm)) {
$usr = mysqli_fetch_assoc(mysqli_query($connect_db, "SELECT uid,log FROM t_users WHERE uid = '$row[usr]' LIMIT 1"));
?>
<div class="panel panel-default">
<div class="panel-body">
<?php
if ($row['ty'] == 0) { echo $usr['log'].' пополнил баланс на '.htmlspecialchars($row['sum']).' руб. Дата: '.date('d.m.Y в H:i',$row['dt']); }
if ($row['ty'] == 1) { echo $usr['log'].' получил '.$row['sum'].' руб. за продажу уровня. Дата: '.date('d.m.Y в H:i',$row['dt']); }
?>
</div>
</div>
<?php }
if ($total>1) { echo '<ul class="pager">'.$pervpage.$nextpage.'</ul>'; }
} else { echo '<div class="alert alert-info fade in">Операций нет</div>'; }
?>

</div>

<!-- /Контент -->
<?php include('../inc/bottom_menu.php'); ?>