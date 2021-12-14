<footer>
    <div id="foot">
        <div class="ac"><p class="note">&copy; All right reserved. &nbsp;&nbsp;&nbsp; 2021 <?=\lib\Def\Opt::$site;?> |  <a href="/offer">Offer</a></p></div>
        <div id="shadow"></div>
        <div id="up">Up</div>

    </div>
</footer>
<!--------------------Форма входа------------------->
<!--------------------Форма входа------------------->
<!--------------------Форма входа------------------->
<div id="shadowForm" class="shadow"></div>
<div id="formLogin" class="form">
    <div class="form_header">
        <span id="closeFormLogin" class="close"></span>
        <h3>ВХОД</h3>
    </div>
    <div class="form_label">
        <span>Логин</span>
    </div>
    <div class="form_row">
        <input type="text" id="log_login" placeholder="Ваш логин">
    </div>
    <div class="form_label">
        <span>Пароль</span>
    </div>
    <div class="form_row">
        <input type="password" id="log_password" placeholder="Ваш пароль">
    </div>
    <div class="form_row rel">
        <div id="formLoginBtn" class="form_login_in">Вход</div>
        <div id="rememberPassBtn" class="form_remember link">Забыли пароль?</div>
    </div>
    <div class="form_row rel ac">
        <span id="formLoginLinkToReg" class="form_link_center link">Зарегистрироваться</span>
    </div>
</div>
<!--------------------Форма регистрации------------------->
<!--------------------Форма регистрации------------------->
<!--------------------Форма регистрации------------------->

<div id="formReg" class="form">
    <div class="form_header">
        <span id="closeFormReg" class="close"></span>
        <h3>РЕГИСТРАЦИЯ</h3>
    </div>
    <div class="form_label">
        <span>Логин</span>
    </div>
    <div class="form_row">
        <input type="text" id="reg_login" placeholder="Введите логин">
    </div>
    <div class="form_label">
        <span>E-mail</span>
    </div>
    <div class="form_row">
        <input type="email" id="reg_email" placeholder="Введите e-mail">
    </div>
    <div class="form_label">
        <span>Пароль</span>
    </div>
    <div class="form_row">
        <input type="text" id="reg_pass" placeholder="Введите пароль">
    </div>
    <div class="form_row rel">
        <input type="checkbox" id="formRegCheck">
        <label for="formRegCheck">
            <span class="check_box_reg"><a target="_blank" href="/offer">Принимаю условия Соглашения</a></span>
        </label>

    </div>
    <div class="form_row rel">
        <div id="formRegBtn" class="form_login_reg">Регистрация</div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        /*$('#lost_btn').click(function(){
            var mail = $('#lost_email').val();
            $.ajax({
                type: 'POST',
                url: '/actions/lost.php',
                data: {'mail': mail, 'token': '456798321'},
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
        });*/

        $('#formLoginBtn').click(function(){
            var login =document.getElementById("log_login").value;
            var pass =document.getElementById("log_password").value;
            var token ='df89jiob7767o6bbsdlk09dssd5412';
            /*$.ajax({
                type: 'POST',
                url: '/actions/log.php',
                data: {'login': login, 'pass': pass, 'token': '46548'},
                cache: false,
                success: function(result){
                    if (result == '0') {
                        $.jGrowl('Неверный логин или пароль', { theme: 'growl-error' });
                    }
                    if (result == '1') {
                        $(location).attr('href','/cabinet/');
                    }
                    if (result == '2') {//Забанен сделать редирект
                        $.jGrowl('Попробуйте войти позднее', { theme: 'growl-error' });
                    }
                    if (result == '3') {
                        $.jGrowl('Не введён логин или пароль', { theme: 'growl-error' });
                    }
                    if (result == '4') {
                        $.jGrowl('Вы уже вошли', { theme: 'growl-error' });
                    }
                }
            });*/
            if(login.length<4){
                document.getElementById("log_login").value="";
                document.getElementById("log_login").focus();
            }else if(pass.length<5){
                document.getElementById("log_password").value="";
                document.getElementById("log_password").focus();
            }else ajaxPostSend("login="+login+"&pass="+pass+"&token="+token,formCallBackLogin);
        });

        function formCallBackLogin(arr){
            $.jGrowl(arr.answer, { theme: 'growl-error' });//+" "+arr.code
            if(arr.code==1)location.href="/cabinet/";
        }



        $('#formRegBtn').click(function(){
            var oferta = $('#formRegCheck').prop('checked');
            var login = $('#reg_login').val();
            var pass = $('#reg_pass').val();
            var mail = $('#reg_email').val();
            $.ajax({
                type: 'POST',
                url: '/actions/reg.php',
                data: {'oferta': oferta, 'login': login, 'pass': pass, 'mail': mail, 'token': '456'},
                cache: false,
                success: function(result){
                    if (result == 'live_user') {
                        $.jGrowl('Сессия пользователя не закончена. Повторите попытку...', { theme: 'growl-error' });
                    }
                    if (result == 'offer') {
                        $.jGrowl('Вы не согласились с правилами', { theme: 'growl-error' });
                    }
                    if (result == 'regged') {
                        $.jGrowl('Данный логин уже зарегистрирован', { theme: 'growl-error' });
                    }
                    if (result == 'lsmall') {
                        $.jGrowl('Логин меньше 8-ми символов', { theme: 'growl-error' });
                    }
                    if (result == 'nologin') {
                        $.jGrowl('Логин должен состоять из латинских букв и цифр', { theme: 'growl-error' });
                    }
                    if (result == 'psmall') {
                        $.jGrowl('Пароль меньше 8-х символов', { theme: 'growl-error' });
                    }
                    if (result == 'nopass') {
                        $.jGrowl('Пароль должен состоять из латинских букв и цифр', { theme: 'growl-error' });
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
                            data: {'login': login, 'pass': pass, 'token': '7868'},
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

</body>
</html>