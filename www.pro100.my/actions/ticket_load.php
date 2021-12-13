<?php
include('../inc/conf.php');
include('../inc/f_token.php');
if (!USER_LOGGED) { echo '3'; exit; }

if(isset($_POST['ticket']) && isset($_POST['last'])){
$ticket = intval($_POST['ticket']);
$last = mysqli_real_escape_string($connect_db, $_POST['last']);
$last = str_replace('m_', '', $last);
$last = intval($last);

$nt = mysqli_num_rows(mysqli_query($connect_db, "SELECT id FROM `t_ticket_name` WHERE id='$ticket' AND usr = '$u_id' LIMIT 1"));
if ($nt == 0) { exit('3'); }

$qm = mysqli_query($connect_db, "SELECT * from (SELECT id,msg,frm,dt FROM `t_ticket_msg` WHERE tid = '$ticket' AND id > '$last' ORDER BY id DESC) AS te ORDER BY te.id ASC");
$qh = mysqli_num_rows($qm);
if ($qh > 0) {
$usr_av = '/static/img/letter_avatar/cl.png';
if (empty($nowusr['av'])) { $avz = wu_noavatar($u_login); } else { $avz = '/static/avatars/'.$nowusr['av']; }
mysqli_query($connect_db, "UPDATE t_ticket_name SET stu = '0' WHERE id='$ticket' LIMIT 1");
while($row = mysqli_fetch_array($qm)) {
?>
<div class="fmsg mc_<?php echo $row['id']; ?> conversation-list messages" id="m_<?php echo $row['id']; ?>">
<div class="<?php if ($row['frm'] == 1) { echo 'odd'; } ?> clearfix">
<div class="chat-avatar">
<img class="thumb-md" alt="" src="<?php if ($row['frm'] == 0) { echo $avz; } else { echo $usr_av; } ?>" />
<i><?php echo date("d.m.y H:i",$row['dt']); ?></i>
</div>
<div class="conversation-text">
<div class="ctext-wrap">
<i><?php if ($row['frm'] == 1) { echo 'Оператор'; } else { echo 'Вы'; } ?></i>
<p>
<?php echo nl2br(htmlspecialchars($row['msg'])); ?>
</p>
</div>
</div>
</div>
</div>
<?php
}
} else { echo '<div id="m_1" class="msgnone"><div class="alert alert-info alert-dismissable p-l-40"><i class="md md-info"></i> Нет сообщений.</div></div>'; }
} else { exit('3'); }
?>