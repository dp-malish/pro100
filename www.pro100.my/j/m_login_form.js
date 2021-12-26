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
        var offer = $('#formRegCheck').prop('checked');
        var login = $('#reg_login').val();
        var pass = $('#reg_pass').val();
        var mail = $('#reg_email').val();
        var token ='df89jiob7767o6bbsdlk09dssd5412';
        var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

        if(login.length<4){
            document.getElementById("reg_login").focus();
        }else if(reg.test(mail) == false){
            $.jGrowl("Incorrect E-mail",{theme:'growl-error',life:3000});
            document.getElementById("res_email").focus();
        }else if(pass.length<8){
            document.getElementById("reg_pass").focus();
        }else if(offer==false){
            $.jGrowl("License not accepted...",{theme:'growl-error',life:3000});
        }else ajaxPostSend("reg=1&reglog="+login+"&pass="+pass+"&offer="+offer+"&token="+token+"&mail="+mail,formCallBackReg);
//alert("reg=1&login="+login+"&pass="+pass+"&offer="+offer+"&token="+token+"&mail="+mail);

    });
    function formCallBackReg(arr){
        $.jGrowl(arr.answer, { theme: 'growl-error',life:4000});
        if(arr.code==1){
            document.getElementById('formReg').style.display="none";
            document.getElementById('shadowForm').style.display="none";
        }
    }/***********************************************/
});