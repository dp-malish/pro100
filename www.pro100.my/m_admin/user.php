<?php
$pname = 'Пользователи';
$pkey = 'пользователи';
$pdesc = 'Пользователи';
include('../inc/top_menu.php');
if(!USER_LOGGED || $u_id != $admin_uid) { header ("Location: /"); exit; }
$login = mysqli_real_escape_string($connect_db, $_GET['login']);
?>
<!-- Контент -->

<div class="row">

<?php
if (isset($_GET['login'])) {
$nlog = explode("/", $login);
$nowlog = $nlog['1'];
$row = mysqli_fetch_assoc(mysqli_query($connect_db, "SELECT * FROM `t_users` WHERE log = '$nowlog' LIMIT 1"));
if (empty($row['uid'])) { header ("Location: /m_admin/user"); exit; }
if (empty($row['av'])) { $ref_av = wu_noavatar($row['log']); } else { $ref_av = '/static/avatars/'.$row['av']; }
if (!empty($row['lastip'])) { $multi = mysqli_fetch_assoc(mysqli_query($connect_db, "SELECT uid,log FROM `t_users` WHERE uid = '$row[multi]' LIMIT 1")); $multi_e = $multi['log']; } else { $multi_e = ''; }
$ref = mysqli_fetch_assoc(mysqli_query($connect_db, "SELECT uid,log FROM `t_users` WHERE uid = '$row[ref]' LIMIT 1"));
$iusr = $row['uid'];
?>

<div class="panel panel-default">
<div class="panel-heading"><h3 class="panel-title">Профиль</h3></div>
<div class="panel-body">
<div class="form-group">
<form method="POST" action="#" enctype="multipart/form-data" id="load_avatar_form" style="display:none">
<input type="file" name="ava" accept="image/*" id="av_file">
<input type="hidden" value="<?php echo $token; ?>" name="token" />
<input type="hidden" value="<?php echo $row['uid']; ?>" name="usr" />
</form>  
<label for="av_file"><img src="<?php echo $ref_av; ?>" class="thumb-xl img-circle" style="cursor:pointer" />
</div>
<div class="form-group">
<label for="prf_log">Логин</label>
<input type="text" value="<?php echo htmlspecialchars($row['log']); ?>" class="form-control" id="prf_log" placeholder="Логин" />
</div>
<div class="form-group">
<label for="prf_name">Имя</label>
<input type="text" value="<?php echo htmlspecialchars($row['prf_name']); ?>" class="form-control" id="prf_name" placeholder="Имя" maxlength="100" />
</div>
<div class="form-group">
<label for="prf_fam">Фамилия</label>
<input type="test" class="form-control" value="<?php echo htmlspecialchars($row['prf_fam']); ?>" id="prf_fam" placeholder="Фамилия" maxlength="100" />
</div>
<div class="form-group">
<label for="em">E-mail</label>
<input type="text" class="form-control" value="<?php echo htmlspecialchars($row['em']); ?>" id="em" placeholder="E-mail" maxlength="100" />
</div>
<div class="form-group">
<label for="prf_dt">Дата регистрации</label>
<input type="text" class="form-control" value="<?php echo date('d.m.Y в H:i',$row['dt']); ?>" id="prf_dt" placeholder="Дата регистрации" disabled="disabled" />
</div>
<div class="form-group">
<label for="prf_dtl">Последний вход</label>
<input type="text" class="form-control" value="<?php echo date('d.m.Y в H:i',$row['last']); ?>" id="prf_dtl" placeholder="Последний вход" disabled="disabled" />
</div>
<div class="form-group">
<label for="prf_ip">Регистрационный IP</label>
<input type="text" class="form-control" value="<?php echo htmlspecialchars($row['ip']); ?>" id="prf_ip" placeholder="Регистрационный IP" disabled="disabled" />
</div>
<div class="form-group">
<label for="prf_ipl">Последний IP</label>
<input type="text" class="form-control" value="<?php echo htmlspecialchars($row['lastip']); ?>" id="prf_ipl" placeholder="Последний IP" disabled="disabled" />
</div>
<div class="form-group">
<label for="prf_multi">Мультиаккаунт</label>
<input type="text" class="form-control" value="<?php echo $multi_e; ?>" id="prf_multi" placeholder="Нет" disabled="disabled" />
</div>
<div class="form-group">
<label for="prf_hits">Переходы по ссылке</label>
<input type="text" class="form-control" value="<?php echo $row['hits']; ?>" id="prf_hits" placeholder="Переходы по ссылке" disabled="disabled" />
</div>
<div class="form-group">
<label for="prf_ref">Куратор (<?php echo $ref['log']; ?>)</label>
<input type="text" class="form-control" value="<?php echo $row['ref']; ?>" id="prf_ref" placeholder="Куратор" maxlength="100" />
</div>
<div class="form-group">
<label for="prf_lvl">Уровень</label>
<input type="text" class="form-control" value="<?php echo $row['level']; ?>" id="prf_lvl" placeholder="Уровень" maxlength="100" />
</div>
<div class="form-group">
<label for="prf_prf">Баланс</label>
<input type="text" class="form-control" value="<?php echo $row['bal']; ?>" id="prf_bal" placeholder="Баланс" maxlength="100" />
</div>
<div class="form-group">
<label for="prf_prf">Профит</label>
<input type="text" class="form-control" value="<?php echo $row['profit']; ?>" id="prf_prf" placeholder="Профит" maxlength="100" />
</div>
<div class="form-group">
<label for="prf_pass">Новый пароль</label>
<input type="text" class="form-control" value="" id="prf_pass" placeholder="Новый пароль" />
</div>
<div class="form-group">
<label for="prf_ban">Бан</label>
<input type="text" class="form-control" value="<?php echo htmlspecialchars($row['ban']); ?>" id="prf_ban" placeholder="Введите причину бана" />
</div>
<center><button id="save_prf" class="btn btn-info waves-effect waves-light">Сохранить</button></center>
</div>
</div>


<div class="row">
<div class="col-md-6">
<div class="panel panel-default">
<div class="panel-heading"><h3 class="panel-title">Контактные данные</h3></div>
<div class="panel-body">
<div class="form-group">
<label for="cont_vk">Вконтакте</label>
<input type="text" class="form-control" id="cont_vk" value="<?php echo htmlspecialchars($row['cont_vk']); ?>"  placeholder="https://vk.com/id274020773" maxlength="100" />
</div>
<div class="form-group">
<label for="cont_ok">Одноклассники</label>
<input type="text" class="form-control" id="cont_ok" value="<?php echo htmlspecialchars($row['cont_ok']); ?>"  placeholder="https://ok.ru/profile/12345" maxlength="100" />
</div>
<div class="form-group">
<label for="cont_fb">Facebook</label>
<input type="text" class="form-control" id="cont_fb" value="<?php echo htmlspecialchars($row['cont_fb']); ?>"  placeholder="https://facebook.com/user" maxlength="100" />
</div>
<div class="form-group">
<label for="cont_wa">WhatsApp</label>
<input type="text" class="form-control" id="cont_wa" value="<?php echo htmlspecialchars($row['cont_wa']); ?>"  placeholder="Ваш WhatsApp" maxlength="50" />
</div>
<div class="form-group">
<label for="cont_vb">Viber</label>
<input type="text" class="form-control" id="cont_vb" value="<?php echo htmlspecialchars($row['cont_vi']); ?>"  placeholder="Ваш Viber" maxlength="50" />
</div>
<div class="form-group">
<label for="cont_sk">Skype</label>
<input type="text" class="form-control" id="cont_sk" value="<?php echo htmlspecialchars($row['cont_sk']); ?>"  placeholder="Ваш Skype" maxlength="100" />
</div>
<div class="form-group">
<label for="cont_tg">Telegram</label>
<input type="text" class="form-control" id="cont_tg" value="<?php echo htmlspecialchars($row['cont_te']); ?>"  placeholder="Ваш Telegram" maxlength="100" />
</div>
<div class="form-group">
<label for="cont_icq">ICQ</label>
<input type="text" class="form-control" id="cont_icq" value="<?php echo htmlspecialchars($row['cont_icq']); ?>"  placeholder="Ваш ICQ" maxlength="50" />
</div>
<div class="form-group">
<label for="cont_sms">SMS</label>
<input type="text" class="form-control" id="cont_sms" value="<?php echo htmlspecialchars($row['cont_sms']); ?>"  placeholder="Номер Вашего телефона" maxlength="50" />
</div>
<center><button id="save_cont" class="btn btn-info waves-effect waves-light">Сохранить</button></center>
</div>
</div>
</div>

<div class="col-md-6">
<div class="panel panel-default">
<div class="panel-heading"><h3 class="panel-title">Платёжные данные</h3></div>
<div class="panel-body">
<div class="form-group">
<label for="pay_payeer">Payeer</label>
<input type="text" class="form-control" id="pay_payeer" value="<?php echo htmlspecialchars($row['pay_payeer']); ?>"  placeholder="P12345678" maxlength="20" />
</div>
<div class="form-group" style="display:none">
<label for="pay_yad">Perfect Money</label>
<input type="text" class="form-control" id="pay_pm" value="<?php echo htmlspecialchars($row['pay_pm']); ?>"  placeholder="U123456" maxlength="50" />
</div>
<center><button id="save_ps" class="btn btn-info waves-effect waves-light">Сохранить</button></center>
</div>
</div>
</div>
</div>


<div class="panel panel-default">
<div class="panel-heading" style="cursor:pointer" onclick="$('#lvl1').toggle('slow');">
<h3 class="panel-title">1 линия (<?php echo intval(mysqli_num_rows(mysqli_query($connect_db, "SELECT uid FROM t_users WHERE ref='$iusr' AND level > '0'"))); ?>/2)</h3>
</div>
<div class="panel-body" id="lvl1" style="display:none">
<table class="refslist">
<?php
$wu_q = mysqli_query($connect_db, "SELECT uid,log,av,dt FROM t_users WHERE ref='$iusr' AND level > '0'");
$reflist_1 = '';
if (mysqli_num_rows($wu_q) > 0) {
while($rowr = mysqli_fetch_assoc($wu_q)) {
$reflist_1 .= $rowr['uid'].', ';
if (empty($rowr['av'])) { $ref_av = wu_noavatar($rowr['log']); } else { $ref_av = '/static/avatars/'.$rowr['av']; }
?>
<tr>
<td><img src="<?php echo $ref_av; ?>" class="thumb-md img-circle" /></td>
<td><?php echo $rowr['log']; ?></td>
<td><a href="/m_admin/user/<?php echo $rowr['log']; ?>" target="_blank" data-toggle="tooltip" data-placement="bottom" data-original-title="Смотреть профиль"><i class="fa fa-user"></i></a></td>
</tr>
<?php } } else { echo '<tr><td>Рефералов нет</td</tr>'; } $reflist_1 = substr($reflist_1,0,-2); ?>
</table>
</div>
</div>

<div class="panel panel-default">
<div class="panel-heading" style="cursor:pointer" onclick="$('#lvl2').toggle('slow');">
<h3 class="panel-title">2 линия (<?php echo intval(mysqli_num_rows(mysqli_query($connect_db, "SELECT uid FROM t_users WHERE ref IN ($reflist_1) AND level > '0'"))); ?>/4)</h3>
</div>
<div class="panel-body" id="lvl2" style="display:none">
<table class="refslist">
<?php
$wu_q = mysqli_query($connect_db, "SELECT uid,log,av,dt FROM t_users WHERE ref IN ($reflist_1) AND level > '0'");
$reflist_2 = '';
if (mysqli_num_rows($wu_q) > 0) {
while($rowr = mysqli_fetch_assoc($wu_q)) {
$reflist_2 .= $rowr['uid'].', ';
if (empty($rowr['av'])) { $ref_av = wu_noavatar($rowr['log']); } else { $ref_av = '/static/avatars/'.$rowr['av']; }
?>
<tr>
<td><img src="<?php echo $ref_av; ?>" class="thumb-md img-circle" /></td>
<td><?php echo $rowr['log']; ?></td>
<td><a href="/m_admin/user/<?php echo $rowr['log']; ?>" target="_blank" data-toggle="tooltip" data-placement="bottom" data-original-title="Смотреть профиль"><i class="fa fa-user"></i></a></td>
</tr>
<?php } } else { echo '<tr><td>Рефералов нет</td</tr>'; } $reflist_2 = substr($reflist_2,0,-2); ?>
</table>
</div>
</div>

<div class="panel panel-default">
<div class="panel-heading" style="cursor:pointer" onclick="$('#lvl3').toggle('slow');">
<h3 class="panel-title">3 линия (<?php echo intval(mysqli_num_rows(mysqli_query($connect_db, "SELECT uid FROM t_users WHERE ref IN ($reflist_2) AND level > '0'"))); ?>/8)</h3>
</div>
<div class="panel-body" id="lvl3" style="display:none">
<table class="refslist">
<?php
$wu_q = mysqli_query($connect_db, "SELECT uid,log,av,dt FROM t_users WHERE ref IN ($reflist_2) AND level > '0'");
$reflist_3 = '';
if (mysqli_num_rows($wu_q) > 0) {
while($rowr = mysqli_fetch_assoc($wu_q)) {
$reflist_3 .= $rowr['uid'].', ';
if (empty($rowr['av'])) { $ref_av = wu_noavatar($rowr['log']); } else { $ref_av = '/static/avatars/'.$rowr['av']; }
?>
<tr>
<td><img src="<?php echo $ref_av; ?>" class="thumb-md img-circle" /></td>
<td><?php echo $rowr['log']; ?></td>
<td><a href="/m_admin/user/<?php echo $rowr['log']; ?>" target="_blank" data-toggle="tooltip" data-placement="bottom" data-original-title="Смотреть профиль"><i class="fa fa-user"></i></a></td>
</tr>
<?php } } else { echo '<tr><td>Рефералов нет</td</tr>'; } $reflist_3 = substr($reflist_3,0,-2); ?>
</table>
</div>
</div>

<div class="panel panel-default">
<div class="panel-heading" style="cursor:pointer" onclick="$('#lvl4').toggle('slow');">
<h3 class="panel-title">4 линия (<?php echo intval(mysqli_num_rows(mysqli_query($connect_db, "SELECT uid FROM t_users WHERE ref IN ($reflist_3) AND level > '0'"))); ?>/16)</h3>
</div>
<div class="panel-body" id="lvl4" style="display:none">
<table class="refslist">
<?php
$wu_q = mysqli_query($connect_db, "SELECT uid,log,av,dt FROM t_users WHERE ref IN ($reflist_3) AND level > '0'");
$reflist_4 = '';
if (mysqli_num_rows($wu_q) > 0) {
while($rowr = mysqli_fetch_assoc($wu_q)) {
$reflist_4 .= $rowr['uid'].', ';
if (empty($rowr['av'])) { $ref_av = wu_noavatar($rowr['log']); } else { $ref_av = '/static/avatars/'.$rowr['av']; }
?>
<tr>
<td><img src="<?php echo $ref_av; ?>" class="thumb-md img-circle" /></td>
<td><?php echo $rowr['log']; ?></td>
<td><a href="/m_admin/user/<?php echo $rowr['log']; ?>" target="_blank" data-toggle="tooltip" data-placement="bottom" data-original-title="Смотреть профиль"><i class="fa fa-user"></i></a></td>
</tr>
<?php } } else { echo '<tr><td>Рефералов нет</td</tr>'; } $reflist_4 = substr($reflist_4,0,-2); ?>
</table>
</div>
</div>

<div class="panel panel-default">
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

<!--<div class="panel panel-default">
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
<h3 class="panel-title">Неактивные (<?php echo intval(mysqli_num_rows(mysqli_query($connect_db, "SELECT uid FROM t_users WHERE ref='$iusr' AND level = '0'"))); ?>)</h3>
</div>
<div class="panel-body" id="noa" style="display:none">
<table class="refslist">
<?php
$wu_q = mysqli_query($connect_db, "SELECT uid,log,av,dt FROM t_users WHERE ref='$iusr' AND level = '0'");
if (mysqli_num_rows($wu_q) > 0) {
while($rowr = mysqli_fetch_assoc($wu_q)) {
if (empty($rowr['av'])) { $ref_av = wu_noavatar($rowr['log']); } else { $ref_av = '/static/avatars/'.$rowr['av']; }
?>
<tr>
<td><img src="<?php echo $ref_av; ?>" class="thumb-md img-circle" /></td>
<td><?php echo $rowr['log']; ?></td>
<td><a href="/m_admin/user/<?php echo $rowr['log']; ?>" target="_blank" data-toggle="tooltip" data-placement="bottom" data-original-title="Смотреть профиль"><i class="fa fa-user"></i></a></td>
</tr>
<?php } } else { echo '<tr><td>Рефералов нет</td</tr>'; } ?>
</table>
</div>
</div>

</div>


<script type='text/javascript'>
$(function() {
$("#av_file").change(function() {
var data = new FormData($('#load_avatar_form')[0]);
$.ajax({
type: 'POST',
processData: false,
contentType: false,
url: '/actions/a_avatar_upload.php',
data: data,
cache: false,
success: function(result){
if (result == '0') {
$.jGrowl('Картинка не загружена или имеет неверный формат', { theme: 'growl-error' });
}
if (result == '1') {
$(location).attr('href','/m_admin/user/<?php echo htmlspecialchars($row['log']); ?>');
}
if (result == '3') {
$.jGrowl('Ошибка', { theme: 'growl-error' });
}
if (result == '4') {
$.jGrowl('Размер изображения не должен превышать 300 Кб', { theme: 'growl-error' });
}
},
error: function(){
$.jGrowl('Ответ от сервера не получен', { theme: 'growl-error' });
}
});
});

$('#save_prf').click(function(){
var name = $('#prf_name').val();
var fam = $('#prf_fam').val();
var em = $('#em').val();
var log = $('#prf_log').val();
var ref = $('#prf_ref').val();
var pass = $('#prf_pass').val();
var level = $('#prf_lvl').val();
var bal = $('#prf_bal').val();
var profit = $('#prf_prf').val();
var ban = $('#prf_ban').val();
$.ajax({
type: 'POST',
url: '/actions/a_prf_names_save.php',
data: {'usr': '<?php echo $row['uid']; ?>', 'log': log, 'ref': ref, 'pass': pass, 'level': level, 'bal': bal, 'profit': profit, 'ban': ban, 'name': name, 'fam': fam, 'em': em, 'token': '<?php echo $token; ?>'},
cache: false,
success: function(result){
if (result == '1') {
$.jGrowl('Успешно', { theme: 'growl-success' });
}
if (result == '2') {
$.jGrowl('Вы не авторизованы', { theme: 'growl-error' });
}
if (result == '3') {
$.jGrowl('Ошибка', { theme: 'growl-error' });
}
if (result == '4') {
$.jGrowl('Поля Логин и куратор обязательны к заполнению', { theme: 'growl-error' });
}
if (result == '5') {
$.jGrowl('Такого куратора не существует', { theme: 'growl-error' });
}
}
});
});

$('#save_cont').click(function(){
var vk = $('#cont_vk').val();
var ok = $('#cont_ok').val();
var fb = $('#cont_fb').val();
var wa = $('#cont_wa').val();
var vb = $('#cont_vb').val();
var sk = $('#cont_sk').val();
var tg = $('#cont_tg').val();
var icq = $('#cont_icq').val();
var sms = $('#cont_sms').val();
$.ajax({
type: 'POST',
url: '/actions/a_prf_cont_save.php',
data: {'usr': '<?php echo $row['uid']; ?>', 'vk': vk, 'ok': ok, 'fb': fb, 'wa': wa, 'vb': vb, 'sk': sk, 'tg': tg, 'icq': icq, 'sms': sms, 'token': '<?php echo $token; ?>'},
cache: false,
success: function(result){
if (result == '1') {
$.jGrowl('Успешно', { theme: 'growl-success' });
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

$('#save_ps').click(function(){
var payeer = $('#pay_payeer').val();
var pm = $('#pay_pm').val();
$.ajax({
type: 'POST',
url: '/actions/a_prf_ps_save.php',
data: {'usr': '<?php echo $row['uid']; ?>', 'payeer': payeer, 'pm': pm, 'token': '<?php echo $token; ?>'},
cache: false,
success: function(result){
if (result == '1') {
$.jGrowl('Успешно', { theme: 'growl-success' });
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

$('#change_pass').click(function(){
var now = $('#pass_now').val();
var pnew = $('#pass_new').val();
var pnewre = $('#pass_new_re').val();
$.ajax({
type: 'POST',
url: '/actions/pass_change.php',
data: {'now': now, 'pnew': pnew, 'pnewre': pnewre, 'token': '<?php echo $token; ?>'},
cache: false,
success: function(result){
if (result == '0') {
$.jGrowl('Текущий пароль введён неверно', { theme: 'growl-error' });
}
if (result == '1') {
$.jGrowl('Пароль успешно изменён', { theme: 'growl-success' }); $('#pass_now,#pass_new,#pass_new_re').val('');
}
if (result == '2') {
$.jGrowl('Новый пароль и его повтор не совпадают', { theme: 'growl-error' });
}
if (result == '3') {
$.jGrowl('Новый пароль совпадает с текущим', { theme: 'growl-error' });
}
if (result == '4') {
$.jGrowl('Вы не авторизованы', { theme: 'growl-error' });
}
if (result == '5') {
$.jGrowl('Новый пароль меньше 3-х символов', { theme: 'growl-error' });
}
if (result == '6') {
$.jGrowl('Ошибка', { theme: 'growl-error' });
}
if (result == '7') {
$.jGrowl('Не заполнены все необходимые поля', { theme: 'growl-error' });
}
}
});
});

$('#ref_change').click(function(){
var ref = $('#ref_now').val();
$.ajax({
type: 'POST',
url: '/actions/ref_change.php',
data: {'ref': ref, 'token': '<?php echo $token; ?>'},
cache: false,
success: function(result){
if (result == '1') {
$(location).attr('href','/cabinet/profile');
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



<?php } else { ?>

<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title">Пользователи</h3>
</div>
<div class="panel-body">

<button class="btn btn-info waves-effect waves-light" onclick='$("#msg_w").toggle("slow");' style="width: 250px;">Определённый пользователь</button>
<div id="msg_w" style="display:none">
<br />
<input id="wr" type="text" placeholder="Ник пользоателя" autocomplete="off" class="form-control" style="width: 150px; display: inline-block;" />
<button class="btn btn-info waves-effect waves-light" onclick="location.href='/m_admin/user/'+document.getElementById('wr').value" style="width: 95px; display: inline-block;font-size: 13px;">Смотреть</button>
</div>
<br /><br />

<div class="table-responsive">
<table class="refslist">
<?php
$page = intval($_GET['page']);
$num = 20;
if ($page==0) $page=1;
$querys = "SELECT count(`uid`) FROM t_users";
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
if ($page != 1) $pervpage = '<li><a href="/m_admin/user?page='. ($page - 1).'">Предыдущая страница</a></li>';
if ($page != $total) $nextpage = '<li><a href="/m_admin/user?page='. ($page + 1).'">Следующая страница</a></li>';
$qm = mysqli_query($connect_db, "SELECT uid,log,av FROM t_users ORDER BY uid DESC LIMIT $start, $num");
while($row = mysqli_fetch_array($qm)) {
if (empty($row['av'])) { $ref_av = wu_noavatar($row['log']); } else { $ref_av = '/static/avatars/'.$row['av']; }
?>
<tr>
<td><img src="<?php echo $ref_av; ?>" class="thumb-md img-circle" /></td>
<td><?php echo $row['log']; ?></td>
<td><a href="/m_admin/user/<?php echo $row['log']; ?>" target="_blank" data-toggle="tooltip" data-placement="bottom" data-original-title="Смотреть профиль"><i class="fa fa-user"></i></a></td>
</tr>
<?php }
if ($total>1) { echo '<tr><td colspan="3"><ul class="pager">'.$pervpage.$nextpage.'</ul></td</tr>'; }
?>
</table>
</div>
</div>
</div>

<?php } ?>

</div>

<!-- /Контент -->
<?php include('../inc/bottom_menu.php'); ?>