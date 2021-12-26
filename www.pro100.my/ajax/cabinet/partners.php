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
    if(isset($_POST['ref']) && Opt::$live_user==1){
        if(isset($_POST['l1'])){
            echo json_encode(['err'=>false,'answer'=>'<p>'.Def100\LangLibCabMain::ARR_PARTNERS[Opt::$lang]['l1'].'</p>','l'=>1]);
        }elseif(isset($_POST['l2'])){
            echo json_encode(['err'=>false,'answer'=>'<p>'.Def100\LangLibCabMain::ARR_PARTNERS[Opt::$lang]['l2'].'</p>','l'=>2]);
        }elseif(isset($_POST['l3'])){
            echo json_encode(['err'=>false,'answer'=>'<p>'.Def100\LangLibCabMain::ARR_PARTNERS[Opt::$lang]['l3'].'</p>','l'=>3]);
        }elseif(isset($_POST['l4'])){
            echo json_encode(['err'=>false,'answer'=>'<p>'.Def100\LangLibCabMain::ARR_PARTNERS[Opt::$lang]['l4'].'</p>','l'=>4]);
        }elseif(isset($_POST['l0'])){
            echo json_encode(['err'=>false,'answer'=>'<p>'.Def100\LangLibCabMain::ARR_PARTNERS[Opt::$lang]['l0'].'</p>','l'=>0]);
        }

    }elseif(isset($_POST['level-up']) && Opt::$live_user==1){
        if(User\User::$selfUser->validPassCookie()){
            new User\LevelUp();
        }else echo json_encode(['err'=>false,'answer'=>Def100\LangLibCabMain::ARR_LEVEL_UP[Opt::$lang]['live_user_null']]);
    }
}else echo'1';