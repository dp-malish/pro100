<?php
$pname = 'Личные сообщения';
$pkey = 'сообщения';
$pdesc = 'Личные сообщения';
include('../inc/top_menu.php');
if(!USER_LOGGED) { header ("Location: /"); exit; }
?>
<!-- Контент -->

<div class="row">

<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title">Личные сообщения</h3>
</div>
<div class="panel-body">

<div class="table-responsive">
<table class="refslist">
<?php
$page = intval($_GET['page']);
$num = 20;
if ($page==0) $page=1;
$querys = "SELECT count(`uid`) FROM t_messages";
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
if ($page != 1) $pervpage = '<li><a href="/m_admin/messages?page='. ($page - 1).'">Предыдущая страница</a></li>';
if ($page != $total) $nextpage = '<li><a href="/m_admin/messages?page='. ($page + 1).'">Следующая страница</a></li>';
$qm = mysqli_query($connect_db, "SELECT id,fr,tou,msg,log,av FROM t_messages INNER JOIN t_users ON t_messages.fr = t_users.uid ORDER BY id DESC LIMIT $start, $num");
while($row = mysqli_fetch_array($qm)) {
$tou = mysqli_fetch_assoc(mysqli_query($connect_db, "SELECT uid,log,av FROM t_users WHERE uid='$row[tou]' LIMIT 1"));
if (empty($row['av'])) { $fr_av = wu_noavatar($row['log']); } else { $fr_av = '/static/avatars/'.$row['av']; }
if (empty($tou['av'])) { $tou_av = wu_noavatar($tou['log']); } else { $tou_av = '/static/avatars/'.$tou['av']; }
?>
<tr>
<td><center><img src="<?php echo $fr_av; ?>" class="thumb-md img-circle" /><br /><?php echo $row['log']; ?></center></td>
<td><i class="fa fa-arrow-right"></i></td>
<td><center><img src="<?php echo $tou_av; ?>" class="thumb-md img-circle" /><br /><?php echo $tou['log']; ?></center></td>
<td><?php echo nl2br(htmlspecialchars($row['msg'])); ?></td>
</tr>
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