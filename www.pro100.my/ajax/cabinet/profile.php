<?php
namespace lib\Def;
use \lib\Post as Post;
use \incl\pro100\Def as Def100;
use \incl\pro100\User as User;
use \incl\pro100\Profile as Prof;

set_include_path(get_include_path().PATH_SEPARATOR.'../../../');spl_autoload_register();
new Opt('pro100');//Def opt
Opt::$lang='en';

if(Post\Post::issetPostArr()){
    User\User::$selfUser=new User\User();//первый вход без пароля!!!! важно
    if(isset($_POST['pm_wal_upd']) && Opt::$live_user==1){
        if(User\User::$selfUser->validPassCookie()){
            Prof\PaymentData::updateWallet();
        }else echo json_encode(['err'=>false,'answer'=>Def100\LangLibCabMain::ARR_LEVEL_UP[Opt::$lang]['live_user_null'],'l'=>1]);
    }elseif(isset($_POST['personal_upd']) && Opt::$live_user==1){
        if(User\User::$selfUser->validPassCookie()){
            Prof\PersonalData::updatePersonal();
            //echo json_encode(['err'=>false,'answer'=>Def100\LangLibCabMain::ARR_PROFILE[Opt::$lang]['wallet_update'],'l'=>2]);
        }else echo json_encode(['err'=>false,'answer'=>Def100\LangLibCabMain::ARR_LEVEL_UP[Opt::$lang]['live_user_null'],'l'=>1]);

    }elseif(isset($_POST['pas_upd']) && Opt::$live_user==1){
        if(User\User::$selfUser->validPassCookie()){
            Prof\PasSettings::updatePas();
            //echo json_encode(['err'=>false,'answer'=>Def100\LangLibCabMain::ARR_PROFILE[Opt::$lang]['wallet_update'],'l'=>2]);
        }else echo json_encode(['err'=>false,'answer'=>Def100\LangLibCabMain::ARR_LEVEL_UP[Opt::$lang]['live_user_null'],'l'=>1]);
    }
    else echo json_encode(['err'=>false,'answer'=>Def100\LangLibCabMain::ARR_LEVEL_UP[Opt::$lang]['live_user_null'],'l'=>1]);
}else echo 1;