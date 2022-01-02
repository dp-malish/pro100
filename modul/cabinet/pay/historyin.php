<?php
namespace lib\Def;

use incl\pro100\Def as Def100;

use \incl\pro100\Pay as Pay;

$cash=new Pay\viewTransaction();
Opt::$title=Def100\LangLibCabMain::ARR_BALANS[Opt::$lang]['bal_hist_in'];


Opt::$main_content.='<div><h3 class="h_fon">'.Def100\LangLibCabMain::ARR_BALANS[Opt::$lang]['name'].'</h3><div class="text_fon"><h4 class="h_fon_min">'.Def100\LangLibCabMain::ARR_BALANS[Opt::$lang]['bal_hist_in'].'</h4>'.$cash->getTransactionIn().'</div><div id="back_bal_btn" class="cab_btn">'.Def100\LangLibCabBtn::ARR_BTN[Opt::$lang]['back'].'</div></div><script type="text/javascript">document.getElementById("back_bal_btn").addEventListener("click",function(){location.href="/cabinet/balance";});</script>';