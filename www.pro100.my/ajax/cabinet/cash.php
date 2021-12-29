<?php
namespace lib\Def;
use \lib\Post as Post;
use \incl\pro100\Def as Def100;
use \incl\pro100\User as User;

set_include_path(get_include_path().PATH_SEPARATOR.'../../../');spl_autoload_register();
new Opt('pro100');//Def opt
Opt::$lang='en';

if(Post\Post::issetPostArr()){
    User\User::$selfUser=new User\User();//первый вход без пароля!!!! важно
    if(isset($_POST['cash-in']) && Opt::$live_user==1){
        if(User\User::$selfUser->validPassCookie()){


            echo json_encode(['err'=>false,'answer'=>'<p>'.Def100\LangLibCabMain::ARR_LEVEL_UP[Opt::$lang]['next_level'].'</p>','l'=>2]);


        }else echo json_encode(['err'=>false,'answer'=>Def100\LangLibCabMain::ARR_LEVEL_UP[Opt::$lang]['live_user_null'],'l'=>1]);
    }
}else echo'1';