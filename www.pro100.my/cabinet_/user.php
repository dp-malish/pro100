<?php
$pname = 'Просмотр пользователя';
$pkey = 'пользователь';
$pdesc = 'Просмотр пользователя';
include('../inc/top_menu.php');
if(!USER_LOGGED) { header ("Location: /"); exit; }
$getu = mysqli_real_escape_string($connect_db, trim($_GET['login']));
$nlog = explode('/', $getu);
$getuser = mysqli_real_escape_string($connect_db, $nlog['1']);
$view_user = mysqli_fetch_assoc(mysqli_query($connect_db, "SELECT * FROM t_users WHERE log='$getuser' LIMIT 1"));
?>
<!-- Контент -->

<div class="row">
<?php
if (empty($view_user['uid'])) {
?>

<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title">Ошибка</h3>
</div>
<div class="panel-body">
<div class="alert alert-info alert-dismissable p-l-40">
<i class="md md-info"></i> Пользователь не найден.
</div>
</div>
</div>

<?php } else { ?>
<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title">Информация о пользователе <?php echo $getuser; ?></h3>
</div>
<div class="panel-body">

<?php
if (empty($view_user['av'])) { $usr_av = wu_noavatar($view_user['log']); } else { $usr_av = '/static/avatars/'.$view_user['av']; }
?>
<div class="col-sm-12 col-md-3 col-lg-2">
<center><img src="<?php echo $usr_av; ?>" alt="" class="thumb-xl img-circle"></center>
</div>

<div class="col-sm-12 col-md-9 col-lg-10">

<div class="icon_line">
<i class="fa fa-user"></i>
<div class="nowrap title_line">Общее</div>
<div class="line"></div>
</div>
<div class="vcenter-ico">Логин: <?php echo $view_user['log']; ?></div>
<?php if (!empty($view_user['prf_name'])) { ?><br /><div class="vcenter-ico">Имя: <?php echo htmlspecialchars($view_user['prf_name']); ?></div><?php } ?>
<?php if (!empty($view_user['prf_fam'])) { ?><br /><div class="vcenter-ico">Фамилия: <?php echo htmlspecialchars($view_user['prf_fam']); ?></div><?php } ?>
<br /><div class="vcenter-ico">Зарегистрирован: <?php echo date('d.m.Y в H:i',$view_user['dt']); ?></div>

<br /><br />

<div class="icon_line">
<i class="fa fa-phone"></i>
<div class="nowrap title_line">Контактные данные</div>
<div class="line"></div>
</div>
<?php if (empty($view_user['cont_vk']) && empty($view_user['cont_ok']) && empty($view_user['cont_fb']) && empty($view_user['cont_wa']) && empty($view_user['cont_vi']) && empty($view_user['cont_sk']) && empty($view_user['cont_te']) && empty($view_user['cont_icq']) && empty($view_user['cont_sms'])) { ?>
<div class="alert alert-info alert-dismissable p-l-40">
<i class="md md-info"></i> Контактные данные не указаны.
</div>
<?php } else { ?>
<?php if (!empty($view_user['cont_vk'])) { ?><div class="vcenter-ico"><img src="/static/img/mini/vk.png" class="imgicn" data-toggle="tooltip" data-placement="left" title="Вконтакте" /> <?php echo htmlspecialchars($view_user['cont_vk']); ?></div><br /><?php } ?>
<?php if (!empty($view_user['cont_ok'])) { ?><div class="vcenter-ico"><img src="/static/img/mini/ok.png" class="imgicn" data-toggle="tooltip" data-placement="left" title="Одноклассники" /> <?php echo htmlspecialchars($view_user['cont_ok']); ?></div><br /><?php } ?>
<?php if (!empty($view_user['cont_fb'])) { ?><div class="vcenter-ico"><img src="/static/img/mini/fb.png" class="imgicn" data-toggle="tooltip" data-placement="left" title="Facebook" /> <?php echo htmlspecialchars($view_user['cont_fb']); ?></div><br /><?php } ?>
<?php if (!empty($view_user['cont_wa'])) { ?><div class="vcenter-ico"><img src="/static/img/mini/wa.png" class="imgicn" data-toggle="tooltip" data-placement="left" title="WhatsApp" /> <?php echo htmlspecialchars($view_user['cont_wa']); ?></div><br /><?php } ?>
<?php if (!empty($view_user['cont_vi'])) { ?><div class="vcenter-ico"><img src="/static/img/mini/viber.png" class="imgicn" data-toggle="tooltip" data-placement="left" title="Viber" /> <?php echo htmlspecialchars($view_user['cont_vi']); ?></div><br /><?php } ?>
<?php if (!empty($view_user['cont_sk'])) { ?><div class="vcenter-ico"><img src="/static/img/mini/sk.png" class="imgicn" data-toggle="tooltip" data-placement="left" title="Skype" /> <?php echo htmlspecialchars($view_user['cont_sk']); ?></div><br /><?php } ?>
<?php if (!empty($view_user['cont_te'])) { ?><div class="vcenter-ico"><img src="/static/img/mini/tg.png" class="imgicn" data-toggle="tooltip" data-placement="left" title="Telegram" /> <?php echo htmlspecialchars($view_user['cont_te']); ?></div><br /><?php } ?>
<?php if (!empty($view_user['cont_icq'])) { ?><div class="vcenter-ico"><img src="/static/img/mini/icq.png" class="imgicn" data-toggle="tooltip" data-placement="left" title="ICQ" /> <?php echo htmlspecialchars($view_user['cont_icq']); ?></div><br /><?php } ?>
<?php if (!empty($view_user['cont_sms'])) { ?><div class="vcenter-ico"><img src="/static/img/mini/sms.png" class="imgicn" data-toggle="tooltip" data-placement="left" title="SMS" /> <?php echo htmlspecialchars($view_user['cont_sms']); ?></div><br /><?php } ?>
<br />
<?php } ?>

<div class="icon_line">
<i class="fa fa-align-justify"></i>
<div class="nowrap title_line">Дополнительно</div>
<div class="line"></div>
</div>
<div class="vcenter-ico">Написать <a href="/cabinet/messages/<?php echo $view_user['log']; ?>" target="_blank">личное сообщение</a></div>


</div>
</div>
</div>

<?php } ?>

</div>

<!-- /Контент -->
<?php include('../inc/bottom_menu.php'); ?>