<?php
namespace lib\Def;

use incl\pro100\Def as Def100;
use incl\pro100\User as User;

Opt::$title='Cabinet';



//ASSISTANT start
Opt::$main_content.='
<div><h3 class="h_fon">'.Def100\LangLibAssistant::ARR_ASSISTANT[Opt::$lang]['name'].'</h3>
    <div class="text_fon"><div id="assistant_txt">';

if(User\User::$arrDBUser['step']<6){
    Opt::$main_content.=Def100\LangLibAssistant::ARR_ASSISTANT_LES[Opt::$lang]['les'.User\User::$arrDBUser['step']].'</div><div id="assist_les" class="cab_btn">'.Def100\LangLibCabBtn::ARR_BTN[Opt::$lang]['next'].'</div><script type="text/javascript">var assist_lesson='.User\User::$arrDBUser['step'].';
document.getElementById("assist_les").addEventListener("click",function(){assist_lesson++;
    ajaxPostSend("les=1&step="+assist_lesson,formCallAssistLes,true,true,"/ajax/cabinet/assistant.php");});
function formCallAssistLes(arr){
    document.getElementById("assistant_txt").innerHTML=arr.answer;
    if(!arr.btn)document.getElementById("assist_les").style.display="none";}
</script>';
}else Opt::$main_content.=Def100\LangLibAssistant::ARR_ASSISTANT[Opt::$lang]['no_message'];

Opt::$main_content.='
    </div>
</div>';
//ASSISTANT end

Opt::$main_content.='<div><h3 class="h_fon">'.Def100\LangLibCabMain::ARR_INDEX[Opt::$lang]['info_index'].'</h3></div>

<div class="text_fon">
<h4 class="h_fon_min">'.Def100\LangLibCabMain::ARR_INDEX[Opt::$lang]['general'].'</h4>



</div>


<div class="text_fon">
<h4 class="h_fon_min">'.Def100\LangLibCabMain::ARR_INDEX[Opt::$lang]['contact'].'</h4>

'.Def100\LangLibCabMain::ARR_INDEX[Opt::$lang]['info_index'].'

</div>


<div class="text_fon">
<h4 class="h_fon_min">'.Def100\LangLibCabMain::ARR_INDEX[Opt::$lang]['general'].'</h4>



</div>


';

