<?php
/**
 * Created by PhpStorm.
 * User: WinTeh
 * Date: 21.09.2021
 * Time: 14:23
 */
namespace lib\Def;

//use \incl\pro100\User as User;
use incl\pro100\Def as Def100;

use \incl\pro100\Pay as Pay;

$cash=new Pay\viewTransaction();


Opt::$main_content.='<div><h3 class="h_fon">'.Def100\LangLibCabMain::ARR_BALANS[Opt::$lang]['name'].'</h3>
'.$cash->getTransactionOut().

    '</div>';

