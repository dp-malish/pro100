<?php
$pname = 'Сообщения';
$pkey = 'Сообщения';
$pdesc = 'Сообщения';
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

<?php
if(!isset($_GET['login'])) { ?>
<button class="btn btn-info waves-effect waves-light" onclick='$("#msg_w").toggle("slow");' style="width: 250px;">Написать пользователю</button>
<div id="msg_w" style="display:none">
<br />
<input id="wr" type="text" placeholder="Ник пользоателя" autocomplete="off" class="form-control" style="width: 150px; display: inline-block;" />
<button class="btn btn-info waves-effect waves-light" onclick="location.href='/cabinet/messages/'+document.getElementById('wr').value" style="width: 95px; display: inline-block;font-size: 13px;">Написать</button>
</div>
<br /><br />
<?php
if (isset($_GET['st']) && $_GET['st'] == 'not') { echo '<div class="alert alert-info alert-dismissable p-l-40"><i class="md md-info"></i> Пользователь с таким логином не найден.</div>'; }
$st = "SELECT id,wi,msg,msg_o.dt,st,log,av FROM ( SELECT id, `fr` AS fr, `tou` AS wi, `msg`,`dt`,0 AS `st` FROM t_messages AS m1 WHERE `fr` = '$u_id' UNION SELECT id, `tou` AS wi, `fr` AS wi, `msg`,`dt`,`st` FROM t_messages AS m2 WHERE `tou` = '$u_id' ORDER BY `id` DESC ) AS msg_o INNER JOIN t_users ON msg_o.wi = t_users.uid GROUP BY `wi` ORDER BY `dt` DESC";
$qt = mysqli_query($connect_db, $st);
$ht = mysqli_num_rows($qt);
if ($ht > 0) { ?>
<br />
<div class="table-responsive">
<table class="table table-hover mails" align="center" cellpadding="0" cellspacing="0">
<?php while($row = mysqli_fetch_array($qt)) {
$onl = mysqli_num_rows(mysqli_query($connect_db, "SELECT id FROM t_online WHERE uid='$row[wi]' LIMIT 1"));
if (empty($row['av'])) { $avr = wu_noavatar($row['log']); } else { $avr = '/static/avatars/'.$row['av']; }
?>
<tr class="line mail_tr respons_tr" onclick="location.href = '/cabinet/messages/<?php echo $row['log']; ?>'" style="cursor:pointer">
<td style="text-align: left">
<table>
<tr>
<td>
<center>
<img class="thumb-md img-circle" style="display: inline-block;" src="<?php echo $avr; ?>" alt="">
<br />
<span class="<?php if ($onl > 0) { echo 'loginz'; } ?>"><?php echo $row['log']; ?></span>
</center>
</td>
</tr>
</table>
</td>
<td style="text-align: left;<?php if ($row['st'] == 1) { echo ' color: #1b1b1b;'; } ?>"><?php echo htmlspecialchars($row['msg']); ?></td>
</tr>
<?php } ?>
</table>
</div>
<?php } else { echo '<div class="alert alert-info alert-dismissable p-l-40"><i class="md md-info"></i> У Вас пока что нет диалогов с пользователями.</div>'; } ?>

<?php } else {
$getu = mysqli_real_escape_string($connect_db, trim($_GET['login']));
$nlogp = explode('/', $getu);
$getuser = mysqli_real_escape_string($connect_db, $nlogp['1']);
$nlog = mysqli_fetch_assoc(mysqli_query($connect_db, "SELECT uid,log FROM t_users WHERE log='$getuser' LIMIT 1"));
$usr = $nlog['uid'];
if(empty($usr)) { header ("Location: /cabinet/messages?st=not"); exit; }
mysqli_query($connect_db, "UPDATE `t_messages` SET `st` = '0' WHERE `fr` = '$usr' AND `tou` = '$u_id'");
$onl = mysqli_num_rows(mysqli_query($connect_db, "SELECT id FROM t_online WHERE uid='$usr' LIMIT 1"));
?>
<div class="block" style="margin: 0; width: auto;">
<div class="chat-member-heading clearfix">
<h5 class="pull-left"><a href="/cabinet/user/<?php echo $nlog['log']; ?>" class="igray" target="_blank"><i class="fa fa-user"></i> <?php echo $nlog['log']; ?></a><!-- <small>&nbsp;/&nbsp; <?php if ($onl == 0) { echo 'Офлайн'; } else { echo 'Онлайн'; } ?></small>--></h5>
</div>
<div class="chat" id="chatzz" style="padding: 10px 0;max-height: 570px;overflow: auto;">
<div style="display:none" id="m_0"></div>
</div>
<center>
<textarea style="width: 100%;" name="enter-message" class="form-control" rows="3" cols="1" placeholder="Текст сообщения" id="textm"></textarea>
<div class="message-controls">
<button id="btnr" onclick="msg_last();" class="btn btn-info waves-effect waves-light" style="display:none;width: 200px; margin-top: 10px;">Обновить</button>
<button id="submitb" class="btn btn-info waves-effect waves-light" style="width: 200px; margin-top: 10px;">Отправить сообщение</button>
<br />
<div class="checkbox">
<input type="checkbox" id="audio_on" />
<label for="audio_on">
Звуковые оповещения
</label>
</div>
<div class="checkbox">
<input type="checkbox" class="c-check" id="enter_on" />
<label for="enter_on">
Отправка клавишей Enter
</label>
</div>
<div class="checkbox">
<input type="checkbox" class="c-check" id="reauto_on" />
<label for="reauto_on">
Автообновление
</label>
</div>
</center>
</div>
</div>
<br />
<audio id="msg_sound" style="display:none" controls preload="auto">
<source src="/static/audio/msg.mp3" controls></source>
<source src="/static/audio/msg.ogg" controls></source>
</audio>
<script src="/static/cabinet/js/jquery.cookie.js"></script>
<script type='text/javascript'>
window.onload = function(){
window.scrollTo(0, 999999999999999);
var block = document.getElementById("chatzz");
block.scrollTop = block.scrollHeight;
}

var msg_audio = 1;
var msg_enter = 1;
var msg_reauto = 1;
$(document).ready(function(){
if ($.cookie('audio_on')) {
if ($.cookie('audio_on') == 1) {
msg_audio = 1;
$("#audio_on").attr("checked","checked");
}
if ($.cookie('audio_on') == 0) {
msg_audio = 0;
}
} else {
msg_audio = 1;
$("#audio_on").attr("checked","checked");
}
if ($.cookie('enter_on')) {
if ($.cookie('enter_on') == 1) {
msg_enter = 1;
$("#enter_on").attr("checked","checked");
}
if ($.cookie('enter_on') == 0) {
msg_enter = 0;
}
} else {
msg_enter = 1;
$("#enter_on").attr("checked","checked");
}
if ($.cookie('reauto_on')) {
if ($.cookie('reauto_on') == 1) {
msg_reauto = 1;
$("#reauto_on").attr("checked","checked");
}
if ($.cookie('reauto_on') == 0) {
$('#btnr').show('');
msg_reauto = 0;
}
} else {
msg_reauto = 1;
$("#reauto_on").attr("checked","checked");
}
msg_load();
});

$(function() {
var btnn = $('#audio_on');
btnn.click(function(){
var ison = btnn.prop('checked');
if (ison == true) {
msg_audio = 1;
$.cookie('audio_on', '1');
}
if (ison == false) {
msg_audio = 0;
$.cookie('audio_on', '0');
}
});
var btne = $('#enter_on');
btne.click(function(){
var isone = btne.prop('checked');
if (isone == true) {
msg_enter = 1;
$.cookie('enter_on', '1');
}
if (isone == false) {
msg_enter = 0;
$.cookie('enter_on', '0');
}
});
var btnr = $('#reauto_on');
btnr.click(function(){
var isonr = btnr.prop('checked');
if (isonr == true) {
$('#btnr').hide(0);
msg_reauto = 1;
$.cookie('reauto_on', '1');
}
if (isonr == false) {
$('#btnr').show(0);
msg_reauto = 0;
$.cookie('reauto_on', '0');
}
});
function msg_send(){
var to = '<?php echo $usr; ?>';
var text = $('#textm').val();
$.ajax({
type: 'POST',
url: '/actions/msg_send.php',
data: {'to': to, 'text': text, 'token': '<?php echo $token; ?>'},
cache: false,
success: function(result){
if (result == '0') {
$.jGrowl('Вы не ввели сообщение', { theme: 'growl-error' });
}
if (result == '1') {
$('#textm').val('');
msg_load();
}
if (result == '2') {
$.jGrowl('Пользователь не найден', { theme: 'growl-error' });
}
if (result == '5') {
$.jGrowl('У вас должен быть уровень 1 и выше', { theme: 'growl-error' });
}
if (result == '3') {
$.jGrowl('Вы не можете писать сами себе', { theme: 'growl-error' });
}
},
error: function(){
serr();
}
});
}
var btns = $('#submitb');
btns.click(function() {
msg_send();
});
$("#textm").keydown(function(event) {
if ( event.keyCode == 13) {
if (msg_enter == 1) {
msg_send();
return false;
}
}
});
});

function msg_last(){
var last = $('#chatzz').children().last().attr('id');
$.ajax({
type: 'POST',
url: '/actions/msg_last.php',
data: {'usr': '<?php echo $usr; ?>', 'last': last, 'token': '<?php echo $token; ?>'},
cache: false,
success: function(result){
if (result == '1') {
msg_load();
if (msg_audio == 1) {
var msg_sound = $("#msg_sound")[0];
msg_sound.pause();
msg_sound.play();
}
}
}
});
};
function msg_load(){
var last = $('#chatzz').children().last().attr('id');
$.ajax({
type: 'POST',
url: '/actions/msg_load.php',
data: {'usr': '<?php echo $usr; ?>', 'last': last, 'token': '<?php echo $token; ?>'},
cache: false,
success: function(result){
if (result == '3') {
} else {
$('.msgnone').hide('');
var tobottom = 0;
var block = document.getElementById("chatzz");
if (block.scrollHeight - block.scrollTop === block.clientHeight) {
tobottom = 1;
}
$('#chatzz').append(result);
if (tobottom === 1) { block.scrollTop = block.scrollHeight; }
$('#chatzz [id]').each(function() {
var idAttr = $(this).attr('id'),
selector = '[id=' + idAttr + ']';
if ($(selector).length > 1) {
$(selector).not(':first').remove();  
}
});
}
}
});
};
setInterval(function() {
if (msg_reauto == 1) { msg_last(); }
}, 3000);
</script>
<?php } ?>

</div>
</div>
</div>

<!-- /Контент -->
<?php include('../inc/bottom_menu.php'); ?>