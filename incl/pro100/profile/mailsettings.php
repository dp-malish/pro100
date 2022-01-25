<?php
namespace incl\pro100\profile;

use lib\Def as Def;
use lib\Post\Post as Post;
use incl\pro100\Def as Def100;
use incl\pro100\User as User;

class MailSettings{
    static function updateEm(){

        if(isset($_POST['em'])){

            $em=Def\Validator::html_cod($_POST['em']);
            $l_em=strlen($em);

            if($l_em>49 || $l_em<7){//$err=1;
                echo json_encode(['err'=>false,'answer'=>Def100\LangLibPay::ARR_ERR_REG[Def\Opt::$lang]['mail_err'],'l'=>1]);
            }elseif(!Def100\ValidExt::is_email($em)){
                echo json_encode(['err'=>false,'answer'=>Def100\LangLibPay::ARR_ERR_REG[Def\Opt::$lang]['mail_err'],'l'=>1]);
            }else{

                $DB=new Def\SQLi();

                $dt=time();

                $hash=hash ('sha256',$dt.User\User::$ip,false);
                //$hash.=hash ('sha256',$dt.Def\Opt::SOLT,false);
                $hash.=$dt;

                $sql='INSERT INTO `em_upd`(`id_user`, `em_old`, `em_new`, `ip`, `data`,  `hash`)
            VALUES ('.User\User::$arrDBUser['uid'].',\''.User\User::$arrDBUser['em'].'\','.$DB->realEscapeStr($em).','.$DB->realEscapeStr(User\User::$ip).','.$dt.','.$DB->realEscapeStr($hash).')';

                if($DB->boolSQL($sql)){

                    if(Def100\OptCab::MAIL_ON){

                        Def100\SendMail::sendTextMail();

                        //оповещение
                        $txt_mail_old=Def100\LangLibEm::ARR_MAIL[Def\Opt::$lang]['notice_old_em'];//тема
                        $txt_mail_old_t=Def100\LangLibEm::ARR_MAIL[Def\Opt::$lang]['notice_old_em_text'].$em.Def100\LangLibEm::ARR_MAIL[Def\Opt::$lang]['notice_old_em_text_1'];

                        //новое письмо
                        $txt_mail_new=Def100\LangLibEm::ARR_MAIL[Def\Opt::$lang]['notice_new_em'];//тема
                        $txt_mail_new_t=Def100\LangLibEm::ARR_MAIL[Def\Opt::$lang]['notice_new_em_text'].$em.Def100\LangLibEm::ARR_MAIL[Def\Opt::$lang]['notice_new_em_text_1'];



                        echo json_encode(['err'=>false,'answer'=>$txt_mail_new.'<br>'.$txt_mail_new_t,'l'=>2]);

                    }else echo json_encode(['err'=>false,'answer'=>Def100\LangLibCabMain::ARR_PROFILE[Def\Opt::$lang]['new_em_answer'],'l'=>2]);

                }else echo json_encode(['err'=>false,'answer'=>Def100\LangLibCabMain::ARR_PROFILE[Def\Opt::$lang]['post_null'],'l'=>1]);


            //echo json_encode(['err'=>false,'answer'=>Def100\LangLibCabMain::ARR_PROFILE[Def\Opt::$lang]['new_em_answer'],'l'=>1]);
            }
            //echo json_encode(['err'=>false,'answer'=>Def100\LangLibCabMain::ARR_PROFILE[Def\Opt::$lang]['new_em_answer'],'l'=>2]);
        }


    }


    static function getProfileMailInfo(){

        $txt='<div class="d_inp"><span class="d_inp_l">'.Def100\LangLibCabMain::ARR_PROFILE[Def\Opt::$lang]['cur_em'].'</span><span class="d_inp_r"><p>'.User\User::$arrDBUser['em'].'</p></span><div class="cl"></div></div>
<div class="d_inp"><span class="d_inp_l">'.Def100\LangLibCabMain::ARR_PROFILE[Def\Opt::$lang]['new_em'].'</span>
<span class="d_inp_r"><input type="text" id="new_em" placeholder="'.Def100\LangLibCabMain::ARR_PROFILE[Def\Opt::$lang]['new_em_plac'].'" value=""></span><div class="cl"></div></div>
<div id="em_upd_btn" class="cab_btn">'.Def100\LangLibCabBtn::ARR_BTN[Def\Opt::$lang]['update'].'</div>

<script type="text/javascript">var em_upd_btn=true;
document.getElementById("em_upd_btn").addEventListener("click",function(){
    var em=document.getElementById("new_em").value;
    
    
    ajaxPostSend("em_upd=1&em="+em,formEmUpdate,true,true,"/ajax/cabinet/profile.php");

    /*if(em.length<7 || em.length>40){
        $.jGrowl("'.Def100\LangLibPay::ARR_ERR_REG[Def\Opt::$lang]['mail_err'].'",{theme:"growl-error",life:4000});
        document.getElementById("new_em").focus();
    }else if(new_pas.length<\'.Def100\OptCab::MIN_PASS.\' || new_pas.length>\'.Def100\OptCab::MAX_PASS.\'){
        $.jGrowl("\'.Def100\LangLibCabMain::ARR_PROFILE[Def\Opt::$lang][\'old_pas_bad\'].\'",{theme:"growl-error",life:4000});
        document.getElementById("new_pas").focus();
    }else{
        if(em_upd_btn){
        ajaxPostSend("pas_upd=1&old_pas="+old_pas+"&new_pas="+new_pas,formEmUpdate,true,true,"/ajax/cabinet/profile.php");
        pas_upd_btn=false;
        }
    }*/
});
function formEmUpdate(arr){
    if(arr.l==1){
        $.jGrowl(arr.answer,{theme:"growl-error",life:4000});em_upd_btn=true;
}else if(arr.l==2){
        document.getElementById("aj_p_em").innerHTML="<p>"+arr.answer+"</p>";
    }
}</script>';


        return $txt;



    }


    static function confirmMail(){
        if(!empty(Def\Route::$uri_parts[1])){
            // em/11dcb0106d5ab7ebc2980f0d6910f2a5fe57e0d3b5839f1947e1702d167ba08c1643018779
            $l_link=strlen(Def\Route::$uri_parts[1]);
            if($l_link<73 || $l_link>77){Def\Route::$module404=1;}else{
            $DB=new Def\SQLi();
            $res=$DB->strSQL('SELECT `id`, `id_user`, `em_new` FROM `em_upd` WHERE hash='.$DB->realEscapeStr(Def\Route::$uri_parts[1]).' AND readed IS NULL LIMIT 1');
                if($res){
                    if($DB->boolSQL('UPDATE `em_upd` SET `readed`=1 WHERE id='.$res['id'])){
                        if($DB->boolSQL('UPDATE `t_users` SET `lastip`='.$DB->realEscapeStr(User\User::$ip).',`last`='.time().',`em`='.$DB->realEscapeStr($res['em_new']).' WHERE uid='.$res['id_user'])){
                            $answer=Def100\LangLibCabMain::ARR_PROFILE[Def\Opt::$lang]['em_confirm'];
                        }else $answer=Def100\LangLibCabMain::ARR_PROFILE[Def\Opt::$lang]['post_null'];
                    }else $answer=Def100\LangLibCabMain::ARR_PROFILE[Def\Opt::$lang]['em_try_later'];
                    Def\Opt::$title=Def100\LangLibCabMain::ARR_PROFILE[Def\Opt::$lang]['upd_em_title'];
                    Def\Opt::$main_content.='<div class="ac five_"><h4>'.Def\Opt::$title.'</h4><br><p>'.$answer.'</p><br><p>'.Def100\LangLibCabMain::ARR_PROFILE[Def\Opt::$lang]['cur_em'].' '.$res['em_new'].'</p><br></div><script type="text/javascript">setTimeout(\'location.replace("/")\', 13000);</script>';
                }else Def\Route::$module404=1;
            }
        }else Def\Route::$module404=1;
    }
}