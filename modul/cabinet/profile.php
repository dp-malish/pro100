<?php
namespace lib\Def;

use incl\pro100\Def as Def100;



Opt::$main_content.='<div><h3 class="h_fon">'.Def100\LangLibCabMain::ARR_PROFILE[Opt::$lang]['name'].'</h3></div>';

//Платёжные данные
Opt::$main_content.='<div class="text_fon">
<h4 class="h_fon_min">'.Def100\LangLibCabMain::ARR_INDEX[Opt::$lang]['payment'].'</h4>
<div class="h_fon_field">

<h4 class="h_fon_min">'.Def100\LangLibCabMain::ARR_PROFILE[Opt::$lang]['ps'].' '.Def100\OptCab::paysSystems(1).'</h4>

<div id="aj_p_wal" class="h_fon_field">'.\incl\pro100\Profile\PaymentData::getProfilePerfectInfo().'</div>

</div></div>';

Opt::$main_content.='<div class="text_fon">
<h4 class="h_fon_min">'.Def100\LangLibCabMain::ARR_INDEX[Opt::$lang]['personal'].'</h4>




<div id="aj_p_person" class="h_fon_field">'.'rtgr</div>
</div>';