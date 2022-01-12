<?php
namespace lib\Def;

use incl\pro100\Def as Def100;

Opt::$title=Def100\LangLibCabMain::ARR_PARTNERS[Opt::$lang]['name'];

Opt::$main_content.='<div><h3 class="h_fon">'.Def100\LangLibCabMain::ARR_PARTNERS[Opt::$lang]['name'].'</h3></div>

<div class="text_fon"><h4 id="l0_part_btn" class="h_fon_min cp">'.Def100\LangLibCabMain::ARR_PARTNERS[Opt::$lang]['l0'].'</h4>
<div id="l0_cont" class="h_fon_field_h"></div>
</div>

<div class="text_fon"><h4 id="l1_part_btn" class="h_fon_min cp">'.Def100\LangLibCabMain::ARR_PARTNERS[Opt::$lang]['l1'].'</h4>
<div id="l1_cont" class="h_fon_field_h"></div>
</div>

<div class="text_fon"><h4 id="l2_part_btn" class="h_fon_min cp">'.Def100\LangLibCabMain::ARR_PARTNERS[Opt::$lang]['l2'].'</h4>
<div id="l2_cont" class="h_fon_field_h"></div>
</div>

<div class="text_fon"><h4 id="l3_part_btn" class="h_fon_min cp">'.Def100\LangLibCabMain::ARR_PARTNERS[Opt::$lang]['l3'].'</h4>
<div id="l3_cont" class="h_fon_field_h"></div>
</div>

<div class="text_fon"><h4 id="l4_part_btn" class="h_fon_min cp">'.Def100\LangLibCabMain::ARR_PARTNERS[Opt::$lang]['l4'].'</h4>
<div id="l4_cont" class="h_fon_field_h"></div>
</div><script type="text/javascript">
function getContPart(i){
    var d=document.getElementById("l"+i+"_cont");
    if(getComputedStyle(d).display=="none"){ajaxPostSend("ref=1&l"+i+"=1",formCallLine,true,true,"/ajax/cabinet/partners.php");}
}
function formCallLine(arr){var d=document.getElementById("l"+arr.l+"_cont");
    d.innerHTML=arr.answer;d.style.display="block";
    document.getElementById("l"+arr.l+"_part_btn").classList.remove("cp");
}
document.getElementById("l0_part_btn").addEventListener("click",function(){getContPart(0);},false);
document.getElementById("l1_part_btn").addEventListener("click",function(){getContPart(1);},false);
document.getElementById("l2_part_btn").addEventListener("click",function(){getContPart(2);},false);
document.getElementById("l3_part_btn").addEventListener("click",function(){getContPart(3);},false);
document.getElementById("l4_part_btn").addEventListener("click",function(){getContPart(4);},false);</script>';