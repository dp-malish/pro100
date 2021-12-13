<?php
include('conf.php');
function now_url($url) {
$now_r = parse_url($_SERVER['REQUEST_URI']);
$now_p = $now_r['path'];
if ($url == '/' && $now_p == '/') { return ' class="c-active"'; }
if (stristr($now_p, $url) && ($url != '/')) {
return ' class="c-active"';
} else { return false; }
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8'>
<meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no'>
<title><?php echo $pname; ?></title>
<meta name="keywords" content="<?php echo $pkey; ?>" />
<meta name="description" content="<?php echo $pdesc; ?>" />
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
<link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:300italic,400italic,700italic,400,300,700&amp;subset=all' rel='stylesheet' type='text/css'>
<link href="/static/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link href="/static/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
<link href="/static/plugins/animate/animate.min.css" rel="stylesheet" type="text/css" />
<link href="/static/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="/static/base/css/plugins.css" rel="stylesheet" type="text/css" />
<link href="/static/base/css/components.css" id="style_components" rel="stylesheet" type="text/css" />
<link href="/static/base/css/themes/blue3.css" rel="stylesheet" id="style_theme" type="text/css" />
<link href="/static/base/css/custom.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/static/base/js/jq.js"></script>
<script src="/static/plugins/jgrowl.min.js"></script>
</head>

<body class="c-layout-header-fixed c-layout-header-mobile-fixed">

<header class="c-layout-header c-layout-header-4 c-layout-header-default-mobile" data-minimize-offset="80">
<div class="c-navbar">
<div class="container">
<div class="c-navbar-wrapper clearfix">
<div class="c-brand c-pull-left">
<a href="/index2.php" class="c-logo">
<img src="/static/img/logo3.gif"  width="50" alt="<?=$Opt::$site;?>" title="<?=$Opt::$site;?>" class="c-desktop-logo">
<img src="/static/img/logo3.gif" width="50" alt="<?=$Opt::$site;?>" title="<?=$Opt::$site;?>" class="c-desktop-logo-inverse">
<img src="/static/img/logo3.gif" width="50" alt="<?=$Opt::$site;?>" title="<?=$Opt::$site;?>" class="c-mobile-logo"> </a>
<button class="c-hor-nav-toggler m-t-20" type="button" data-target=".c-mega-menu">
<span class="c-line"></span>
<span class="c-line"></span>
<span class="c-line"></span>
</button>
</div>

<nav class="c-mega-menu c-pull-right c-mega-menu-dark c-mega-menu-dark-mobile c-fonts-uppercase c-fonts-bold-reset">
<ul class="nav navbar-nav c-theme-nav">
<li<?php echo now_url('/'); ?>>
<a href="/" class="c-link">Главная</a>
</li>
<li<?php echo now_url('/marketing'); ?>>
<a href="/marketing" class="c-link">Маркетинг</a>
</li>
<li<?php echo now_url('/faq'); ?>>
<a  href="/faq" class="c-link">Вопрос-Ответ</a>
</li>
<li<?php echo now_url('/reviews'); ?>>
<a href="/reviews" class="c-link">Отзывы</a> 
</li>
<li><?php echo now_url('/news'); ?>>
<a href="/news" class="c-link">Новости</a> 
</li>
<li<?php echo now_url('/offer'); ?>>
<a href="/offer" class="c-link">Правила</a> 
</li>
<?php if(USER_LOGGED) { ?>
<li>
<a href="/cabinet/" class="btn c-btn c-btn-uppercase c-btn-blue-1 c-btn-square c-btn-header btn-sm">
Личный кабинет</a>
</li>
<li>
<a href="/cabinet/exit" class="btn c-btn c-btn-blue-1 c-btn-uppercase c-btn-border-1x c-btn-square c-btn-header btn-sm">
<i class="icon-power"></i> Выход</a>
</li>
<?php } else { ?>
<li>
<a href="javascript:;" data-toggle="modal" data-target="#signup-form" data-dismiss="modal" class="btn c-btn c-btn-uppercase c-btn-blue-1 c-btn-square c-btn-header btn-sm btn-reg">
Регистрация</a>
</li>
<li>
<a href="javascript:;" data-toggle="modal" data-target="#login-form" class="btn c-btn c-btn-blue-1 c-btn-uppercase c-btn-border-1x c-btn-square c-btn-header btn-sm">
<i class="icon-user"></i> Вход</a>
</li>
<?php } ?>
</ul>
</nav>
</div>
</div>
</div>
</header>