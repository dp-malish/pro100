<?php
namespace lib\Def;

use \incl\pro100\Def as Def100;

Opt::$title=Def100\LangLibCabMain::ARR_BALANS[Opt::$lang]['name_1'];

Opt::$main_content.='<div id="aj_p"><div><h3 class="h_fon">'.Def100\LangLibCabMain::ARR_BALANS[Opt::$lang]['name_1'].'</h3></div>
    <div class="text_fon"><h4 class="h_fon_min">'.Def100\LangLibCabMain::ARR_BALANS[Opt::$lang]['form_add_bal'].'</h4>
    <div class="h_fon_field">
        <div class="d_inp">        
            <span class="d_inp_l">'.Def100\LangLibCabMain::ARR_BALANS[Opt::$lang]['tabl_in_sum'].'</span>
            <span class="d_inp_r"><input type="number" id="bal_sum" placeholder="'.Def100\LangLibCabMain::ARR_BALANS[Opt::$lang]['sum_add'].'"></span><div class="cl"></div>
        </div>
        <div id="bal_cash_in_btn" class="cab_btn">'.Def100\LangLibCabBtn::ARR_BTN[Opt::$lang]['bal_cash_in'].'</div><div id="d_answ"></div>
    </div>
    </div>
</div><script type="text/javascript">var fs_btn=true;document.getElementById("bal_cash_in_btn").addEventListener("click",function(){var sum=document.getElementById("bal_sum").value;if(sum<1){$.jGrowl("'.Def100\LangLibPay::ARR_ERR_PAY[Opt::$lang]['sum_null'].'",{theme:"growl-error",life:4000});}else{if(fs_btn){fs_btn=false;ajaxPostSend("cash-in=1&sum="+sum,formCallLine,true,true,"/ajax/cabinet/cash.php");}}});function formCallLine(arr){if(arr.l==1){document.getElementById("d_answ").innerHTML="<p>"+arr.answer+"</p>";fs_btn=true;}else if(arr.l==2){document.getElementById("aj_p").innerHTML=arr.answer;fs_btn=true;}else if(arr.l==3){document.getElementById("d_answ").innerHTML=arr.answer;document.forms["pm-send"].submit();}}</script>';