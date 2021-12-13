<?php
$pname = 'Поддержка';
$pkey = 'поддержка';
$pdesc = 'Поддержка';
include('../inc/top_menu.php');
if(!USER_LOGGED) { header ("Location: /"); exit; }
?>
<!-- Контент -->

<div class="row">

<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title">Служба поддержки</h3>
</div>
<div class="panel-body">

<?php
if(!isset($_GET['id'])) { ?>
<button class="btn btn-info waves-effect waves-light" data-toggle="modal" data-target="#t_new" style="width: 250px;">Создать тикет</button>
<div id="t_new" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="balance_out_label" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
<h4 class="modal-title" id="balance_out_label">Новый тикет</h4>
</div>
<div class="modal-body">
<div class="form-group">
<label for="t_th">Тема обращения</label>
<input type="text" class="form-control" id="t_th" placeholder="Тема обращения">
</div>
<div class="form-group">
<label for="t_msg">Текст обращения</label>
<textarea style="width: 100%;" class="form-control" rows="3" cols="1" placeholder="Текст обращения" id="t_msg"></textarea>
</div>
</div>
<div class="modal-footer m-t-20">
<button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Отменить</button>
<button id="t_submit" class="btn btn-info waves-effect waves-light">Создать</button>
</div>
</div>
</div>
</div>
<br /><br />
<?php
$st = "SELECT id,theme,stu FROM `t_ticket_name` WHERE usr = '$u_id' ORDER BY dt DESC";
$qt = mysqli_query($connect_db, $st);
$ht = mysqli_num_rows($qt);
if ($ht > 0) {
?>
<div class="table-responsive">
<table class="table table-hover">
<thead>
<tr align="center">
<th>id</th>
<th>Тема обращения</th>
<th>Статус</th>
<th>Действия</th>
</tr>
</thead>
<tbody>
<?php
while($row = mysqli_fetch_array($qt)) {
?>
<tr>
<td><?php echo $row['id']; ?></td>
<td><a href="/cabinet/support/<?php echo $row['id']; ?>"><?php echo htmlspecialchars($row['theme']); ?></td>
<td><?php if ($row['stu'] == 0) { ?>Открыт<?php } else { echo '<font color="green">Отвечено</font>'; } ?></td>
<td><a class="btn btn-danger btn-sm waves-effect waves-light" href="javascript://" onclick="ticket_del('<?php echo $row['id']; ?>')"><i class="fa fa-close"></i></a><td>
</tr>
<?php } ?>
</tbody>
</table>
</div>
<?php } else { echo '<div class="alert alert-info alert-dismissable p-l-40"><i class="md md-info"></i> У Вас пока что нет обращений.</div>'; } ?>

<div id="ticket_del" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="balance_out_label" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
<h4 class="modal-title" id="balance_out_label">Удаление</h4>
</div>
<div class="modal-body">
<div class="alert alert-info alert-dismissable p-l-40 margnone">
<i class="md md-info"></i> Вы уверены что хотите удалить тикет? Все сообщения будут удалены.
</div>
</div>
<div class="modal-footer m-t-20">
<button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Отменить</button>
<button id="btn_del" class="btn btn-danger waves-effect waves-light">Удалитть</button>
</div>
</div>
</div>
</div>

<script type='text/javascript'>
var vrdel;
function ticket_del(id){
vrdel = id;
$('#ticket_del').modal('show');
};
$(function() {
$('#btn_del').click(function(){
$.ajax({
type: 'POST',
url: '/actions/ticket_del.php',
data: {'id': vrdel, 'token': '<?php echo $token; ?>'},
cache: false,
success: function(result){
if (result == '1') {
$(location).attr('href','/cabinet/support');
}
if (result == '3') {
$.jGrowl('Ошибка', { theme: 'growl-error' });
}
},
error: function(){
$.jGrowl('Ошибка', { theme: 'growl-error' });
}
});
});

$('#t_submit').click(function(){
var th = $('#t_th').val();
var msg = $('#t_msg').val();
$.ajax({
type: 'POST',
url: '/actions/ticket_new.php',
data: {'th': th, 'msg': msg, 'token': '<?php echo $token; ?>'},
cache: false,
success: function(result){
if (result == '0') {
$.jGrowl('Не заполнены все необходимые поля', { theme: 'growl-error' });
}
if (result == '1') {
$(location).attr('href','/cabinet/support');
}
if (result == '2') {
$.jGrowl('Вы не авторизованы', { theme: 'growl-error' });
}
if (result == '3') {
$.jGrowl('Ошибка', { theme: 'growl-error' });
}
}
});
});
});
</script>

<?php } else {
$tget = intval($_GET['id']);
$nowt = mysqli_fetch_assoc(mysqli_query($connect_db, "SELECT id,theme FROM t_ticket_name WHERE id='$tget' AND usr='$u_id' LIMIT 1"));
if(empty($nowt['id'])) { header ("Location: /cabinet/support"); exit; }
mysqli_query($connect_db, "UPDATE t_ticket_name SET stu = '0' WHERE id='$tget' LIMIT 1");
$onl = mysqli_num_rows(mysqli_query($connect_db, "SELECT id FROM t_online WHERE uid='$admin_uid' LIMIT 1"));
?>
<div class="block" style="margin: 0; width: auto;">
<div class="chat-member-heading clearfix">
<h5 class="pull-left"><?php echo htmlspecialchars($nowt['theme']); ?> <small>&nbsp;/&nbsp; Оператор <?php if ($onl == 0) { echo 'офлайн'; } else { echo 'онлайн'; } ?></small></h5>
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
var to = '<?php echo $tget; ?>';
var text = $('#textm').val();
$.ajax({
type: 'POST',
url: '/actions/ticket_send.php',
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
if (result == '3') {
$.jGrowl('Тикет не найден', { theme: 'growl-error' });
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
url: '/actions/ticket_last.php',
data: {'ticket': '<?php echo $tget; ?>', 'last': last, 'token': '<?php echo $token; ?>'},
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
url: '/actions/ticket_load.php',
data: {'ticket': '<?php echo $tget; ?>', 'last': last, 'token': '<?php echo $token; ?>'},
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