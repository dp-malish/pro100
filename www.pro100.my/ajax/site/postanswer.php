<?php
namespace lib\Post;
Error_Reporting(E_ALL & ~E_NOTICE);ini_set('display_errors',1);
set_include_path(get_include_path().PATH_SEPARATOR.'../../../');spl_autoload_register();

if(Post::issetPostArr()){
    if(!empty($_POST['feedback'])){
        if(Feedback::feedback()){
            echo json_encode(['err'=>false,'answer'=>'Спасибо! Ваше сообщение отправлено...']);
        }else{Post::answerErrJson();}
    }else echo $_SERVER['SERVER_NAME'];
    //-------------------------------------------------------------------
}else echo $_SERVER['SERVER_NAME'];