$(document).ready(function(){
    $("#formResetBtn").click(function(){
        var mail=document.getElementById("res_email").value;
        var token ='df89jiob7767o6bbsdlk09dssd5412';
        var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
        if(mail.length<8){
            document.getElementById("res_email").value="";
            document.getElementById("res_email").focus();
        }else if(reg.test(mail) == false){
            $.jGrowl("Incorrect E-mail",{theme:'growl-error'});
            document.getElementById("res_email").focus();
        }else ajaxPostSend("reset="+mail+"&token="+token,formCallBackReset);
    });
    function formCallBackReset(arr){
        $.jGrowl(arr.answer,{theme:'growl-error',life:3000});
        if(arr.code==1){
            document.getElementById("formReset").style.display="none";
            document.getElementById("shadowForm").style.display="none";
        }
    }
    /***********************************************/
    $("#formLoginBtn").click(function(){
        var login =document.getElementById("log_login").value;
        var pass =document.getElementById("log_password").value;
        var token ='df89jiob7767o6bbsdlk09dssd5412';
        if(login.length<4){
            document.getElementById("log_login").value="";
            document.getElementById("log_login").focus();
        }else if(pass.length<5){
            document.getElementById("log_password").value="";
            document.getElementById("log_password").focus();
        }else ajaxPostSend("login="+login+"&pass="+pass+"&token="+token,formCallBackLogin);
    });
    function formCallBackLogin(arr){
        $.jGrowl(arr.answer, { theme: 'growl-error',life:3000});
        if(arr.code==1)location.href="/cabinet/";
    }/***********************************************/



    $('#formRegBtn').click(function(){
        var oferta = $('#formRegCheck').prop('checked');
        var login = $('#reg_login').val();
        var pass = $('#reg_pass').val();
        var mail = $('#reg_email').val();
        alert(oferta+" "+login+" "+pass+" "+mail);
        /*$.ajax({
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
        return false;*/
    });
});