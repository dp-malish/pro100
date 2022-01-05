<?php
namespace incl\pro100\Support;
use lib\Def as Def;
use lib\Post\Post as Post;
use incl\pro100\Def as Def100;
use incl\pro100\User as User;
use lib\Mail as Mail;
class Support{
    function __construct(){
        if(Post::issetPostKey(['theme','txt'])){
            $theme=Def\Validator::html_cod($_POST['theme']);
            $txt=Def\Validator::html_cod($_POST['txt']);
            $l_txt=mb_strlen($txt,'UTF-8');
            if(!array_key_exists($theme,Def100\LangLibCabMain::ARR_SUPPORT[Def\Opt::$lang]['theme'])){
                echo json_encode(['err'=>false,'answer'=>Def100\LangLibPay::ARR_ERR_PAY[Def\Opt::$lang]['post_null'],'l'=>1]);
            }elseif($l_txt>13 && $l_txt<1000){
                $DB=new Def\SQLi();
                $sql='INSERT INTO support(`id_user`,`log`,`em`,`readed`,`theme`,`text`,`ip`,`data`) VALUES ('.User\User::$u_id.',"'.User\User::$arrDBUser['log'].'","'.User\User::$arrDBUser['em'].'",NULL,'.$DB->realEscapeStr($theme).','.$DB->realEscapeStr($txt).',"'.User\User::$ip.'",'.time().')';

                $res=$DB->boolSQL($sql);
                if($res){
                    if(!Mail\Mail::sendMail(Def100\OptCab::MAIL_WARNING,'Autoresponder <support@'.$_SERVER['SERVER_NAME'].'>',$theme,$txt)){

                        echo json_encode(['err'=>false,'answer'=>$sql,'l'=>1]);

                    }else echo json_encode(['err'=>false,'answer'=>Def100\LangLibPay::ARR_ERR_PAY[Def\Opt::$lang]['post_null'],'l'=>1]);
                }else echo json_encode(['err'=>false,'answer'=>Def100\LangLibPay::ARR_ERR_PAY[Def\Opt::$lang]['post_null'],'l'=>1]);
            }else echo json_encode(['err'=>false,'answer'=>Def100\LangLibPay::ARR_ERR_PAY[Def\Opt::$lang]['post_null'],'l'=>1]);
        }else echo json_encode(['err'=>false,'answer'=>'1','l'=>1]);
    }
}