<?php

//include('../inc/top_menu.php');
//if(!USER_LOGGED) { header ("Location: /"); exit; }
namespace lib\Def;
use \incl\pro100\User as User;

$pname = 'Пополнение баланса';
$pkey = 'Пополнение баланса';
$pdesc = 'Пополнение баланса';
?>
<!-- Контент -->

<div class="row">

<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title">Пополнение баланса аккаунта</h3>
</div>
<div class="panel-body">
<button class="btn btn-info waves-effect waves-light" data-toggle="modal" data-target="#t_new" style="width: 250px;">Пополнить счёт</button>

<div id="t_new" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="balance_out_label" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<form action="/actions/in.php" method="post" target="_blank">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
<h4 class="modal-title" id="balance_out_label">Пополнение баланса аккаунта</h4>
</div>
<div class="modal-body">
<div class="form-group">
<label for="t_th">Платёжная система</label>
<select id="n_ps" name="ps" class="form-control">
<option value="2">Perfect Money</option>
</select>
</div>
<div class="form-group">
<label for="t_msg">Сумма</label>
<input type="text" class="form-control" id="n_sum" name="sum" placeholder="Сумма к пополнению">
</div>
</div>
<div class="modal-footer m-t-20">
<button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Отменить</button>
<button id="t_submit" class="btn btn-info waves-effect waves-light">Пополнить</button>
</div>
</form>
</div>
</div>
</div>
<br /><br />
<?php
$st = "SELECT id,sum,ty,dt FROM `t_in` WHERE usr = '$u_id' AND st = '1' ORDER BY id DESC";
$qt = mysqli_query($connect_db, $st);
$ht = mysqli_num_rows($qt);
if ($ht > 0) {
?>
<div class="table-responsive">
<table class="table table-hover">
<thead>
<tr align="center">
<th>Сумма</th>
<th>Тип зачисления</th>
<th>Дата зачисления</th>
</tr>
</thead>
<tbody>
<?php
while($row = mysqli_fetch_array($qt)) {
?>
<tr>
<td><?php echo $row['sum']; ?> $.</td>
<td><?php if ($row['ty'] == 0) { echo 'Пополнение баланса'; } if ($row['ty'] == 1) { echo 'Реферальные начисления'; } ?></td>
<td><?php echo date('d.m.Y в H:i',$row['dt']); ?><td>
</tr>
<?php } ?>
</tbody>
</table>
</div>
<?php } else { echo '<div class="alert alert-info alert-dismissable p-l-40"><i class="md md-info"></i> История зачислений пуста.</div>'; } ?>

<script type='text/javascript'>
$(function() {
$('#n_sum').bind("change keyup paste input", function() {
var $th = $(this);
$th.val( $th.val().replace(/[^0-9]/g, function(){ return ''; }) );
});
});
</script>

</div>
</div>
</div>

<!-- /Контент -->
<?php //include('../inc/bottom_menu.php'); ?>