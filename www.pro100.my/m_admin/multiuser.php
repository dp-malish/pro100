<?php
$pname = 'Мультиаккаунты';
$pkey = 'мультиаккаунты';
$pdesc = 'Мультиаккаунты';
include('../inc/top_menu.php');
if(!USER_LOGGED || $u_id != $admin_uid) { header ("Location: /"); exit; }
?>
<!-- Контент -->

<div class="row">


<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title">Мультиаккаунты</h3>
</div>
<div class="panel-body">
<div class="table-responsive">
<table class="refslist">
<?php
$page = intval($_GET['page']);
$num = 20;
if ($page==0) $page=1;
$querys = "SELECT count(`uid`) FROM t_users WHERE multi <> 0";
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
if ($page != 1) $pervpage = '<li><a href="/m_admin/multiuser?page='. ($page - 1).'">Предыдущая страница</a></li>';
if ($page != $total) $nextpage = '<li><a href="/m_admin/multiuser?page='. ($page + 1).'">Следующая страница</a></li>';
$qm = mysqli_query($connect_db, "SELECT uid,log,av,multi,ban FROM t_users WHERE multi <> 0 ORDER BY uid DESC LIMIT $start, $num");
while($row = mysqli_fetch_array($qm)) {
if (empty($row['av'])) { $ref_av = wu_noavatar($row['log']); } else { $ref_av = '/static/avatars/'.$row['av']; }
$multi = mysqli_fetch_assoc(mysqli_query($connect_db, "SELECT uid,log FROM t_users WHERE uid='$row[multi]' LIMIT 1"));
?>
<tr>
<td><img src="<?php echo $ref_av; ?>" class="thumb-md img-circle" /></td>
<td><?php echo $row['log']; ?></td>
<td>Мультиаккаунт от <a href="/m_admin/user/<?php echo $multi['log']; ?>" target="_blank" class="igray"><?php echo $multi['log']; ?></a></td>
<td><a href="/m_admin/user/<?php echo $row['log']; ?>" target="_blank" data-toggle="tooltip" data-placement="bottom" data-original-title="Смотреть профиль"><i class="fa fa-user"></i></a></td>
<td><?php if (empty($row['ban'])) { echo 'Не забанен'; } else { echo '<font color="red">Забанен</font>'; } ?></td></tr>
<?php }
if ($total>1) { echo '<tr><td colspan="3"><ul class="pager">'.$pervpage.$nextpage.'</ul></td</tr>'; }
?>
</table>
</div>
</div>
</div>

</div>

<!-- /Контент -->
<?php include('../inc/bottom_menu.php'); ?>