<?php
namespace incl\pro100\profile;

use lib\Def as Def;
use lib\Post\Post as Post;
use incl\pro100\Def as Def100;
use incl\pro100\User as User;

class PasSettings{

    static function updatePas(){
        if(Post::issetPostKey(['old_pas','new_pas'])){$err=0;
            $old=Def\Validator::html_cod($_POST['old_pas']);
            $pass=Def\Validator::html_cod($_POST['new_pas']);
            $l_old_pas=strlen($old);
            $l_new_pas=strlen($pass);
            if($l_old_pas>Def100\OptCab::MAX_PASS || $l_old_pas<Def100\OptCab::MIN_PASS){$err=1;
                echo json_encode(['err'=>false,'answer'=>Def100\LangLibCabMain::ARR_PROFILE[Def\Opt::$lang]['old_pas_bad'],'l'=>1]);
            }elseif(md5(md5($old))!=User\User::$arrDBUser['pas']){$err=1;
                echo json_encode(['err'=>false,'answer'=>Def100\LangLibCabMain::ARR_PROFILE[Def\Opt::$lang]['old_pas_bad'],'l'=>1]);
            }elseif($l_new_pas<Def100\OptCab::MIN_PASS){$err=1;
                echo json_encode(['err'=>false,'answer'=>Def100\LangLibPay::ARR_ERR_REG[Def\Opt::$lang]['pass_small'],'l'=>1]);
            }elseif($l_new_pas>Def100\OptCab::MAX_PASS){$err=1;
                echo json_encode(['err'=>false,'answer'=>Def100\LangLibCabMain::ARR_PROFILE[Def\Opt::$lang]['post_null'],'l'=>1]);
            }elseif(!Def100\ValidExt::paternPass($pass)){$err=1;
                echo json_encode(['err'=>false,'answer'=>Def100\LangLibCabMain::ARR_PROFILE[Def\Opt::$lang]['new_pas_bad'],'l'=>1]);}
            if(!$err){$DB=new Def\SQLi();$pass=md5(md5($pass));
                if($DB->boolSQL('UPDATE t_users SET pas='.$DB->realEscapeStr($pass).' WHERE uid='.Def\Opt::$live_user_id.' LIMIT 1')){
                    Def\Cookie::setCookie(User\User::$cookie_name['pass_md5'],User\User::cryptCookieValue($pass),84000);
                echo json_encode(['err' => false,'answer' => Def100\LangLibCabMain::ARR_PROFILE[Def\Opt::$lang]['pas_good'], 'l' =>2]);
                }else echo json_encode(['err' => false,'answer' => Def100\LangLibCabMain::ARR_PROFILE[Def\Opt::$lang]['post_null'], 'l' =>1]);
            }
        }//нет ошибок
    }

    static function getProfilePasInfo(){

        $txt='<div class="d_inp">
<span class="d_inp_l required">'.Def100\LangLibCabMain::ARR_PROFILE[Def\Opt::$lang]['old_pas'].'</span>
<span class="d_inp_r">
<input type="password" id="old_pas" placeholder="'.Def100\LangLibCabMain::ARR_PROFILE[Def\Opt::$lang]['old_pas_plac'].'" value="">
</span>
<div class="cl"></div>
</div>

<div class="d_inp">
<span class="d_inp_l required">'.Def100\LangLibCabMain::ARR_PROFILE[Def\Opt::$lang]['new_pas'].'</span>
<span class="d_inp_r">
<input type="password" id="new_pas" placeholder="'.Def100\LangLibCabMain::ARR_PROFILE[Def\Opt::$lang]['new_pas_plac'].'" value="">
</span>
<div class="cl"></div>
</div>

<div class="d_inp">
<span class="d_inp_l required">'.Def100\LangLibCabMain::ARR_PROFILE[Def\Opt::$lang]['confirm_pas'].'</span>
<span class="d_inp_r">
<input type="password" id="confirm_pas" placeholder="'.Def100\LangLibCabMain::ARR_PROFILE[Def\Opt::$lang]['confirm_pas_plac'].'" value="">
</span>
<div class="cl"></div>
</div>

<div id="pas_upd_btn" class="cab_btn">'.Def100\LangLibCabBtn::ARR_BTN[Def\Opt::$lang]['update'].'</div>

<p class="note ac five_"><br>'.Def100\LangLibCabMain::ARR_PROFILE[Def\Opt::$lang]['star'].'</p>


<script type="text/javascript">var pas_upd_btn=true;
document.getElementById("pas_upd_btn").addEventListener("click",function(){
    var old_pas=document.getElementById("old_pas").value;
    var new_pas=document.getElementById("new_pas").value;
    var confirm_pas=document.getElementById("confirm_pas").value;
    
    
    //ajaxPostSend("pas_upd=1&old_pas="+old_pas+"&new_pas="+new_pas,formPasUpdate,true,true,"/ajax/cabinet/profile.php");

    if(old_pas.length<'.Def100\OptCab::MIN_PASS.' || old_pas.length>'.Def100\OptCab::MAX_PASS.'){
        $.jGrowl("'.Def100\LangLibCabMain::ARR_PROFILE[Def\Opt::$lang]['old_pas_bad'].'",{theme:"growl-error",life:4000});
        document.getElementById("old_pas").focus();
    }else if(new_pas.length<'.Def100\OptCab::MIN_PASS.' || new_pas.length>'.Def100\OptCab::MAX_PASS.'){
        $.jGrowl("'.Def100\LangLibCabMain::ARR_PROFILE[Def\Opt::$lang]['old_pas_bad'].'",{theme:"growl-error",life:4000});
        document.getElementById("new_pas").focus();
    }else if(new_pas!=confirm_pas){
        $.jGrowl("'.Def100\LangLibCabMain::ARR_PROFILE[Def\Opt::$lang]['new_pas_conf_bad'].'",{theme:"growl-error",life:4000});
        document.getElementById("confirm_pas").focus();
    }else{
        if(pas_upd_btn){
        ajaxPostSend("pas_upd=1&old_pas="+old_pas+"&new_pas="+new_pas,formPasUpdate,true,true,"/ajax/cabinet/profile.php");
        pas_upd_btn=false;
        }
    }
});
function formPasUpdate(arr){
    if(arr.l==1){
        $.jGrowl(arr.answer,{theme:"growl-error",life:4000});pas_upd_btn=true;
}else if(arr.l==2){
        document.getElementById("aj_p_pas").innerHTML="<p>"+arr.answer+"</p>";
    }
    
}</script>';

        return $txt;

    }






}