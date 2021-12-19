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
    if(isset($_POST['les']) && isset($_POST['step'])){
        User\User::$selfUser->validPassCookie();
        if(Opt::$live_user){
            $step=Validator::html_cod($_POST['step']);
            if(Validator::paternInt($step)){
                $max_lessons=5;
                if(User\User::$arrDBUser['step']<$max_lessons+1){
                    $DB=new SQLi();
                    $res=$DB->boolSQL('UPDATE `t_users` SET `step` = `step`+1 WHERE uid='.$DB->realEscapeStr(User\User::$arrDBUser['uid']).' LIMIT 1');
                    if($res){
                        if($step<=$max_lessons){
                            echo json_encode(['err'=>false,'answer'=>Def100\LangLibAssistant::ARR_ASSISTANT_LES[Opt::$lang]['les'.$step],'btn'=>1]);
                        }else echo json_encode(['err'=>false,'answer'=>Def100\LangLibAssistant::ARR_ASSISTANT[Opt::$lang]['no_message'],'btn'=>0]);
                    }else echo json_encode(['err'=>false,'answer'=>Def100\LangLibPay::ARR_ERR_LOGIN[Opt::$lang]['post_null']]);
                }else{
                    echo json_encode(['err'=>false,'answer'=>Def100\LangLibAssistant::ARR_ASSISTANT[Opt::$lang]['no_message'],'btn'=>0]);
                }
            }else echo json_encode(['err'=>false,'answer'=>Def100\LangLibAssistant::ARR_ASSISTANT[Opt::$lang]['no_message'],'btn'=>0]);
        }else echo json_encode(['err'=>false,'answer'=>Def100\LangLibAssistant::ARR_ASSISTANT[Opt::$lang]['no_message'],'btn'=>0]);
    }else echo 1;
}else echo'1';