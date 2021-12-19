<?php
namespace lib\Def;

use incl\pro100\Def as Def100;
//use \incl\pro100\User as User;

Opt::$title='Cabinet';

//Def100\LangLibАssistant::ARR_ASSISTANT['Opt::$lang'][User\User::$arrDBUser['step']].

Opt::$main_content.='
<div>
<h3 class="h_fon">'.Def100\LangLibAssistant::ARR_ASSISTANT[Opt::$lang]['name'].'</h3>
<div id="assistant_txt" class="five_">
'.Def100\LangLibAssistant::ARR_ASSISTANT[Opt::$lang]['no_message'].'

</div>
</div>
просто кабинет';