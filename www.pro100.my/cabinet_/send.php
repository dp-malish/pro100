<?php
$pname = 'Перевод  средств другому пользователю';
$pkey = 'Перевод  средств другому пользователю';
$pdesc = 'Перевод  средств другому пользователю';
// 	ini_set('error_reporting', E_ALL);
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
include('../inc/top_menu.php');
if(!USER_LOGGED) { header ("Location: /"); exit; }
$usri = mysqli_fetch_assoc(mysqli_query($connect_db, "SELECT * FROM t_users WHERE uid = '$u_id' LIMIT 1"));


$sql_ref = "SELECT COUNT(`ref`) as `count` FROM `t_users` WHERE `ref` = '$id_user'";
$res_ref = mysqli_query($connect_db, $sql_ref);


if (mysqli_num_rows($res_ref) > 0) {
	while($row_ref = mysqli_fetch_assoc($res_ref)) {
		$refs_all = $row_ref['count'];
	} 
}

?>
<!-- Контент -->

<div class="row">

	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Перевести деньги другому пользователю</h3>
		</div>
		<div class="panel-body">
			<?php 
			$sql = "SELECT `uid`, `log` FROM `t_users` WHERE `uid` != 4955 AND  `uid` != '$u_id' ";
			$res = mysqli_query($connect_db, $sql);

			?>
			<div class="send-block">
				<select class="send-select" name="" id="">
					<option value="0" selected="selected">Выберите пользователя</option>
					<?php while($row = mysqli_fetch_array($res)) { ?>
						<option value="<?=$row['uid']?>"><?=$row['log']?></option>
					<?php } ?>

				</select>
				<input class="form-control send-input" type="number" min="1" placeholder="Введите сумму">
				<button class="send-money-btn btn btn-info waves-effect waves-light">Отправить</button>
			</div>
				<?php
		$st = "SELECT `sum`, `user_to`, `user_from`, `date_time` FROM `t_send` WHERE `user_from` = '$u_id' ORDER BY `id` DESC";
		$qt = mysqli_query($connect_db, $st);
		$ht = mysqli_num_rows($qt);

		
		if ($ht > 0) {
			?>
			<p>История переводов:</p>
			<div class="table-responsive">
				<table class="table table-hover">
					<thead>
						<tr align="center">
							<th>Сумма</th>
							<th>Кому</th>
							<th>Дата зачисления</th>
						</tr>
					</thead>
					<tbody>
						<?php
						while($row = mysqli_fetch_array($qt)) {
						$user_to = $row['user_to'];
						$sql = "SELECT `log` FROM `t_users` WHERE `uid` ='$user_to'";
						$res = mysqli_query($connect_db, $sql);
						$user_row = mysqli_fetch_assoc($res);
							?>
							<tr>
								<td><?php echo $row['sum']; ?> руб</td>
								<td><?php echo $user_row['log']; ?></td>
								<td><?php echo date('d.m.Y в H:i',$row['date_time']); ?><td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			<?php } else { echo '<div class="alert alert-warning alert-dismissable p-l-40"><i class="md md-info"></i> История переводов пуста.</div>'; } ?>

		</div>
	
		</div>
	</div>

	<!-- /Контент -->
	<?php include('../inc/bottom_menu.php'); ?>