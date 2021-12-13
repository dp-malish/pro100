<?php
include('../inc/conf.php');
include('../inc/f_token.php');
if (!USER_LOGGED) { echo '3'; exit; }

if(isset($_POST['usr']) && isset($_POST['last'])){
$usr = intval($_POST['usr']);
$last = mysqli_real_escape_string($connect_db, $_POST['last']);
$last = str_replace('m_', '', $last);
$last = intval($last);
$qm = mysqli_query($connect_db, "SELECT * from (SELECT id,fr,msg,dt FROM t_messages WHERE (`fr` = '$u_id' AND `tou` = '$usr') OR (`fr` = '$usr' AND `tou` = '$u_id') AND id > '$last' ORDER BY id DESC) AS te ORDER BY te.id ASC");
$qh = mysqli_num_rows($qm);
if ($qh > 0) {
$view_user = mysqli_fetch_assoc(mysqli_query($connect_db, "SELECT uid,log,av FROM t_users WHERE uid='$usr' LIMIT 1"));
if (empty($view_user['av'])) { $usr_av = wu_noavatar($view_user['log']); } else { $usr_av = '/static/avatars/'.$view_user['av']; }
if (empty($nowusr['av'])) { $avz = wu_noavatar($u_login); } else { $avz = '/static/avatars/'.$nowusr['av']; }
mysqli_query($connect_db, "UPDATE t_messages SET st = '0' WHERE fr='$usr' AND tou='$u_id' AND st = '1'");
while($row = mysqli_fetch_array($qm)) {
?>
<div class="fmsg mc_<?php echo $row['id']; ?> conversation-list messages" id="m_<?php echo $row['id']; ?>">
<div class="<?php if ($row['fr'] != $u_id) { echo 'odd'; } ?> clearfix">
<div class="chat-avatar">
<img class="thumb-md" alt="" src="<?php if ($row['fr'] == $u_id) { echo $avz; } else { echo $usr_av; } ?>" />
<i><?php echo date("d.m.y H:i",$row['dt']); ?></i>
</div>
<div class="conversation-text">
<div class="ctext-wrap">
<i><?php if ($row['fr'] != $u_id) { echo 'Собеседник'; } else { echo 'Вы'; } ?></i>
<p>
<?php echo nl2br(htmlspecialchars($row['msg'])); ?>
</p>
</div>
</div>
</div>
</div>
<?php
}
} else { echo '<div id="m_1" class="msgnone"><div class="alert alert-info alert-dismissable p-l-40"><i class="md md-info"></i> У Вас с этим пользователем пока что нет сообщений.</div></div>'; }
} else { exit('3'); }
?>