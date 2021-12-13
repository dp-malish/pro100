<?php
$pname = 'Повышение уровня';
$pkey = 'повышение';
$pdesc = 'Повышение уровня';
include('../inc/top_menu.php');
if(!USER_LOGGED) { header ("Location: /"); exit; }
?>
<!-- Контент -->

<div class="row">

<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title">Повышение уровня</h3>
</div>
<div class="panel-body">

<?php
if ($nowusr['level'] >= 4) { echo '<div class="alert alert-info alert-dismissable p-l-40"><i class="md md-info"></i> Все доступные уровни заказаны</div>'; } else {
$next_level = $nowusr['level']+1;
?>
<div class="row">
<div class="col-sm-12 col-md-12 col-lg-12">
<div class="alert alert-info alert-dismissable p-l-40"><i class="md md-info"></i> Для повышения уровня пополните баланс аккаунта на необходимую сумму и нажмите на кнопку "Повысить уровень".</div>
</div>
</div>


<div class="row">
<div class="col-sm-12 col-md-3 col-lg-3">
</div>

<div class="col-sm-12 col-md-6 col-lg-6">
<div class="form-group">
<label for="level_u">Уровень</label>
<input type="text" value="<?php echo $next_level; ?>" class="form-control" id="level_u" placeholder="Уровень" maxlength="2" disabled="disabled" />
</div>
<div class="form-group">
<label for="level_u">Стоимость уровня, $:</label>
<input type="text" value="<?php echo $levels[$next_level]; ?>" class="form-control" id="level_u" placeholder="Стоимость уровня" disabled="disabled" />
</div>
<center><button id="batch_send" class="btn btn-info waves-effect waves-light" data-loading-text="Повышаем...">Повысить уровень</button></center>
</div>
<div class="col-sm-12 col-md-3 col-lg-3">
</div>

</div>

<?php } ?>

</div>
</div>
</div>

<script type='text/javascript'>
$(function() {
var btn_send = $('#batch_send');
btn_send.click(function(){
btn_send.button('loading');
$.ajax({
type: 'POST',
url: '/actions/send_batch.php',
data: {'token': '<?php echo $token; ?>'},
cache: false,
success: function(result){
btn_send.button('reset');
if (result == '0') {
$.jGrowl('На балансе аккаунта недостаточно средств', { theme: 'growl-error' });
}
if (result == '1') {
$(location).attr('href','/cabinet/up');
}
if (result == '2') {
$.jGrowl('Вы не авторизованы', { theme: 'growl-error' });
}
if (result == '3') {
$.jGrowl('Ошибка', { theme: 'growl-error' });
}
}
});
});

});
</script>

<!-- /Контент -->
<?php include('../inc/bottom_menu.php'); ?>