<?php
namespace incl\pro100\profile;

use lib\Def as Def;
use lib\Post\Post as Post;
use incl\pro100\Def as Def100;
use incl\pro100\User as User;

class PasSettings{


    static function updatePas(){

        if(Post::issetPostKey(['old_pas','new_pas'])){
            $err=0;

            $old = Def\Validator::html_cod($_POST['old_pas']);
            $pass = Def\Validator::html_cod($_POST['new_pas']);

            if(md5(md5($old))!=User\User::$arrDBUser['pas']){
                $err=1;
                echo json_encode(['err'=>false,'answer'=>Def100\LangLibCabMain::ARR_PROFILE[Def\Opt::$lang]['old_pas_bad'],'l'=>1]);
            }

/*

            if(strlen($pass)<'8' && !$err){
                $err=1;
                echo json_encode(['err'=>false,'answer'=>Def100\LangLibPay::ARR_ERR_REG[Def\Opt::$lang]['pass_small'],'code'=>1]);
            }elseif(!preg_match("#^[aA-zZ0-9\-_]+$#",$pass) && !$err){
                $err=1;
                echo json_encode(['err'=>false,'answer'=>Def100\LangLibPay::ARR_ERR_REG[Def\Opt::$lang]['pass_err'],'code'=>1]);}



            if(!$err){
                //$DB = new Def\SQLi();
                echo json_encode(['err' => false, 'answer' => Def100\LangLibCabMain::ARR_PROFILE[Def\Opt::$lang]['pas_good'], 'l' =>2]);
            }*/
        }//нет ошибок
        else echo json_encode(['err' => false, 'answer' => Def100\LangLibCabMain::ARR_PROFILE[Def\Opt::$lang]['pas_good'], 'l' =>2]);
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
    
    
    ajaxPostSend("pas_upd=1&old_pas="+old_pas+"&new_pas="+new_pas,formPasUpdate,true,true,"/ajax/cabinet/profile.php");

    /*if(name.length<2 || name.length>20){
        $.jGrowl("'.Def100\LangLibCabMain::ARR_PROFILE[Def\Opt::$lang]['name_err'].'",{theme:"growl-error",life:4000});
    }else if(surname.length<2 || surname.length>25){
        $.jGrowl("'.Def100\LangLibCabMain::ARR_PROFILE[Def\Opt::$lang]['surname_err'].'",{theme:"growl-error",life:4000});
    }else{
        if(pas_upd_btn){
        ajaxPostSend("personal_upd=1&name="+name+"&surname="+surname+"&gender="+gender+"&birthday="+birthday,formPersonalUpdate,true,true,"/ajax/cabinet/profile.php");
        pas_upd_btn=false;
        }
    }*/
});
function formPasUpdate(arr){
    if(arr.l==1){
        $.jGrowl(arr.answer,{theme:"growl-error",life:4000});pers_upd_btn=true;
}else if(arr.l==2){
        document.getElementById("aj_p_pas").innerHTML="<p>"+arr.answer+"</p>";
    }
    
}</script>';

        return $txt;

    }






}