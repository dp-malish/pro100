<?php
include('../inc/conf.php');
include('../inc/f_token.php');
if (!USER_LOGGED) { echo '3'; exit; }

if(isset($_POST['last'])){
$last = mysqli_real_escape_string($connect_db, $_POST['last']);
$last = str_replace('m_', '', $last);
$last = intval($last);
$qm = mysqli_query($connect_db, "SELECT * from (SELECT id,usr,msg,t_ch.dt,log,av FROM t_ch INNER JOIN t_users ON t_ch.usr = t_users.uid WHERE id > '$last' ORDER BY id DESC LIMIT 500) AS te ORDER BY te.id ASC");
//$qh = mysqli_num_rows($qm);
//if ($qh > 0) {
while($row = mysqli_fetch_array($qm)) {
if (empty($row['av'])) { $avz = wu_noavatar($row['log']); } else { $avz = '/static/avatars/'.$row['av']; }
?>
<div class="fmsg mc_<?php echo $row['id']; ?> conversation-list messages" id="m_<?php echo $row['id']; ?>">
<div class="clearfix">
<div class="chat-avatar">
<img class="thumb-md" src="<?php echo $avz; ?>" />
<i><?php echo date("d.m.y H:i",$row['dt']); ?></i>
</div>
<div class="conversation-text">
<div class="ctext-wrap">
<i><?php echo $row['log']; ?></i>
<p>
<?php echo nl2br(htmlspecialchars($row['msg'])); ?>
</p>
</div>
</div>
</div>
</div>
<?php
}
//} else { echo '<div id="m_1" class="msgnone"><div class="alert alert-info alert-dismissable p-l-40"><i class="md md-info"></i> Пока что нет сообщений.</div></div>'; }
} else { exit('3'); }
?>