<?php


//ajax cabinet


namespace lib\Def;

use \lib\Post as Post;

//use \incl\pro100\Def as Def100;

use \incl\pro100\User as User;

//use \incl\pro100\Pay as Pay;
set_include_path(get_include_path().PATH_SEPARATOR.'../../../');spl_autoload_register();

//Для обработки пост запросов в кабинете
if(Post\Post::issetPostArr()){
    User\User::$selfUser=new User\User();//первый вход не в кабинет !!!! важно

    if($_POST['cash_out']){
        User\User::$selfUser->validPassCookie();
        if(Opt::$live_user){
            $PM_Out=new \incl\pro100\Pay\Pay_PM();
            $PM_Out->payOut();
        }else echo json_encode(['err'=>true,'errText'=>['Необходима авторизация']]);
    }




    //if(!empty($_POST['feedback'])){
        //if(Feedback::feedback()){}else{Post\Post::answerErrJson();}
            //echo json_encode(['err'=>false,'answer'=>'Спасибо! Ваше сообщение отправлено...']);
            //echo json_encode(['err'=>true,'errText'=>['Спасибо! Ваше сообщение отправлено...']]);

    //}else echo $_SERVER['SERVER_NAME'];





}else echo'1';