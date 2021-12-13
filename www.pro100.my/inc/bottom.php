<a name="footer"></a>
<footer class="c-layout-footer c-layout-footer-7">
<div class="c-postfooter c-bg-dark-2">
<div class="container">
<div class="row">
<div class="col-md-8 col-sm-12 c-col">
<p class="c-copyright c-font-grey">&copy; Bсe пpaвa 3aщищeны!. &nbsp;&nbsp;&nbsp; 2019 <?=$Opt::$site;?> | 
<a href="/offer" style="color: #dadada;">Публичная оферта</a>


</p>
</div>
<div class="col-md-4 col-sm-12 c-col c-center">
<div class="payeer">
</div>
</div>
</div>
</div>
</div>
</footer>
<div class="c-layout-go2top">
<i class="icon-arrow-up"></i>
</div>

<?php if(!USER_LOGGED) { ?>
<div class="modal fade c-content-login-form" id="signup-form" role="dialog">
<div class="modal-dialog">
<div class="modal-content c-square">
<div class="modal-header c-no-border">
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<h3 class="c-font-24 c-font-sbold c-center">Регистрация</h3>
<form>
<p id="result" class="c-center m-t-15"></p>
<div class="form-group">
<label for="login" class="hide">Введите логин</label>
<input type="text" class="form-control input-lg c-square" id="reg_login" name="login" placeholder="Введите логин">
</div>
<div class="form-group">
<label for="email" class="hide">Введите e-mail</label>
<input type="email" class="form-control input-lg c-square" id="reg_email" name="email" placeholder="Введите e-mail">
</div>
<div class="form-group">
<label for="pw" class="hide">Введите пароль</label>
<input type="text" class="form-control input-lg c-square" id="reg_pass" name="text" placeholder="Введите пароль">
</div>
<div class="form-group">
<div class="c-checkbox">
<input type="checkbox" id="reg_rules" name="reg_rules" class="c-check">
<label for="reg_rules" class="c-font-thin c-font-17">
<span></span>
<span class="check"></span>
<span class="box"></span> <a target="_blank" href="/offer">Принимаю условия Соглашения</a> </label>
</div>
</div>
<div class="form-group c-center">
<button id="reg_btn" class="btn c-theme-btn btn-md c-btn-uppercase c-btn-bold c-btn-square c-btn-login">Регистрация</button>
</div>
</form>
</div>
<div class="modal-footer">
</div>
</div>
</div>
</div>


<div class="modal fade c-content-login-form" id="login-form" role="dialog">
<div class="modal-dialog">
<div class="modal-content c-square">
<div class="modal-header c-no-border">
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<h3 class="c-font-24 c-font-sbold c-center">Вход</h3>
<form onsubmit="return false" id="form_login">
<p id="result2" class="c-center m-t-15"></p>
<div class="form-group">
<label for="login" class="hide">Ваш логин</label>
<input type="text" class="form-control input-lg c-square" id="log_login" name="login" placeholder="Ваш логин"> </div>
<div class="form-group">
<label for="password" class="hide">Ваш пароль</label>
<input type="password" class="form-control input-lg c-square" id="log_password" name="password" placeholder="Ваш пароль"> </div>
<div class="form-group">
<button class="btn c-theme-btn btn-md c-btn-uppercase c-btn-bold c-btn-square c-btn-login" id="log_button">Вход</button>
<a href="javascript://" data-toggle="modal" data-target="#forget-password-form" data-dismiss="modal" class="c-btn-forgot">Забыли пароль?</a>
</div>
</form>
</div>
<div class="modal-footer">
<span class="c-text-account">Еще нет аккаунта?</span>
<a href="javascript://" data-toggle="modal" data-target="#signup-form" data-dismiss="modal" class="btn c-btn-dark-1 btn c-btn-uppercase c-btn-bold c-btn-slim c-btn-border-2x c-btn-square c-btn-signup">Зарегистрировать!</a>
</div>
</div>
</div>
</div>


<div class="modal fade c-content-login-form" id="forget-password-form" role="dialog">
<div class="modal-dialog">
<div class="modal-content c-square">
<div class="modal-header c-no-border">
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<h3 class="c-font-24 c-font-sbold c-center">Восстановление пароля</h3>
<p id="result3" class="c-center m-t-15">Введите Ваш E-mail, на него будет выслан новый пароль</p>
<div class="form-group">
<label for="last_email" class="hide">Ваш e-mail</label>
<input type="email" class="form-control input-lg c-square" id="lost_email" name="email" placeholder="Ваш e-mail">
</div>
<div class="form-group">
<button id="lost_btn" class="btn c-theme-btn btn-md c-btn-uppercase c-btn-bold c-btn-square c-btn-login">Отправить</button>
<a href="javascript://" class="c-btn-forgot" data-toggle="modal" data-target="#login-form" data-dismiss="modal">Назад в форму входа</a>
</div>
</div>
<div class="modal-footer">
<span class="c-text-account">* Если вы не получили письмо с паролем, проверьте папку Спам.</span>
</div>
</div>
</div>
</div>

<script type="text/javascript">
$(document).ready(function () {

$('#lost_btn').click(function(){
var mail = $('#lost_email').val();
$.ajax({
type: 'POST',
url: '/actions/lost.php',
data: {'mail': mail, 'token': '<?php echo $token; ?>'},
cache: false,
success: function(result){
if (result == '0') {
$.jGrowl('Данный E-mail не зарегистрирован', { theme: 'growl-error' });
}
if (result == '1') {
$.jGrowl('Инструкция отправлена на E-mail', { theme: 'growl-success' }); $('#lost_email').val('');
}
if (result == '2') {
$.jGrowl('Вы не ввели E-mail', { theme: 'growl-error' });
}
if (result == '3') {
$.jGrowl('Ошибка', { theme: 'growl-error' });
}
if (result == '4') {
$.jGrowl('Неверный формат E-mail', { theme: 'growl-error' });
}
}
});
});

$('#log_button').click(function(){
var login = $('#log_login').val();
var pass = $('#log_password').val();
$.ajax({
type: 'POST',
url: '/actions/log.php',
data: {'login': login, 'pass': pass, 'token': '<?php echo $token; ?>'},
cache: false,
success: function(result){
if (result == '0') {
$.jGrowl('Неверный логин или пароль', { theme: 'growl-error' });
}
if (result == '1') {
$(location).attr('href','/cabinet/');
}
if (result == '2') {
$.jGrowl('Попробуйте войти позднее', { theme: 'growl-error' });
}
if (result == '3') {
$.jGrowl('Не введён логин или пароль', { theme: 'growl-error' });
}
if (result == '4') {
$.jGrowl('Вы уже вошли', { theme: 'growl-error' });
}
}
});
});

$('#reg_btn').click(function(){
var oferta = $('#reg_rules').prop('checked');
var login = $('#reg_login').val();
var pass = $('#reg_pass').val();
var mail = $('#reg_email').val();
$.ajax({
type: 'POST',
url: '/actions/reg.php',
data: {'oferta': oferta, 'login': login, 'pass': pass, 'mail': mail, 'token': '<?php echo $token; ?>'},
cache: false,
success: function(result){
if (result == 'offer') {
$.jGrowl('Вы не согласились с правилами', { theme: 'growl-error' });
}
if (result == 'regged') {
$.jGrowl('Данный логин уже зарегистрирован', { theme: 'growl-error' });
}
if (result == 'lsmall') {
$.jGrowl('Логин меньше 3-х символов', { theme: 'growl-error' });
}
if (result == 'nologin') {
$.jGrowl('Логин должен состоять из латинских букв и цифр', { theme: 'growl-error' });
}
if (result == 'psmall') {
$.jGrowl('Пароль меньше 3-х символов', { theme: 'growl-error' });
}
if (result == 'mail') {
$.jGrowl('Введён неверный E-mail', { theme: 'growl-error' });
}
if (result == 'usrmail') {
$.jGrowl('Данный E-mail уже используется другим пользователем', { theme: 'growl-error' });
}
if (result == 'error') {
$.jGrowl('Неизвестная ошибка', { theme: 'growl-error' });
}
if (result == '1') {
$.jGrowl('Успешно', { theme: 'growl-success' });
$.ajax({
type: 'POST',
url: '/actions/log.php',
data: {'login': login, 'pass': pass, 'token': '<?php echo $token; ?>'},
cache: false,
success: function(result){
if (result == '0') {
$.jGrowl('Войти автоматически не удалось. Попробуйте войти на странице авторизации', { theme: 'growl-error' });
}
if (result == '1') {
$(location).attr('href','/cabinet/');
}
if (result == '2') {
$.jGrowl('Попробуйте войти позднее', { theme: 'growl-error' });
}
if (result == '3') {
$.jGrowl('Войти автоматически не удалось. Попробуйте войти на странице авторизации', { theme: 'growl-error' });
}
if (result == '4') {
$.jGrowl('Вы уже вошли', { theme: 'growl-error' });
}
}
});
}
}
});
return false;
});

});
</script>
<?php } ?>

<script src="/static/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="/static/plugins/jquery.easing.min.js" type="text/javascript"></script>
<script src="/static/plugins/reveal-animate/wow.js" type="text/javascript"></script>
<script src="/static/base/js/scripts/reveal-animate/reveal-animate.js" type="text/javascript"></script>
<script src="/static/plugins/counterup/jquery.waypoints.min.js" type="text/javascript"></script>
<script src="/static/plugins/counterup/jquery.counterup.min.js" type="text/javascript"></script>
<script src="/static/base/js/components.js" type="text/javascript"></script>
<script src="/static/base/js/components-shop.js" type="text/javascript"></script>
<script src="/static/base/js/app.js" type="text/javascript"></script>
<script>$(document).ready(function() { App.init(); });</script>

</body>
</html>