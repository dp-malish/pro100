<?php
namespace lib\Def;

use \incl\pro100\Def as Def100;



Opt::$title='Balance';

Opt::$main_content.='<div id="aj_p">
<div><h3 class="h_fon">'.Def100\LangLibCabMain::ARR_BALANS[Opt::$lang]['name_1'].'</h3></div>
    <div class="text_fon"><h4 class="h_fon_min">'.Def100\LangLibCabMain::ARR_BALANS[Opt::$lang]['form_add_bal'].'</h4>
    <div class="h_fon_field">
        
        <div class="d_inp">        
            <span class="d_inp_l">'.Def100\LangLibCabMain::ARR_BALANS[Opt::$lang]['tabl_out_sum'].'</span>
            <span class="d_inp_r">
                <input type="number" id="bal_sum" placeholder="'.Def100\LangLibCabMain::ARR_BALANS[Opt::$lang]['sum_add'].'">        
            </span>
            <div class="cl"></div>
        </div>
        
        <div id="bal_cash_in_btn" class="cab_btn">'.Def100\LangLibCabMain::ARR_BALANS[Opt::$lang]['name_1'].'</div>
        
        <div id="d_answ"></div>
        
    </div>
    
    </div>
</div>';

Opt::$main_content.='<script type="text/javascript">

document.getElementById("bal_cash_in_btn").addEventListener("click",function(){

var sum=document.getElementById("bal_sum").value;
ajaxPostSend("cash-in=1&sum="+sum,formCallLine,true,true,"/ajax/cabinet/cash.php");

});

function formCallLine(arr){
    if(arr.l==1){
        document.getElementById("d_answ").innerHTML="<p>"+arr.answer+"</p>";
    }else{
        document.getElementById("aj_p").innerHTML=arr.answer;
    }
}
</script>';