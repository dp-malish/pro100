//Верхнее меню - кнопки входа
// открыть/закрыть форму входа и тень
//*******************Form Login**************************//
    function loginBtn() {//открыть форму (показать)
        document.getElementById("formLogin").style.display = "block";
        document.getElementById("shadowForm").style.display = "block";
    }

    function formLoginClose() {//закрыть форму (скрыть)
        document.getElementById("formLogin").style.display = "none";
        document.getElementById("shadowForm").style.display = "none";
    }

    function rememberPasswordFormLogin(){
        document.getElementById("formLogin").style.display = "none";
        document.getElementById("formReset").style.display = "block";
    }
    function formResetClose() {//закрыть форму (скрыть)
        document.getElementById("formReset").style.display = "none";
        document.getElementById("shadowForm").style.display = "none";
    }
//*******************Form Reg**************************//
// открыть/закрыть форму регистрации и тень
    function registrationBtn() {//открыть форму (показать)
        document.getElementById("formReg").style.display = "block";
        document.getElementById("shadowForm").style.display = "block";
    }

    function formRegClose() {//закрыть форму (скрыть)
        document.getElementById("formReg").style.display = "none";
        document.getElementById("shadowForm").style.display = "none";
    }
//****************************
//*************form***************
    function formLoginReplacedByReg(){
        document.getElementById("formLogin").style.display = "none";
        document.getElementById("formReg").style.display = "block";
    }
//****************************
//****************************
//****************************


$(document).ready(function(){
    //*******************Form Login
    document.getElementById('l1_log_btn').onclick=function(){loginBtn();};
    document.getElementById("closeFormLogin").addEventListener("click", formLoginClose, false);
    document.getElementById("rememberPassBtn").addEventListener("click", rememberPasswordFormLogin, false);
    document.getElementById("formLoginLinkToReg").addEventListener("click", formLoginReplacedByReg, false);
    //*******************Form Reg**************************//
    document.getElementById('l1_reg_btn').onclick=function(){registrationBtn();}
    document.getElementById("closeFormReg").addEventListener("click", formRegClose, false);
    //*******************Form Reset***************************************
    document.getElementById("closeFormReset").addEventListener("click", formResetClose, false);
    //*******************************************************************
    //*******************************************************************
});