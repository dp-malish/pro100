<?php
namespace lib\Def;

use incl\pro100\Def as Def100;
//use incl\pro100\User as User;

Opt::$title=Def100\LangLibCabMain::ARR_BALANS[Opt::$lang]['name'];

Opt::$main_content.='
<div><h3 class="h_fon">'.Def100\LangLibCabMain::ARR_BALANS[Opt::$lang]['name'].'</h3>
    <div class="text_fon">
    <h4 class="h_fon_min">'.Def100\LangLibCabMain::ARR_BALANS[Opt::$lang]['name_1'].'</h4>
    <div id="bal_cash_in_btn" class="cab_btn">'.Def100\LangLibCabBtn::ARR_BTN[Opt::$lang]['bal_cash_in'].'</div>
    <div id="bal_hist_in_btn" class="cab_btn">'.Def100\LangLibCabBtn::ARR_BTN[Opt::$lang]['bal_hist_in'].'</div>
    
    </div><div class="text_fon">
    <h4 class="h_fon_min">'.Def100\LangLibCabMain::ARR_BALANS[Opt::$lang]['name_2'].'</h4>
    <div id="bal_cash_out_btn" class="cab_btn">'.Def100\LangLibCabBtn::ARR_BTN[Opt::$lang]['bal_cash_out'].'</div>
    <div id="bal_hist_out" class="cab_btn">'.Def100\LangLibCabBtn::ARR_BTN[Opt::$lang]['bal_hist_out'].'</div>
    </div>
</div>';

Opt::$main_content.='
<script type="text/javascript">
document.getElementById("bal_cash_in_btn").addEventListener("click",function(){
    location.href="/cabinet/cash-add";  
});
document.getElementById("bal_hist_in_btn").addEventListener("click",function(){
    location.href="/cabinet/history-in";  
});
document.getElementById("bal_cash_out_btn").addEventListener("click",function(){
    location.href="/cabinet/cash-out";  
});
document.getElementById("bal_hist_out").addEventListener("click",function(){
    location.href="/cabinet/history-out";  
});
</script>';
