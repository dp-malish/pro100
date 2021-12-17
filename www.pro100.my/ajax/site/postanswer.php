<?php
namespace lib\Post;

use \lib\Def as Def;
use \incl\pro100\Def as Def100;
use \incl\pro100\User as User;

Error_Reporting(E_ALL & ~E_NOTICE);ini_set('display_errors',1);
set_include_path(get_include_path().PATH_SEPARATOR.'../../../');spl_autoload_register();

if(Post::issetPostArr()){
    $Opt=new Def\Opt('pro100');//Def opt
    //Допилить определения языка
    $Opt::$lang='en';

    if(!empty($_POST['feedback'])){//стандартный релиз
        if(Feedback::feedback()){
            echo json_encode(['err'=>false,'answer'=>'Спасибо! Ваше сообщение отправлено...']);
        }else{Post::answerErrJson();}
    }elseif(!empty($_POST['login'])){//Вход на сайт
        User\User::$selfUser=new User\User();
        User\User::$selfUser->loginUser();
        //echo json_encode(['err'=>false,'answer'=>Def100\LangLibPay::ARR_ERR_LOGIN['ru']['banned'],'code'=>2]);
    }elseif(!empty($_POST['reset'])){//Вход на сайт
        //сделать класс рассылки
        new User\ResetPass();
    }


    else echo $_SERVER['SERVER_NAME'];
    //-------------------------------------------------------------------
}else echo $_SERVER['SERVER_NAME'];