<?php
$pname = 'Рефералы';
$pkey = 'рефералы';
$pdesc = 'Рефералы';
include('../inc/top_menu.php');
if(!USER_LOGGED) { header ("Location: /"); exit; }
?>
<!-- Контент -->

<div class="row">

<div class="panel panel-default">
<div class="panel-heading" style="cursor:pointer" onclick="$('#lvl1').toggle('slow');">
<h3 class="panel-title">1 линия (<?php echo intval(mysqli_num_rows(mysqli_query($connect_db, "SELECT uid FROM t_users WHERE ref='$u_id' AND level > '0' LIMIT 3" ))); ?>/3)</h3>
</div>
<div class="panel-body" id="lvl1" style="display:none">
<table class="refslist">
<?php
$wu_q = mysqli_query($connect_db, "SELECT uid,log,av,dt FROM t_users WHERE ref='$u_id' AND level > '0'  LIMIT 3");
$reflist_1 = '';
if (mysqli_num_rows($wu_q) > 0) {
while($row = mysqli_fetch_assoc($wu_q)) {
$reflist_1 .= $row['uid'].', ';
if (empty($row['av'])) { $ref_av = wu_noavatar($row['log']); } else { $ref_av = '/static/avatars/'.$row['av']; }
?>
<tr>
<td><img src="<?php echo $ref_av; ?>" class="thumb-md img-circle" /></td>
<td><?php echo $row['log']; ?></td>
<td><a href="/cabinet/user/<?php echo $row['log']; ?>" target="_blank" data-toggle="tooltip" data-placement="bottom" data-original-title="Смотреть профиль"><i class="fa fa-user"></i></a></td>
<td><a href="/cabinet/messages/<?php echo $row['log']; ?>" target="_blank" data-toggle="tooltip" data-placement="bottom" data-original-title="Написать сообщение"><i class="fa fa-envelope-o"></i></a></td>
</tr>
<?php } } else { echo '<tr><td>Рефералов нет</td</tr>'; } $reflist_1 = substr($reflist_1,0,-2); ?>
</table>
</div>
</div>

<div class="panel panel-default">
<div class="panel-heading" style="cursor:pointer" onclick="$('#lvl2').toggle('slow');">
<h3 class="panel-title">2 линия (<?php echo intval(mysqli_num_rows(mysqli_query($connect_db, "SELECT uid FROM t_users WHERE ref IN ($reflist_1) AND level > '0'  LIMIT 9"))); ?>/9)</h3>
</div>
<div class="panel-body" id="lvl2" style="display:none">
<table class="refslist">
<?php
$wu_q = mysqli_query($connect_db, "SELECT uid,log,av,dt FROM t_users WHERE ref IN ($reflist_1) AND level > '0'  LIMIT 9");
$reflist_2 = '';
if (mysqli_num_rows($wu_q) > 0) {
while($row = mysqli_fetch_assoc($wu_q)) {
$reflist_2 .= $row['uid'].', ';
if (empty($row['av'])) { $ref_av = wu_noavatar($row['log']); } else { $ref_av = '/static/avatars/'.$row['av']; }
?>
<tr>
<td><img src="<?php echo $ref_av; ?>" class="thumb-md img-circle" /></td>
<td><?php echo $row['log']; ?></td>
<td><a href="/cabinet/user/<?php echo $row['log']; ?>" target="_blank" data-toggle="tooltip" data-placement="bottom" data-original-title="Смотреть профиль"><i class="fa fa-user"></i></a></td>
<td><a href="/cabinet/messages/<?php echo $row['log']; ?>" target="_blank" data-toggle="tooltip" data-placement="bottom" data-original-title="Написать сообщение"><i class="fa fa-envelope-o"></i></a></td>
</tr>
<?php } } else { echo '<tr><td>Рефералов нет</td</tr>'; } $reflist_2 = substr($reflist_2,0,-2); ?>
</table>
</div>
</div>

<div class="panel panel-default">
<div class="panel-heading" style="cursor:pointer" onclick="$('#lvl3').toggle('slow');">
<h3 class="panel-title">3 линия (<?php echo intval(mysqli_num_rows(mysqli_query($connect_db, "SELECT uid FROM t_users WHERE ref IN ($reflist_2) AND level > '0'  LIMIT 27"))); ?>/27)</h3>
</div>
<div class="panel-body" id="lvl3" style="display:none">
<table class="refslist">
<?php
$wu_q = mysqli_query($connect_db, "SELECT uid,log,av,dt FROM t_users WHERE ref IN ($reflist_2) AND level > '0'  LIMIT 27");
$reflist_3 = '';
if (mysqli_num_rows($wu_q) > 0) {
while($row = mysqli_fetch_assoc($wu_q)) {
$reflist_3 .= $row['uid'].', ';
if (empty($row['av'])) { $ref_av = wu_noavatar($row['log']); } else { $ref_av = '/static/avatars/'.$row['av']; }
?>
<tr>
<td><img src="<?php echo $ref_av; ?>" class="thumb-md img-circle" /></td>
<td><?php echo $row['log']; ?></td>
<td><a href="/cabinet/user/<?php echo $row['log']; ?>" target="_blank" data-toggle="tooltip" data-placement="bottom" data-original-title="Смотреть профиль"><i class="fa fa-user"></i></a></td>
<td><a href="/cabinet/messages/<?php echo $row['log']; ?>" target="_blank" data-toggle="tooltip" data-placement="bottom" data-original-title="Написать сообщение"><i class="fa fa-envelope-o"></i></a></td>
</tr>
<?php } } else { echo '<tr><td>Рефералов нет</td</tr>'; } $reflist_3 = substr($reflist_3,0,-2); ?>
</table>
</div>
</div>

<div class="panel panel-default">
<div class="panel-heading" style="cursor:pointer" onclick="$('#lvl4').toggle('slow');">
<h3 class="panel-title">4 линия (<?php echo intval(mysqli_num_rows(mysqli_query($connect_db, "SELECT uid FROM t_users WHERE ref IN ($reflist_3) AND level > '0'  LIMIT 81"))); ?>/81)</h3>
</div>
<div class="panel-body" id="lvl4" style="display:none">
<table class="refslist">
<?php
$wu_q = mysqli_query($connect_db, "SELECT uid,log,av,dt FROM t_users WHERE ref IN ($reflist_3) AND level > '0'  LIMIT 81");
$reflist_4 = '';
if (mysqli_num_rows($wu_q) > 0) {
while($row = mysqli_fetch_assoc($wu_q)) {
$reflist_4 .= $row['uid'].', ';
if (empty($row['av'])) { $ref_av = wu_noavatar($row['log']); } else { $ref_av = '/static/avatars/'.$row['av']; }
?>
<tr>
<td><img src="<?php echo $ref_av; ?>" class="thumb-md img-circle" /></td>
<td><?php echo $row['log']; ?></td>
<td><a href="/cabinet/user/<?php echo $row['log']; ?>" target="_blank" data-toggle="tooltip" data-placement="bottom" data-original-title="Смотреть профиль"><i class="fa fa-user"></i></a></td>
<td><a href="/cabinet/messages/<?php echo $row['log']; ?>" target="_blank" data-toggle="tooltip" data-placement="bottom" data-original-title="Написать сообщение"><i class="fa fa-envelope-o"></i></a></td>
</tr>
<?php } } else { echo '<tr><td>Рефералов нет</td</tr>'; } $reflist_4 = substr($reflist_4,0,-2); ?>
</table>
</div>
</div>


<!--<div class="panel panel-default">
<div class="panel-heading" style="cursor:pointer" onclick="$('#lvl5').toggle('slow');">
<h3 class="panel-title">5 линия (<?php echo intval(mysqli_num_rows(mysqli_query($connect_db, "SELECT uid FROM t_users WHERE ref IN ($reflist_4) AND level > '0'"))); ?>/32)</h3>
</div>
<div class="panel-body" id="lvl5" style="display:none">
<table class="refslist">
<?php
$wu_q = mysqli_query($connect_db, "SELECT uid,log,av,dt FROM t_users WHERE ref IN ($reflist_4) AND level > '0'");
$reflist_5 = '';
if (mysqli_num_rows($wu_q) > 0) {
while($row = mysqli_fetch_assoc($wu_q)) {
$reflist_5 .= $row['uid'].', ';
if (empty($row['av'])) { $ref_av = wu_noavatar($row['log']); } else { $ref_av = '/static/avatars/'.$row['av']; }
?>
<tr>
<td><img src="<?php echo $ref_av; ?>" class="thumb-md img-circle" /></td>
<td><?php echo $row['log']; ?></td>
<td><a href="/cabinet/user/<?php echo $row['log']; ?>" target="_blank" data-toggle="tooltip" data-placement="bottom" data-original-title="Смотреть профиль"><i class="fa fa-user"></i></a></td>
<td><a href="/cabinet/messages/<?php echo $row['log']; ?>" target="_blank" data-toggle="tooltip" data-placement="bottom" data-original-title="Написать сообщение"><i class="fa fa-envelope-o"></i></a></td>
</tr>
<?php } } else { echo '<tr><td>Рефералов нет</td</tr>'; } $reflist_5 = substr($reflist_5,0,-2); ?>
</table>
</div>
</div>

<div class="panel panel-default">
<div class="panel-heading" style="cursor:pointer" onclick="$('#lvl6').toggle('slow');">
<h3 class="panel-title">6 линия (<?php echo intval(mysqli_num_rows(mysqli_query($connect_db, "SELECT uid FROM t_users WHERE ref IN ($reflist_5) AND level > '0'"))); ?>/64)</h3>
</div>
<div class="panel-body" id="lvl6" style="display:none">
<table class="refslist">
<?php
$wu_q = mysqli_query($connect_db, "SELECT uid,log,av,dt FROM t_users WHERE ref IN ($reflist_5) AND level > '0'");
$reflist_6 = '';
if (mysqli_num_rows($wu_q) > 0) {
while($row = mysqli_fetch_assoc($wu_q)) {
$reflist_6 .= $row['uid'].', ';
if (empty($row['av'])) { $ref_av = wu_noavatar($row['log']); } else { $ref_av = '/static/avatars/'.$row['av']; }
?>
<tr>
<td><img src="<?php echo $ref_av; ?>" class="thumb-md img-circle" /></td>
<td><?php echo $row['log']; ?></td>
<td><a href="/cabinet/user/<?php echo $row['log']; ?>" target="_blank" data-toggle="tooltip" data-placement="bottom" data-original-title="Смотреть профиль"><i class="fa fa-user"></i></a></td>
<td><a href="/cabinet/messages/<?php echo $row['log']; ?>" target="_blank" data-toggle="tooltip" data-placement="bottom" data-original-title="Написать сообщение"><i class="fa fa-envelope-o"></i></a></td>
</tr>
<?php } } else { echo '<tr><td>Рефералов нет</td</tr>'; } $reflist_6 = substr($reflist_6,0,-2); ?>
</table>
</div>
</div>

<div class="panel panel-default">
<div class="panel-heading" style="cursor:pointer" onclick="$('#lvl7').toggle('slow');">
<h3 class="panel-title">7 линия (<?php echo intval(mysqli_num_rows(mysqli_query($connect_db, "SELECT uid FROM t_users WHERE ref IN ($reflist_6) AND level > '0'"))); ?>/128)</h3>
</div>
<div class="panel-body" id="lvl7" style="display:none">
<table class="refslist">
<?php
$wu_q = mysqli_query($connect_db, "SELECT uid,log,av,dt FROM t_users WHERE ref IN ($reflist_6) AND level > '0'");
$reflist_7 = '';
if (mysqli_num_rows($wu_q) > 0) {
while($row = mysqli_fetch_assoc($wu_q)) {
$reflist_7 .= $row['uid'].', ';
if (empty($row['av'])) { $ref_av = wu_noavatar($row['log']); } else { $ref_av = '/static/avatars/'.$row['av']; }
?>
<tr>
<td><img src="<?php echo $ref_av; ?>" class="thumb-md img-circle" /></td>
<td><?php echo $row['log']; ?></td>
<td><a href="/cabinet/user/<?php echo $row['log']; ?>" target="_blank" data-toggle="tooltip" data-placement="bottom" data-original-title="Смотреть профиль"><i class="fa fa-user"></i></a></td>
<td><a href="/cabinet/messages/<?php echo $row['log']; ?>" target="_blank" data-toggle="tooltip" data-placement="bottom" data-original-title="Написать сообщение"><i class="fa fa-envelope-o"></i></a></td>
</tr>
<?php } } else { echo '<tr><td>Рефералов нет</td</tr>'; } $reflist_7 = substr($reflist_7,0,-2); ?>
</table>
</div>
</div>-->

<div class="panel panel-default">
<div class="panel-heading" style="cursor:pointer" onclick="$('#noa').toggle('slow');">
<h3 class="panel-title">Неактивные (<?php echo intval(mysqli_num_rows(mysqli_query($connect_db, "SELECT uid FROM t_users WHERE ref='$u_id' AND level = '0'"))); ?>)</h3>
</div>
<div class="panel-body" id="noa" style="display:none">
<table class="refslist">
<?php
$wu_q = mysqli_query($connect_db, "SELECT uid,log,av,dt FROM t_users WHERE ref='$u_id' AND level = '0'");
if (mysqli_num_rows($wu_q) > 0) {
while($row = mysqli_fetch_assoc($wu_q)) {
if (empty($row['av'])) { $ref_av = wu_noavatar($row['log']); } else { $ref_av = '/static/avatars/'.$row['av']; }
?>
<tr>
<td><img src="<?php echo $ref_av; ?>" class="thumb-md img-circle" /></td>
<td><?php echo $row['log']; ?></td>
<td><a href="/cabinet/user/<?php echo $row['log']; ?>" target="_blank" data-toggle="tooltip" data-placement="bottom" data-original-title="Смотреть профиль"><i class="fa fa-user"></i></a></td>
<td><a href="/cabinet/messages/<?php echo $row['log']; ?>" target="_blank" data-toggle="tooltip" data-placement="bottom" data-original-title="Написать сообщение"><i class="fa fa-envelope-o"></i></a></td>
</tr>
<?php } } else { echo '<tr><td>Рефералов нет</td</tr>'; } ?>
</table>
</div>
</div>

<a href="/cabinet/referrals_map" target="_blank">
<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title">Карта рефералов</h3>
</div>
</div>
</a>

<!-- /Контент -->
include('../inc/bottom_menu.php')