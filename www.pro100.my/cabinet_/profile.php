<?php
$pname = 'Настройки профиля';
$pkey = 'Настройки профиля';
$pdesc = 'Настройки Вашего профиля';
include('../inc/top_menu.php');
if(!USER_LOGGED) { header ("Location: /"); exit; }
$usri = mysqli_fetch_assoc(mysqli_query($connect_db, "SELECT * FROM t_users WHERE uid = '$u_id' LIMIT 1"));
?>
<!-- Контент -->

<div class="row">

<div class="panel panel-default">
<div class="panel-heading"><h3 class="panel-title">Профиль</h3></div>
<div class="panel-body">
<div class="form-group">
<form method="POST" action="#" enctype="multipart/form-data" id="load_avatar_form" style="display:none">
<input type="file" name="ava" accept="image/*" id="av_file">
<input type="hidden" value="<?php echo $token; ?>" name="token" />
</form>  
<label for="av_file"><img src="<?php echo $avz; ?>" class="thumb-xl img-circle" style="cursor:pointer" />
</div>
<div class="form-group">
<label for="prf_name">Имя</label>
<input type="text" value="<?php echo htmlspecialchars($usri['prf_name']); ?>" class="form-control" id="prf_name" placeholder="Ваше имя" maxlength="100" />
</div>
<div class="form-group">
<label for="prf_fam">Фамилия</label>
<input type="test" class="form-control" value="<?php echo htmlspecialchars($usri['prf_fam']); ?>" id="prf_fam" placeholder="Ваша фамилия" maxlength="100" />
</div>
<div class="form-group">
<label for="em">E-mail</label>
<input type="text" class="form-control" value="<?php echo htmlspecialchars($usri['em']); ?>" id="em" placeholder="Ваш E-mail" maxlength="100" />
</div>
<center><button id="save_prf" class="btn btn-info waves-effect waves-light">Сохранить</button></center>
</div>
</div>


<div class="row">
<div class="col-md-6">
<div class="panel panel-default">
<div class="panel-heading"><h3 class="panel-title">Контактные данные</h3></div>
<div class="panel-body">
<div class="alert alert-info alert-dismissable p-l-40">
<i class="md md-info"></i> Ваши контактные данные. Указывайте достоверную информацию.
</div>
<div class="form-group">
<label for="cont_vk">Вконтакте</label>
<input type="text" class="form-control" id="cont_vk" value="<?php echo htmlspecialchars($usri['cont_vk']); ?>"  placeholder="https://vk.com/id274020773" maxlength="100" />
</div>
<div class="form-group">
<label for="cont_ok">Одноклассники</label>
<input type="text" class="form-control" id="cont_ok" value="<?php echo htmlspecialchars($usri['cont_ok']); ?>"  placeholder="https://ok.ru/profile/12345" maxlength="100" />
</div>
<div class="form-group">
<label for="cont_fb">Facebook</label>
<input type="text" class="form-control" id="cont_fb" value="<?php echo htmlspecialchars($usri['cont_fb']); ?>"  placeholder="https://facebook.com/user" maxlength="100" />
</div>
<div class="form-group">
<label for="cont_wa">WhatsApp</label>
<input type="text" class="form-control" id="cont_wa" value="<?php echo htmlspecialchars($usri['cont_wa']); ?>"  placeholder="Ваш WhatsApp" maxlength="50" />
</div>
<div class="form-group">
<label for="cont_vb">Viber</label>
<input type="text" class="form-control" id="cont_vb" value="<?php echo htmlspecialchars($usri['cont_vi']); ?>"  placeholder="Ваш Viber" maxlength="50" />
</div>
<div class="form-group">
<label for="cont_sk">Skype</label>
<input type="text" class="form-control" id="cont_sk" value="<?php echo htmlspecialchars($usri['cont_sk']); ?>"  placeholder="Ваш Skype" maxlength="100" />
</div>
<div class="form-group">
<label for="cont_tg">Telegram</label>
<input type="text" class="form-control" id="cont_tg" value="<?php echo htmlspecialchars($usri['cont_te']); ?>"  placeholder="Ваш Telegram" maxlength="100" />
</div>
<div class="form-group">
<label for="cont_icq">ICQ</label>
<input type="text" class="form-control" id="cont_icq" value="<?php echo htmlspecialchars($usri['cont_icq']); ?>"  placeholder="Ваш ICQ" maxlength="50" />
</div>
<div class="form-group">
<label for="cont_sms">SMS</label>
<input type="text" class="form-control" id="cont_sms" value="<?php echo htmlspecialchars($usri['cont_sms']); ?>"  placeholder="Номер Вашего телефона" maxlength="50" />
</div>
<center><button id="save_cont" class="btn btn-info waves-effect waves-light">Сохранить</button></center>
</div>
</div>
</div>

<div class="col-md-6">
<div class="panel panel-default">
<div class="panel-heading"><h3 class="panel-title">Платёжные данные</h3></div>
<div class="panel-body">
<div class="alert alert-info alert-dismissable p-l-40">
<i class="md md-info"></i> Укажите номера Ваших кошельков, на которые будут производиться выплаты.
</div>
<div class="form-group">
<label for="pay_payeer">Payeer</label>
<input type="text" class="form-control" id="pay_payeer" value="<?php echo htmlspecialchars($usri['pay_payeer']); ?>"  placeholder="P12345678" maxlength="20" />
</div>
<div class="form-group">
<label for="pay_yad">Perfect Money</label>
<input type="text" class="form-control" id="pay_pm" value="<?php echo htmlspecialchars($usri['pay_pm']); ?>"  placeholder="U123456" maxlength="50" />
</div>
<center><button id="save_ps" class="btn btn-info waves-effect waves-light">Сохранить</button></center>
</div>
</div>
</div>
</div>


<div class="panel panel-default">
<div class="panel-heading"><h3 class="panel-title">Изменение пароля</h3></div>
<div class="panel-body">
<div class="form-group">
<label for="pass_now">Текущий пароль</label>
<input type="password" class="form-control" id="pass_now" placeholder="Ваш текущий пароль">
</div>
<div class="form-group">
<label for="pass_new">Новый пароль</label>
<input type="password" class="form-control" id="pass_new" placeholder="Ваш новый пароль">
</div>
<div class="form-group">
<label for="pass_new_re">Повторите пароль</label>
<input type="password" class="form-control" id="pass_new_re" placeholder="Повторите новый пароль">
</div>
<center><button id="change_pass" class="btn btn-info waves-effect waves-light">Изменить</button></center>
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
url: '/actions/avatar_upload.php',
data: data,
cache: false,
success: function(result){
if (result == '0') {
$.jGrowl('Картинка не загружена или имеет неверный формат', { theme: 'growl-error' });
}
if (result == '1') {
$(location).attr('href','/cabinet/profile');
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
$.ajax({
type: 'POST',
url: '/actions/prf_names_save.php',
data: {'name': name, 'fam': fam, 'em': em, 'token': '<?php echo $token; ?>'},
cache: false,
success: function(result){
if (result == '0') {
$.jGrowl('Некорректный E-mail адрес', { theme: 'growl-error' });
}
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
$.jGrowl('Вы не ввели E-mail адрес', { theme: 'growl-error' });
}
if (result == '5') {
$.jGrowl('Данный E-mail уже используется другим пользователем', { theme: 'growl-error' });
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
url: '/actions/prf_cont_save.php',
data: {'vk': vk, 'ok': ok, 'fb': fb, 'wa': wa, 'vb': vb, 'sk': sk, 'tg': tg, 'icq': icq, 'sms': sms, 'token': '<?php echo $token; ?>'},
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
if (result == 'e_vk') {
$.jGrowl('Данная станица Вконтакте уже используется другим пользователем', { theme: 'growl-error' });
}
if (result == 'e_ok') {
$.jGrowl('Данная станица в Одноклассниках уже используется другим пользователем', { theme: 'growl-error' });
}
if (result == 'e_fb') {
$.jGrowl('Данная станица Facebook уже используется другим пользователем', { theme: 'growl-error' });
}
if (result == 'e_wa') {
$.jGrowl('Данный WhatsApp уже используется другим пользователем', { theme: 'growl-error' });
}
if (result == 'e_vb') {
$.jGrowl('Данный Viber уже используется другим пользователем', { theme: 'growl-error' });
}
if (result == 'e_sk') {
$.jGrowl('Данный Skype уже используется другим пользователем', { theme: 'growl-error' });
}
if (result == 'e_tg') {
$.jGrowl('Данный Telegram уже используется другим пользователем', { theme: 'growl-error' });
}
if (result == 'e_icq') {
$.jGrowl('Данный ICQ уже используется другим пользователем', { theme: 'growl-error' });
}
if (result == 'e_sms') {
$.jGrowl('Данный номер телефона уже используется другим пользователем', { theme: 'growl-error' });
}
}
});
});

$('#save_ps').click(function(){
var payeer = $('#pay_payeer').val();
var pm = $('#pay_pm').val();
$.ajax({
type: 'POST',
url: '/actions/prf_ps_save.php',
data: {'payeer': payeer, 'pm': pm, 'token': '<?php echo $token; ?>'},
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
if (result == 'e_payeer') {
$.jGrowl('Данный Payeer кошелёк уже используется другим пользователем', { theme: 'growl-error' });
}
if (result == 'e_pm') {
$.jGrowl('Данный Perfect Money кошелёк уже используется другим пользователем', { theme: 'growl-error' });
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

});
</script>

<!-- /Контент -->
<?php include('../inc/bottom_menu.php'); ?>