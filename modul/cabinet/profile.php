<?php
namespace lib\Def;

use incl\pro100\Def as Def100;
use incl\pro100\User as User;
use incl\pro100\Profile as Prof;

Opt::$title=Def100\LangLibCabMain::ARR_PROFILE[Opt::$lang]['name'];


Opt::$main_content.='<div><h3 class="h_fon">'.Def100\LangLibCabMain::ARR_PROFILE[Opt::$lang]['settings'].'</h3></div>';

//настройки
Opt::$main_content.='<div class="text_fon"><h4 class="h_fon_min">'.Def100\LangLibCabMain::ARR_PROFILE[Opt::$lang]['upd_pas'].'</h4><div id="aj_p_pas" class="h_fon_field">'.Prof\PasSettings::getProfilePasInfo().'</div></div>';




//настройк перенести в низ всё////////////*********************///////////////

Opt::$main_content.='<div><h3 class="h_fon">'.Def100\LangLibCabMain::ARR_PROFILE[Opt::$lang]['name'].'</h3></div>';

//Личные данные
Opt::$main_content.='<div class="text_fon"><h4 class="h_fon_min">'.Def100\LangLibCabMain::ARR_INDEX[Opt::$lang]['personal'].'</h4><div id="aj_p_person" class="h_fon_field">'.Prof\PersonalData::getProfilePersonalInfo().'</div></div>';


//Платёжные данные
Opt::$main_content.='<div class="text_fon"><h4 class="h_fon_min">'.Def100\LangLibCabMain::ARR_INDEX[Opt::$lang]['payment'].'</h4><div class="h_fon_field"><h4 class="h_fon_min">'.Def100\LangLibCabMain::ARR_PROFILE[Opt::$lang]['ps'].' '.Def100\OptCab::paysSystems(1).'</h4><div id="aj_p_wal" class="h_fon_field">'.Prof\PaymentData::getProfilePerfectInfo().'</div></div></div>';

//настройк
