<?php
namespace lib\Def;

use incl\pro100\Def as Def100;

Opt::$title=Def100\LangLibCabMain::ARR_SUPPORT[Opt::$lang]['name'];

Opt::$main_content.='<div><h3 class="h_fon">'.Def100\LangLibCabMain::ARR_SUPPORT[Opt::$lang]['name'].'</h3></div>
<div class="text_fon">';


/*foreach (Def100\LangLibCabMain::ARR_SUPPORT[Opt::$lang]['theme'] as $k=>$v){

    Opt::$main_content.=$k.'<br> '. $v.'<br>';
}<input type="number" id="bal_sum" placeholder="'.Def100\LangLibCabMain::ARR_BALANS[Opt::$lang]['sum_add'].'">*/


Opt::$main_content.='<h4 class="h_fon_min">'.Def100\LangLibCabMain::ARR_SUPPORT[Opt::$lang]['support_form'].'</h4>

<div class="d_inp"><span class="d_inp_l">'.Def100\LangLibCabMain::ARR_SUPPORT[Opt::$lang]['field_1'].'</span>
<span class="d_inp_r"><select name="theme" id="theme">';
foreach (Def100\LangLibCabMain::ARR_SUPPORT[Opt::$lang]['theme'] as $k=>$v){
    Opt::$main_content.='<option value="'.$k.'">'.$v.'</option>';
}
Opt::$main_content.='</select></span>
<div class="cl five_"></div>
<span class="d_inp_l">'.Def100\LangLibCabMain::ARR_SUPPORT[Opt::$lang]['field_2'].'</span>
<span class="d_inp_r"><textarea id="theme_txt" name="theme_txt"></textarea></span>
<div class="cl five_"></div>
</div>

<div id="support_btn" class="cab_btn">'.Def100\LangLibCabBtn::ARR_BTN[Opt::$lang]['send'].'</div>
<div id="d_answ"></div>
</div>';


Opt::$main_content .= '<script type="text/javascript">
var fs_btn=true;
document.getElementById("support_btn").addEventListener("click",function(){
    
    var theme=document.getElementById("theme").value;
    var txt=document.getElementById("theme_txt").value;
    
    if(txt.length<2){
        $.jGrowl("'.Def100\LangLibCabMain::ARR_SUPPORT[Opt::$lang]['js_err'].'",{theme:"growl-error",life:4000});
    }else{
        if(fs_btn){
            ajaxPostSend("support=1&theme="+theme+"&txt="+txt,formSupport,true,true,"/ajax/cabinet/support.php");
        }
        else alert(34);
    }

});

        

function formSupport(arr){
    if(arr.l==1){
        $.jGrowl(arr.answer,{theme:"growl-error",life:4000});
        fs_btn=true;
    }else if(arr.l==2){
        document.getElementById("aj_p").innerHTML=arr.answer;
        fs_btn=true;
    }else if(arr.l==3){
        document.getElementById("d_answ").innerHTML=arr.answer;
        
    }
}</script>';