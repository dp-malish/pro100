<?php
namespace lib\Def;

use \lib\Post as Post;

use \incl\pro100\Def as Def100;

use \incl\pro100\User as User;

set_include_path(get_include_path().PATH_SEPARATOR.'../../../');spl_autoload_register();

//Для обработки пост запросов в кабинете
if(Post\Post::issetPostArr()){
    User\User::$selfUser=new User\User();//первый вход не в кабинет !!!! важно

    if(isset($_POST['support'])){
        User\User::$selfUser->validPassCookie();
        if(Opt::$live_user){
            echo json_encode(['err'=>true,'errText'=>[Def100\LangLibCabMain::ARR_LEVEL_UP[Opt::$lang]['live_user_null']],'l'=>1]);

        }else echo json_encode(['err'=>true,'errText'=>[Def100\LangLibCabMain::ARR_LEVEL_UP[Opt::$lang]['live_user_null']],'l'=>1]);
    }




    //if(!empty($_POST['feedback'])){
        //if(Feedback::feedback()){}else{Post\Post::answerErrJson();}
            //echo json_encode(['err'=>false,'answer'=>'Спасибо! Ваше сообщение отправлено...']);
            //echo json_encode(['err'=>true,'errText'=>['Спасибо! Ваше сообщение отправлено...']]);

    //}else echo $_SERVER['SERVER_NAME'];





}else echo'1';