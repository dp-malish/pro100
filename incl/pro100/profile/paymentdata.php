<?php
namespace incl\pro100\Profile;

use lib\Def as Def;
use lib\Post\Post as Post;
use incl\pro100\Def as Def100;
use incl\pro100\User as User;


class PaymentData{

    static function updateWallet(){

        if(Post::issetPostKey(['pm_wal_upd','wallet'])){
            $wallet=Def\Validator::html_cod($_POST['wallet']);
            if(Def\Validator::paternInt($wallet)){
                if($wallet>=10000000 && $wallet<=100000000){
                    $DB=new Def\SQLi();
                    if($DB->boolSQL('UPDATE `t_users` SET `pay_pm`='.$DB->realEscapeStr('U'.$wallet).' WHERE uid='.User\User::$arrDBUser['uid'].' LIMIT 1')){
                        echo json_encode(['err'=>false,'answer'=>Def100\LangLibCabMain::ARR_PROFILE[Def\Opt::$lang]['wallet_update'].' U'.$wallet,'l'=>2]);
                    }else echo json_encode(['err'=>false,'answer'=>Def100\LangLibCabMain::ARR_PROFILE[Def\Opt::$lang]['post_null'],'l'=>1]);
                }else echo json_encode(['err'=>false,'answer'=>Def100\LangLibCabMain::ARR_PROFILE[Def\Opt::$lang]['wallet_err'],'l'=>1]);
            }else echo json_encode(['err'=>false,'answer'=>Def100\LangLibCabMain::ARR_PROFILE[Def\Opt::$lang]['wallet_err'],'l'=>1]);
        }else echo json_encode(['err'=>false,'answer'=>'1','l'=>1]);
    }



    static function getProfilePerfectInfo(){

        return '<div class="d_inp">        
            <span class="d_inp_l">'.Def100\LangLibCabMain::ARR_PROFILE[Def\Opt::$lang]['wallet'].'</span>
            <span class="d_inp_r"><input type="text" id="wal_pm" placeholder="U12345678" value="'.(User\User::$arrDBUser['pay_pm']?User\User::$arrDBUser['pay_pm']:'').'"></span><div class="cl"></div>
        </div>
        <div id="pm_upd_wal_btn" class="cab_btn">'.Def100\LangLibCabBtn::ARR_BTN[Def\Opt::$lang][(User\User::$arrDBUser['pay_pm']?'update':'save')].'</div><div id="d_answ"></div>
        
        
        
<script type="text/javascript">
var fs_btn=true;
document.getElementById("pm_upd_wal_btn").addEventListener("click",function(){
    
    var wallet=document.getElementById("wal_pm").value;
        
    if(wallet.length!=9){
        $.jGrowl("'.Def100\LangLibCabMain::ARR_PROFILE[Def\Opt::$lang]['wallet_err'].'",{theme:"growl-error",life:4000});
    }else{
        var fb=wallet.substr(0,1);
        fb=fb.toUpperCase();
        if(fb!="U"){            
                $.jGrowl("'.Def100\LangLibCabMain::ARR_PROFILE[Def\Opt::$lang]['wallet_err'].'",{theme:"growl-error",life:4000});               
        }else if(fs_btn){
            fb=wallet.substr(1,8);
            //alert(fb);
            ajaxPostSend("pm_wal_upd=1&wallet="+fb,formWalletUpdate,true,true,"/ajax/cabinet/profile.php");
            fs_btn=false;
        }
    }
});
function formWalletUpdate(arr){if(arr.l==1){
    $.jGrowl(arr.answer,{theme:"growl-error",life:4000});fs_btn=true;
}else if(arr.l==2){
    document.getElementById("aj_p_wal").innerHTML="<p>"+arr.answer+"</p>";
}
}</script>';
    }

    static function getIndexInfo(){
        $txt='<p>'.Def100\LangLibCabMain::ARR_PROFILE[Def\Opt::$lang]['data_pay_null'].'<a href="/cabinet/profile">'.Def100\LangLibCabMain::ARR_PROFILE[Def\Opt::$lang]['data_pay_null_link'].'</a></p>';

        //if(User\User::$arrDBUser['pay_payeer']=='')$txt='';
        //Для PerfectMoney
        if(User\User::$arrDBUser['pay_pm']!=''){
            $txt='<p>'.Def100\LangLibCabMain::ARR_PROFILE[Def\Opt::$lang]['ps'].' '.Def100\OptCab::paysSystems(1).'.'.Def100\LangLibCabMain::ARR_PROFILE[Def\Opt::$lang]['pm_answer_index'].User\User::$arrDBUser['pay_pm'].'</p>';
        }return $txt;
    }

}