<?php
namespace lib\Def;

use incl\pro100\Def as Def100;
use incl\pro100\User as User;

$btn='';
$note='';
$next_level=User\User::$arrDBUser['level']+1;
if(User\User::$arrDBUser['level']>=4){
    $next_level_txt='<p>'.Def100\LangLibCabMain::ARR_LEVEL_UP[Opt::$lang]['max_level'].'</p>';

}else{
    $next_level_txt='<p>'.Def100\LangLibCabMain::ARR_LEVEL_UP[Opt::$lang]['next_level'].(User\User::$arrDBUser['level']+1).'</p>';
    $next_level_txt.='<p>'.Def100\LangLibCabMain::ARR_LEVEL_UP[Opt::$lang]['level_cost'].Def100\OptCab::LEVEL_COST[$next_level].'</p>';


    $btn='<div id="level_up_btn" class="cab_btn">'.Def100\LangLibCabBtn::ARR_BTN[Opt::$lang]['level_up'].'</div>
<script type="text/javascript">
var levelUp=true;
    document.getElementById("level_up_btn").addEventListener("click",function(){
        //alert("level-up +++++++++++++++++++++++");
    if(levelUp){
        ajaxPostSend("level-up=1",formCallLevelUp,true,true,"/ajax/cabinet/partners.php");
        levelUp=false;
    }//else  alert("level-up");
    });
    
function formCallLevelUp(arr){
    $.jGrowl(arr.answer,{theme:"growl-error",life:3000});
}    
    
    
</script>';
$note='<div class="d_promo_txt">'.Def100\LangLibCabMain::ARR_LEVEL_UP[Opt::$lang]['level_note'].'</div>';
}



Opt::$main_content.='<div><h3 class="h_fon">'.Def100\LangLibCabMain::ARR_LEVEL_UP[Opt::$lang]['name'].'</h3></div>
<div class="text_fon">
<h4 class="h_fon_min">'.Def100\LangLibCabMain::ARR_LEVEL_UP[Opt::$lang]['current_level'].User\User::$arrDBUser['level'].'</h4>
<div class="h_fon_field">'.$next_level_txt.'</div>

'.$btn.'

</div>'.$note;


