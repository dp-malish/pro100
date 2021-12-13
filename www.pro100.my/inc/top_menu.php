<?php
//$u_login=\incl\pro100\User\User::$arrDBUser['log'];
include('conf.php');
//если нет аватарки достать её из базы и допилить

?>
<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8'>
<link rel='shortcut icon' href='/favicon.ico'>
<meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no'>
<title><?php echo $pname; ?></title>
<meta name="keywords" content="<?php echo $pkey; ?>" />
<meta name="description" content="<?php echo $pdesc; ?>" />
<link href="/static/cabinet/css/sweetalert.css" rel="stylesheet" type="text/css">
<link href="/static/cabinet/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="/static/cabinet/css/core.css" rel="stylesheet" type="text/css">
<link href="/static/cabinet/css/icons.css" rel="stylesheet" type="text/css">
<link href="/static/cabinet/css/components.css" rel="stylesheet" type="text/css">
<link href="/static/cabinet/css/pages.css" rel="stylesheet" type="text/css">
<link href="/static/cabinet/css/menu.css" rel="stylesheet" type="text/css">
<link href="/static/cabinet/css/responsive.css" rel="stylesheet" type="text/css">
<link href="/static/cabinet/css/simple-line-icons.min.css" rel="stylesheet" type="text/css">
<script src="/static/cabinet/js/jquery.min.js"></script>
<script src="/static/cabinet/js/modernizr.min.js"></script>
</head>

<body class="fixed-left">
<div id="wrapper">

<div class="topbar">
<div class="topbar-left">
<div class="text-center">
<a href="/index2.php" class="logo"><i class="logo-icon"></i> <img title="<?=$Opt::$site;?>" src="/static/img/logo3.gif" width="50"></a>
</div>
</div>
<div class="navbar navbar-default" role="navigation">
<div class="container">
<div class="">
<div class="pull-left">
<button class="button-menu-mobile open-left">
<i class="fa fa-bars"></i>
</button>
<span class="clearfix"></span>
</div>
<ul class="nav navbar-nav top-bar navbar-right pull-right">
<li class="navbar-icons" data-container="body" data-toggle="popover" data-placement="bottom" data-html="true" data-content="<center>Ваш текущий уровень - <?php echo $nowusr['level']; ?>. Чем выше уровень, тем больше заработок.</center>">
<i class="fa fa-star-o"></i> <span class="hide-tablet">Уровень: <?php echo $nowusr['level']; ?></span>
</li>
<li class="navbar-icons" data-container="body" data-toggle="popover" data-placement="bottom" data-html="true" data-content="<center>За весь период по Вашей реферальной ссылке перешло <?php echo $nowusr['hits']; ?> чел.</center>">
<i class="fa fa-bar-chart-o"></i> <span class="hide-tablet">Визитов: <?php echo $nowusr['hits']; ?></span>
</li>
<li class="navbar-icons" data-container="body" data-toggle="popover" data-placement="bottom" data-html="true" data-content="<center>За весь период работы Ваш заработок составляет $<?php echo $nowusr['profit']; ?></center>">
<i class="icon-wallet"></i> <span class="hide-tablet">Баланс: $<?php echo $nowusr['bal']; ?></span>
</li>
<li class="navbar-icons ref-link" data-container="body" data-toggle="popover" data-placement="bottom" data-content="<?php if ($nowusr['level'] > -1) { echo 'https://'.SITE.'/p/'.$u_login; } else { echo 'Доступно после повышения уровня'; } ?>">
<i class="icon-users"></i> <span class="hide-tablet">Рефссылка</span>
</li>
<li class="dropdown top-user">
<a href="" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true"><img src="<?php echo $avz; ?>" alt="user-img" class="img-circle"> <i class="md md-expand-more"></i></a>
<ul class="dropdown-menu">
<li><a href="/cabinet/profile"><i class="md md-account-box"></i> Профиль</a></li>
<li><a href="/cabinet/exit"><i class="md md-settings-power"></i> Выход</a></li>
</ul>
</li>
</ul>
</div>
</div>
</div>
</div>


<div class="left side-menu">
<div class="sidebar-inner slimscrollleft">
<div class="user-details">
<div class="pull-left">
<img src="<?php echo $avz; ?>" alt="" class="thumb-md img-circle">
</div>
<div class="user-info">
<div class="dropdown">
<a href="javascrript://" class="dropdown-toggle"><?php echo $u_login; ?></a>
</div>
<p class="text-muted m-0">Уровень <?php echo $nowusr['level']; ?></p>
</div>
</div>
<div id="sidebar-menu">
<ul>
<li>
<a href="/cabinet/" class="waves-effect waves-light<?php echo now_url('/cabinet/'); ?>"><i class="icon-grid"></i><span> Аккаунт </span></a>
</li>
<li class="has_sub">
<a href="#" class="waves-effect waves-light<?php echo now_url('/cabinet/cashadd'); echo now_url('/cabinet/cashout'); ?>"><i class="icon-credit-card"></i> <span> Баланс </span> <span class="pull-right"><i class="md md-expand-more"></i></span></a>
<ul class="list-unstyled">
<li><a href="/cabinet/cashadd">Пополнить</a></li>
<li><a href="/cabinet/cashout">Вывести</a></li>
</ul>
</li>
<li>
<a href="/cabinet/referrals" class="waves-effect waves-light<?php echo now_url('/cabinet/referrals'); ?>"><i class="icon-users"></i><span> Рефералы </span></a>
</li>
<li>
<a href="/cabinet/up" class="waves-effect waves-light<?php echo now_url('/cabinet/up'); ?>"><i class="icon-arrow-up"></i><span> Повысить уровень </span></a>
</li>
<li>
<a href="/cabinet/messages"  class="waves-effect waves-light<?php echo now_url('/cabinet/messages'); ?>"><i class="icon-speech"></i> <span> Сообщения <?php $new_m = mysqli_num_rows(mysqli_query($connect_db, "SELECT id FROM t_messages WHERE tou='$u_id' AND st = 1")); if ($new_m > 0) { echo "<label class='label label-new'>$new_m</label>"; } ?></span></a>
</li>
<li>
<a href="/cabinet/chat" class="waves-effect waves-light<?php echo now_url('/cabinet/chat'); ?>"><i class="icon-bubbles"></i><span> Чат </span></a>
</li>
<li>
<a href="/cabinet/support"  class="waves-effect waves-light<?php echo now_url('/cabinet/support'); ?>"><i class="icon-call-end"></i> <span> Поддержка <?php $new_s = mysqli_num_rows(mysqli_query($connect_db, "SELECT id FROM t_ticket_name WHERE usr = '$u_id' AND stu = '1'")); if ($new_s > 0) { echo "<label class='label label-new'>$new_s</label>"; } ?></span></a>
</li>
<li>
<a href="/cabinet/promo" class="waves-effect waves-light<?php echo now_url('/cabinet/promo'); ?>"><i class="icon-bulb"></i><span> Промо материалы </span></a>
</li>
<?php if($u_id == $admin_uid) { ?>
<br />
<br />
<li>
<a href="/m_admin/support"  class="waves-effect waves-light<?php echo now_url('/m_admin/support'); ?>"><i class="icon-star"></i> <span> Поддержка <?php $new_sa = mysqli_num_rows(mysqli_query($connect_db, "SELECT id FROM t_ticket_name WHERE sta = '1'")); if ($new_sa > 0) { echo "<label class='label label-new'>$new_sa</label>"; } ?></span></a>
</li>
<li>
<a href="/m_admin/operations" class="waves-effect waves-light<?php echo now_url('/m_admin/operations'); ?>"><i class="icon-star"></i><span> История операций </span></a>
</li>
<li>
<a href="/m_admin/user" class="waves-effect waves-light<?php echo now_url('/m_admin/user'); ?>"><i class="icon-star"></i><span> Пользователи </span></a>
</li>
<li>
<a href="/m_admin/multiuser" class="waves-effect waves-light<?php echo now_url('/m_admin/multiuser'); ?>"><i class="icon-star"></i><span> Мультиаккаунты </span></a>
</li>
<li>
<a href="/m_admin/messages" class="waves-effect waves-light<?php echo now_url('/m_admin/messages'); ?>"><i class="icon-star"></i><span> Личные сообщения </span></a>
</li>
<li>
<a href="/m_admin/reviews" class="waves-effect waves-light<?php echo now_url('/m_admin/reviews'); ?>"><i class="icon-star"></i><span> Отзывы <?php $new_ra = mysqli_num_rows(mysqli_query($connect_db, "SELECT id FROM t_rev WHERE st = '0'")); if ($new_ra > 0) { echo "<label class='label label-new'>$new_ra</label>"; } ?></span></a>
</li>
<li>
<a href="/m_admin/news" class="waves-effect waves-light<?php echo now_url('/m_admin/news'); ?>"><i class="icon-star"></i><span> Новости </span></a>
</li>
<?php } ?>
<br />
<br />
<li>
<a href="/news" class="waves-effect waves-light "><i class="icon-paper-plane"></i><span> Новости </span></a>
</li>
<li>
<a href="/reviews" class="waves-effect waves-light "><i class="icon-like"></i><span> Отзывы </span></a>
</li>
<li>
<a href="/cabinet/exit" class="waves-effect waves-light "><i class="icon-power"></i><span> Выход </span></a>
</li>
</ul>
<div class="clearfix"></div>
</div>
<div class="clearfix"></div>
</div>
</div>
<div class="page-header">
</div>
<div class="content-page">
<div class="content m-t-10">
<div class="container">