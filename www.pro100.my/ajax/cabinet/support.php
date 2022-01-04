<?php
namespace lib\Def;

use \lib\Post as Post;

use \incl\pro100\Def as Def100;

use \incl\pro100\User as User;

set_include_path(get_include_path().PATH_SEPARATOR.'../../../');spl_autoload_register();
new Opt('pro100');//Def opt
Opt::$lang='en';
//Для обработки пост запросов в кабинете
if(Post\Post::issetPostArr()){
    User\User::$selfUser=new User\User();//первый вход не в кабинет !!!! важно

    if(isset($_POST['support'])){
        if(User\User::$selfUser->validPassCookie()){
            new \incl\pro100\Support\Support();
        }else echo json_encode(['err'=>false,'answer'=>Def100\LangLibCabMain::ARR_LEVEL_UP[Opt::$lang]['live_user_null'],'l'=>1]);
    }
}else echo'1';