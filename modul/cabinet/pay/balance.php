<?php
namespace lib\Def;

use incl\pro100\Def as Def100;
use incl\pro100\User as User;

Opt::$title='Balance';

Opt::$main_content.='
<div><h3 class="h_fon">'.Def100\LangLibCabMain::ARR_BALANS[Opt::$lang]['name'].'</h3>
    <div class="text_fon">
    <h4 class="h_fon_min">'.Def100\LangLibCabMain::ARR_BALANS[Opt::$lang]['name_1'].'</h4>
    <div class="cab_btn">'.Def100\LangLibCabBtn::ARR_BTN[Opt::$lang]['bal_cash_in'].'</div>
    <div class="cab_btn">'.Def100\LangLibCabBtn::ARR_BTN[Opt::$lang]['bal_hist_in'].'</div>
    
    </div><div class="text_fon">
    <h4 class="h_fon_min">'.Def100\LangLibCabMain::ARR_BALANS[Opt::$lang]['name_2'].'</h4>
    <div class="cab_btn">'.Def100\LangLibCabBtn::ARR_BTN[Opt::$lang]['bal_cash_out'].'</div>
    <div class="cab_btn">'.Def100\LangLibCabBtn::ARR_BTN[Opt::$lang]['bal_hist_out'].'</div>
    </div>
</div>';

