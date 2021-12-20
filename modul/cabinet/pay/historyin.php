<?php
namespace lib\Def;

use \incl\pro100\User as User;

use \incl\pro100\Pay as Pay;

$cash=new Pay\viewTransaction();


Opt::$main_content.='<h3>Тут форма для ввода суммы пополнения и можно выбрать платёжную систему</h3>

<form action="/cabinet/cashin" method="post" target="_blank">
<div class="modal-header">

<h4 class="modal-title" id="balance_out_label">Пополнение баланса аккаунта</h4>
</div>

<label for="t_msg">Сумма</label>
<input type="text" id="n_sum" name="sum" placeholder="Сумма к пополнению">

<div class="modal-footer m-t-20">
<button type="button">Отменить</button>
<button id="t_submit">Пополнить</button>
</div>
</form>';


    Opt::$main_content.='<br><br><br><h2>add cash</h2><br>'.$cash->getTransactionIn();


