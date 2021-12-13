<?php
$pname = 'Промо материалы';
$pkey = 'промо';
$pdesc = 'Промо материалы';
include('../inc/top_menu.php');
if(!USER_LOGGED) { header ("Location: /"); exit; }
?>
<!-- Контент -->

<div class="row m-t-20 promo">
<div class="col-lg-12">
<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title">Баннер 468 x 60</h3>
</div>
<div class="panel-body center">
<img width="468" height="60" border="0" alt="Проект <?=$Opt::$site;?>" src="<?php echo $Opt::$protocol.SITE; ?>/static/img/promo_1.gif" />
<h4 class="m-t-20">HTML-код для вставки баннера 468 x 60</h4>
<div class="alert alert-info alert-dismissable">
&lt;a href=&quot;<?php echo $Opt::$protocol.SITE; ?>/p/<?php echo $u_login; ?>&quot; target=&quot;_blank&quot;&gt;&lt;img width=&quot;468&quot; height=&quot;60&quot; border=&quot;0&quot; alt=&quot;Проект <?=$Opt::$site;?>&quot; src=&quot;<?php echo $Opt::$protocol.SITE; ?>/static/img/promo_1.gif&quot; /&gt;&lt;/a&gt;
</div>
</div>
</div>
<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title">Баннер 125 x 125</h3>
</div>
<div class="panel-body center">
<img width="125" height="125" border="0" alt="Проект <?=$Opt::$site;?>" src="<?php echo $Opt::$protocol.SITE; ?>/static/img/promo_2.gif" />
<h4 class="m-t-20">HTML-код для вставки баннера 125 x 125</h4>
<div class="alert alert-info alert-dismissable">
&lt;a href=&quot;<?php echo $Opt::$protocol.SITE; ?>/p/<?php echo $u_login; ?>&quot; target=&quot;_blank&quot;&gt;&lt;img width=&quot;125&quot; height=&quot;125&quot; border=&quot;0&quot; alt=&quot;Проект <?=$Opt::$site;?>&quot; src=&quot;<?php echo $Opt::$protocol.SITE; ?>/static/img/promo_2.gif&quot; /&gt;&lt;/a&gt;
</div>
</div>
</div>
<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title">Баннер 728 x 90</h3>
</div>
<div class="panel-body center">
<img width="728" height="90" border="0" alt="Проект <?=$Opt::$site;?>" src="<?php echo $Opt::$protocol.SITE; ?>/static/img/promo_3.gif" />
<h4 class="m-t-20">HTML-код для вставки баннера 728 x 90</h4>
<div class="alert alert-info alert-dismissable">
&lt;a href=&quot;<?php echo $Opt::$protocol.SITE; ?>/p/<?php echo $u_login; ?>&quot; target=&quot;_blank&quot;&gt;&lt;img width=&quot;728&quot; height=&quot;90&quot; border=&quot;0&quot; alt=&quot;Проект <?=$Opt::$site;?>&quot; src=&quot;<?php echo $Opt::$protocol.SITE; ?>/static/img/promo_3.gif&quot; /&gt;&lt;/a&gt;
</div>
</div>
</div>
</div>
</div>

<!-- /Контент -->
<?php include('../inc/bottom_menu.php'); ?>