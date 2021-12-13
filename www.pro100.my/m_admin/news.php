<?php
$pname = 'Новости';
$pkey = 'новости';
$pdesc = 'Новости';
include('../inc/top_menu.php');
if(!USER_LOGGED || $u_id != $admin_uid) { header ("Location: /"); exit; }
?>
<!-- Контент -->

<div class="row">

<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title">Новости</h3>
</div>
<div class="panel-body">

<button class="btn btn-info waves-effect waves-light" data-toggle="modal" data-target="#t_new" style="width: 250px;">Создать новость</button>

<div id="t_new" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="balance_out_label" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
<h4 class="modal-title" id="balance_out_label">Создание новости</h4>
</div>
<div class="modal-body">
<div class="form-group">
<label for="th">Тема</label>
<input type="text" class="form-control" id="th" placeholder="Тема">
</div>
<div class="form-group">
<label for="msg">Текст новости</label>
<textarea style="width: 100%;" class="form-control" rows="3" cols="1" placeholder="Текст новости" id="msg"></textarea>
</div>
</div>
<div class="modal-footer m-t-20">
<button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Отменить</button>
<button id="t_submit" class="btn btn-info waves-effect waves-light">Создать</button>
</div>
</div>
</div>
</div>
<br /><br />

<?php
$st = "SELECT id,ti,msg FROM `t_news` ORDER BY id DESC";
$qt = mysqli_query($connect_db, $st);
$ht = mysqli_num_rows($qt);
if ($ht > 0) {
?>
<div class="table-responsive">
<table class="table table-hover">
<thead>
<tr align="center">
<th>Название</th>
<th>Текст</th>
<th>Действия</th>
</tr>
</thead>
<tbody>
<?php
while($row = mysqli_fetch_array($qt)) {
?>
<tr>
<td><?php echo $row['ti']; ?></td>
<td><?php echo nl2br(htmlspecialchars($row['msg'])); ?></td>
<td>
<a class="btn btn-danger btn-sm waves-effect waves-light" href="javascript://" onclick="review_del('<?php echo $row['id']; ?>')"><i class="fa fa-close"></i></a>
<td>
</tr>
<?php } ?>
</tbody>
</table>
</div>
<?php } else { echo '<div class="alert alert-info alert-dismissable p-l-40"><i class="md md-info"></i> Новостей нет</div>'; } ?>

<div id="review_del" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="balance_out_label" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
<h4 class="modal-title" id="balance_out_label">Удаление</h4>
</div>
<div class="modal-body">
<div class="alert alert-info alert-dismissable p-l-40 margnone">
<i class="md md-info"></i> Вы уверены что хотите удалить новость?
</div>
</div>
<div class="modal-footer m-t-20">
<button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Отменить</button>
<button id="btn_del" class="btn btn-danger waves-effect waves-light">Удалитть</button>
</div>
</div>
</div>
</div>

<script type='text/javascript'>

var vrdel;
function review_del(id){
vrdel = id;
$('#review_del').modal('show');
};

$(function() {

$('#btn_del').click(function(){
$.ajax({
type: 'POST',
url: '/actions/a_news_del.php',
data: {'id': vrdel, 'token': '<?php echo $token; ?>'},
cache: false,
success: function(result){
if (result == '1') {
$(location).attr('href','/m_admin/news');
}
if (result == '3') {
$.jGrowl('Ошибка', { theme: 'growl-error' });
}
},
error: function(){
$.jGrowl('Ошибка', { theme: 'growl-error' });
}
});
});

$('#t_submit').click(function(){
var th = $('#th').val();
var msg = $('#msg').val();
$.ajax({
type: 'POST',
url: '/actions/a_news_new.php',
data: {'th': th, 'msg': msg, 'token': '<?php echo $token; ?>'},
cache: false,
success: function(result){
if (result == '0') {
$.jGrowl('Не заполнены все необходимые поля', { theme: 'growl-error' });
}
if (result == '1') {
$(location).attr('href','/m_admin/news');
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

</div>
</div>
</div>

<!-- /Контент -->
<?php include('../inc/bottom_menu.php'); ?>