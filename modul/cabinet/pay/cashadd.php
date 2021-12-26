<?php
namespace lib\Def;

use \incl\pro100\User as User;

use \incl\pro100\Def as Def100;
use \incl\pro100\Pay as Pay;

$cash=new Pay\viewTransaction();
Opt::$title='Balance';

Opt::$main_content.='
<div><h3 class="h_fon">'.Def100\LangLibCabMain::ARR_BALANS[Opt::$lang]['name_1'].'</h3></div>
<div class="text_fon">
<h4 class="h_fon_min">'.Def100\LangLibCabMain::ARR_BALANS[Opt::$lang]['form_add_bal'].'</h4>

<div class="h_fon_field">
<form action="/cabinet/cashin" method="post" target="_blank">

<label for="t_msg">'.Def100\LangLibCabMain::ARR_BALANS[Opt::$lang]['tabl_out_sum'].'</label>
<input type="text" id="n_sum" name="sum" placeholder="'.Def100\LangLibCabMain::ARR_BALANS[Opt::$lang]['sum_add'].'">

<div class="modal-footer m-t-20">

<button id="t_submit">'.Def100\LangLibCabMain::ARR_BALANS[Opt::$lang]['name_1'].'</button>
</div>
</form>

</div>
</div>';


    //Opt::$main_content.='<br><br><br><h2>add cash</h2><br>'.$cash->getTransactionIn();


