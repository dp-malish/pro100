<?php
$pname = 'Вывод средств';
$pkey = 'Вывод средств';
$pdesc = 'Вывод средств';
//include('../inc/top_menu.php');
//if(!USER_LOGGED) { header ("Location: /"); exit; }
?>
<!-- Контент -->

<div class="row">

<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title">Вывод средств</h3>
</div>
<div class="panel-body">
<button class="btn btn-info waves-effect waves-light" data-toggle="modal" data-target="#t_new" style="width: 250px;">Вывести средства</button>

<div id="t_new" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="balance_out_label" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
<h4 class="modal-title" id="balance_out_label">Вывод средств</h4>
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
<input type="text" class="form-control" id="n_sum" name="sum" placeholder="Сумма к выводу">
</div>
</div>
<div class="modal-footer m-t-20">
<button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Отменить</button>
<button id="t_submit" class="btn btn-info waves-effect waves-light">Вывести</button>
</div>
</div>
</div>
</div>
<br /><br />
<?php
$st = "SELECT id,sum,ps,dt FROM `t_out` WHERE usr = '$u_id' ORDER BY id DESC";
$qt = mysqli_query($connect_db, $st);
$ht = mysqli_num_rows($qt);
if ($ht > 0) {
?>
<div class="table-responsive">
<table class="table table-hover">
<thead>
<tr align="center">
<th>Сумма</th>
<th>Платёжная система</th>
<th>Дата выплаты</th>
</tr>
</thead>
<tbody>
<?php
while($row = mysqli_fetch_array($qt)) {
?>
<tr>
<td><?php echo $row['sum']; ?> $.</td>
<td><?php if ($row['ps'] == 0) { echo 'Payeer'; } if ($row['ps'] == 1) { echo 'Perfect Money'; } ?></td>
<td><?php echo date('d.m.Y в H:i',$row['dt']); ?><td>
</tr>
<?php } ?>
</tbody>
</table>
</div>
<?php } else { echo '<div class="alert alert-info alert-dismissable p-l-40"><i class="md md-info"></i> История вывода пуста.</div>'; } ?>

<script type='text/javascript'>
$(document).ready(function () {
$('#sum').keyup(function() {
var $th = $(this);
$th.val( $th.val().replace(/[^0-9\.]/g, function(){ return ''; }) );
});
});
$(function() {
$('#t_submit').click(function(){
var sum = $('#n_sum').val();
var ps = $('#n_ps').val();
$.ajax({
type: 'POST',
url: '/actions/out.php',
data: {'sum': sum, 'ps': ps},
cache: false,
success: function(result){
if (result == '0') {
$.jGrowl('Вы не указали сумму к выводу', { theme: 'growl-error' });
}
if (result == '1') {
$(location).attr('href','/cabinet/cashout');
}
if (result == '2') {
$.jGrowl('Минимальная сумма к выводу $<?php echo $min_out; ?>', { theme: 'growl-error' });
}
if (result == '3') {
$.jGrowl('На балансе Вашего аккаунта не хватает средств', { theme: 'growl-error' });
}
if (result == '4') {
$.jGrowl('Баланс Вашего аккаунта менее <?php echo $min_out; ?> $.', { theme: 'growl-error' });
}
if (result == '5') {
$.jGrowl('Вы не авторизованы', { theme: 'growl-error' });
}
if (result == '7') {
$.jGrowl('Не указан кошелёк в профиле', { theme: 'growl-error' });
}
if (result == '6') {
$.jGrowl('Ошибка', { theme: 'growl-error' });
}
if (result == '8') {
$.jGrowl('Максимальная сумма к выводу $<?php echo $max_out; ?>', { theme: 'growl-error' });
}
}
});
});
});
</script>

</div>
</div>
</div>

<!-- /Контент -->
<?php include('../inc/bottom_menu.php'); ?>