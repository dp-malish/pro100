<?php
namespace lib\Def;
use \incl\pro100\User as User;

set_include_path(get_include_path().PATH_SEPARATOR.'../../');spl_autoload_register();
$Opt=new Opt('pro100');//Def opt

User\User::$selfUser=new User\User();
User\User::$selfUser->validPassCookie();


$u_id=User\User::$selfUser::$u_id;

include('../inc/conf.php');

/*$pname = 'Кабинет';
$pkey = 'кабинет';
$pdesc = 'Кабинет пользователя';*/
//include('../inc/top_menu.php');

///***************************************top menu
///
//Ваш текущий уровень - <?php echo $nowusr['level'];
//var_dump(\incl\pro100\User\User::$arrDBUser);

echo 'Ваш текущий уровень -  $nowusr[\'level\'];   -   '.User\User::$arrDBUser['level'].'<br>';

echo 'Визитов: echo $nowusr[\'hits\'];   -   '.User\User::$arrDBUser['hits'].'<br>';

echo 'За весь период работы Ваш заработок составляет $ $nowusr[\'profit\'];   -   '.User\User::$arrDBUser['profit'].'<br>';

echo 'Баланс: $ $nowusr[\'bal\']  -   '.User\User::$arrDBUser['bal'].'<br>';


echo '($nowusr[\'level\'] > -1) { echo \'https://\'.SITE.\'/p/\'.$u_login;}else{echo Доступно после повышения уровня }
Рефссылка -   '.User\User::$arrDBUser['log'].'<br>';

echo '<a href="/cabinet/profile">Профиль</a><br>
<a href="/cabinet/exit">Выход</a><br><br><br>';


echo '<ul>
<li>
<a href="/cabinet/" class="waves-effect waves-light<?php echo now_url(\'/cabinet/\'); ?>"><i class="icon-grid"></i><span> Аккаунт </span></a>
</li>

<li><span> Баланс </span>
<ul class="list-unstyled">
<li><a href="/addcash">Пополнить</a></li>
<li><a href="/cabinet/cashout">Вывести</a></li>
</ul>
</li>

<li>
<a href="/cabinet/referrals"><span> Рефералы </span></a>
</li>

<li>
<a href="/cabinet/up"><span> Повысить уровень </span></a>
</li>

<li>
<a href="/cabinet/messages"><span> Сообщения <?php $new_m = mysqli_num_rows(mysqli_query($connect_db, "SELECT id FROM t_messages WHERE tou=\'$u_id\' AND st = 1")); if ($new_m > 0) { echo "<label class=\'label label-new\'>$new_m</label>"; } ?></span></a>
</li>

<li>
<a href="/cabinet/chat"><span> Чат </span></a>
</li>

<li>
<a href="/cabinet/support"><span> Поддержка <?php $new_s = mysqli_num_rows(mysqli_query($connect_db, "SELECT id FROM t_ticket_name WHERE usr = \'$u_id\' AND stu = \'1\'")); if ($new_s > 0) { echo "<label class=\'label label-new\'>$new_s</label>"; } ?></span></a>
</li>

<li>
<a href="/cabinet/promo"><span> Промо материалы </span></a>
</li>

<br>
<br>
<li> Если ты админ </li>
<br>

<li><a href="/m_admin/support"><span> Поддержка <?php $new_sa = mysqli_num_rows(mysqli_query($connect_db, "SELECT id FROM t_ticket_name WHERE sta = \'1\'")); if ($new_sa > 0) { echo "<label class=\'label label-new\'>$new_sa</label>"; } ?></span></a>
</li>

<li><a href="/m_admin/operations"><span> История операций </span></a></li>

<li>
<a href="/m_admin/user"><span> Пользователи </span></a>
</li>
<li>
<a href="/m_admin/multiuser"><span> Мультиаккаунты </span></a>
</li>
<li>
<a href="/m_admin/messages"><span> Личные сообщения </span></a>
</li>
<li>
<a href="/m_admin/reviews"><span> Отзывы <?php $new_ra = mysqli_num_rows(mysqli_query($connect_db, "SELECT id FROM t_rev WHERE st = \'0\'")); if ($new_ra > 0) { echo "<label class=\'label label-new\'>$new_ra</label>"; } ?></span></a>
</li>
<li>
<a href="/m_admin/news"><span> Новости </span></a>
</li>

<br />
<br />
<li>
<a href="/news"><span> Новости </span></a>
</li>
<li>
<a href="/reviews"><span> Отзывы </span></a>
</li>
<li>
<a href="/cabinet/exit"><span> Выход </span></a>
</li>
</ul>';

///***************************************top menu

//$usri = mysqli_fetch_assoc(mysqli_query($connect_db, "SELECT * FROM t_users WHERE uid = '$u_id'  LIMIT 1"));
//$usri = \incl\pro100\User\User::$arrDBUser; Используют один раз


//$user = mysqli_fetch_assoc(mysqli_query($connect_db, "SELECT * FROM t_users WHERE uid='$u_id' LIMIT 1"));

//следующий уровень
//$next_level = $nowusr['level']+1;
$next_level = User\User::$arrDBUser['level']+1;
echo '<br> next level '.$next_level.'<br>';


//$ref3 = $usri['ref'];
$ref3 = User\User::$arrDBUser['ref'];
echo '<br> # referer integer '.$ref3.'<br>';

//Lvl 1
if ($next_level == 1){
    $ref_pay = User\User::$arrDBUser['ref'];
}
//зачем нужен $ref_pay не понятно
$DB=new SQLi();

//Данные реферера (папа)
//$referer = mysqli_fetch_assoc(mysqli_query($connect_db, "SELECT * FROM t_users WHERE uid='$ref3' LIMIT 1"));

$referer=$DB->strSQL('SELECT * FROM t_users WHERE uid='.$ref3.' LIMIT 1');

//Можно вытянуть данные реферера из массива $referer
echo '<br>
Можно вытянуть данные реферера из массива $referer
<br> # referer integer '.$referer['uid'].'*****'.$referer['log'].'<br>';


$refs_all=0;

//$wu_q = mysqli_query($connect_db, "SELECT uid,log,av,dt FROM t_users WHERE ref='$u_id' AND level > '0'");
$wu_q=$DB->arrSQL('SELECT uid,log,av,dt FROM t_users WHERE ref='.$u_id.' AND level >0');

//Нада проверка вхождения
if ($wu_q){


var_dump($wu_q);

$reflist_1 = '';

/*if (mysqli_num_rows($wu_q) > 0) {
    while($row = mysqli_fetch_assoc($wu_q)) {
        $reflist_1 .= $row['uid'].', ';
        $refs_all++;
    } } $reflist_1 = substr($reflist_1,0,-2);//Отрезать запятую*/
if(!empty($wu_q)){
    foreach ($wu_q as $k =>$val) {
        $reflist_1 .= $val['uid'].', ';
        $refs_all++;
    }
}$reflist_1 = substr($reflist_1,0,-2);//Отрезать запятую

echo '<br>$refs_all - '.$refs_all.'<br>'.'<br>$reflist_1 - '.$reflist_1.'******************************************************<br>';



//$wu_q = mysqli_query($connect_db, "SELECT uid,log,av,dt FROM t_users WHERE ref IN ($reflist_1) AND level > '0'");
$wu_q=$DB->arrSQL('SELECT uid,log,av,dt FROM t_users WHERE ref IN ('.$reflist_1.') AND level >0');

$reflist_2 ='';
/*if (mysqli_num_rows($wu_q) > 0) {
    while($row = mysqli_fetch_assoc($wu_q)) {
        $reflist_2 .= $row['uid'].', ';
        $refs_all++;
    } } $reflist_2 = substr($reflist_2,0,-2);//Отрезать запятую*/

if(!empty($wu_q)){
    foreach ($wu_q as $k =>$val) {
        $reflist_2 .= $val['uid'].', ';
        $refs_all++;
    }
}$reflist_2 = substr($reflist_2,0,-2);//Отрезать запятую

echo '<br>$refs_all - '.$refs_all.'<br>'.'<br>$reflist_2 - '.$reflist_2.'******************************************************<br>';

//$wu_q = mysqli_query($connect_db, "SELECT uid,log,av,dt FROM t_users WHERE ref IN ($reflist_2) AND level > '0'");
$wu_q=$DB->arrSQL('SELECT uid,log,av,dt FROM t_users WHERE ref IN ('.$reflist_2.') AND level >0');
$reflist_3 = '';
/*if (mysqli_num_rows($wu_q) > 0) {
    while($row = mysqli_fetch_assoc($wu_q)) {
        $reflist_3 .= $row['uid'].', ';
        $refs_all++;
    } } $reflist_3 = substr($reflist_3,0,-2);//Отрезать запятую*/

if(!empty($wu_q)){
    foreach ($wu_q as $k =>$val) {
        $reflist_3 .= $val['uid'].', ';
        $refs_all++;
    }
}$reflist_3 = substr($reflist_3,0,-2);//Отрезать запятую

echo '<br>$refs_all - '.$refs_all.'<br>'.'<br>$reflist_3 - '.$reflist_3.'******************************************************<br>';




//$wu_q = mysqli_query($connect_db, "SELECT uid,log,av,dt FROM t_users WHERE ref IN ($reflist_3) AND level > '0'");
$wu_q=$DB->arrSQL('SELECT uid,log,av,dt FROM t_users WHERE ref IN ('.$reflist_3.') AND level >0');

$reflist_4 = '';

/*if (mysqli_num_rows($wu_q) > 0) {
    while($row = mysqli_fetch_assoc($wu_q)) {
        $reflist_4 .= $row['uid'].', ';
        $refs_all++;
    } } $reflist_4 = substr($reflist_4,0,-2);//Отрезать запятую*/
if(!empty($wu_q)){
    foreach ($wu_q as $k =>$val) {
        $reflist_4 .= $val['uid'].', ';
        $refs_all++;
    }
}$reflist_4 = substr($reflist_4,0,-2);//Отрезать запятую

echo '<br>$refs_all - '.$refs_all.'<br>'.'<br>$reflist_4 - '.$reflist_4.'******************************************************<br>';


//$wu_q = mysqli_query($connect_db, "SELECT uid,log,av,dt FROM t_users WHERE ref IN ($reflist_4) AND level > '0'");
$wu_q=$DB->arrSQL('SELECT uid,log,av,dt FROM t_users WHERE ref IN ('.$reflist_4.') AND level >0');

/*if(mysqli_num_rows($wu_q) > 0) {
    while($row = mysqli_fetch_assoc($wu_q)) {
        $refs_all++;
    } }*/
if(!empty($wu_q)){
    foreach ($wu_q as $k =>$val){
        $refs_all++;
    }
}
echo '<br>$refs_all - '.$refs_all.'<br>******************************************************<br>';
}

//Шаги обучалки
if(User\User::$arrDBUser['step']<6){
    if(User\User::$arrDBUser['step']==0){
        echo 'Здравствуйте! Приветствуем Вас на проекте '.$Opt::$site.'. Я помогу Вам разобраться с системой, в этом нет ничего сложного.';
    }elseif(User\User::$arrDBUser['step']==1){
        echo '<b>Шаг 1.</b> Заполните в профиле контактные и платёжные данные. Это нужно, чтобы Ваши партнёры могли связаться с Вами. <a class="alert-link" href="/cabinet/profile">Заполнить</a>';
    }elseif(User\User::$arrDBUser['step']==2){
        echo '<b>Шаг 2.</b> Перейдите на страницу Пополнить, затем Повысить уровень и система переведёт сумму (соответствующую стоимости покупаемого уровня) Вашему куратору данного уровня. <a class="alert-link" href="/cabinet/up">Перейти</a>';
    }elseif(User\User::$arrDBUser['step']==3){
        echo '<b>Шаг 3.</b> После перевода уровень будет повышен автоматически.';
    }elseif(User\User::$arrDBUser['step']==4){
        echo '<b>Шаг 4.</b> Теперь Вы можете приглашать партнёров по своей реферальной ссылке и получать денежные подарки.';
    }elseif(User\User::$arrDBUser['step']==4){
        echo 'Вы освоились на проекте и поняли принцип работы. Приглашайте партнёров, заполняйте линии и не забывайте вовремя повышать свой уровень. Удачной работы!';
    }
}

echo '<br><br>Тут кнопка обучалки<button class="btn btn-info waves-effect waves-light" id="btn_next">Дальше</button><br>';

?>
    <!-- Контент -->

<br><br><br>
            <script type='text/javascript'>
                $(function() {
                    $('#btn_next').click(function(){
                        $.ajax({
                            type: 'POST',
                            url: '/actions/step_next.php',
                            data: {'token': '<?php echo '$token'; ?>'},
                            cache: false,
                            success: function(result){
                                if (result == '1') {
                                    $(location).attr('href','/cabinet/');
                                }
                                if (result == '3') {
                                    $.jGrowl('Ошибка', { theme: 'growl-error' });
                                }
                            }
                        });
                    });
                });
            </script>

    <div class="panel-heading">
        <h3 class="panel-title">Информация об аккаунте</h3>
    </div>
    <div class="col-sm-12 col-md-3 col-lg-2">
        Реализовать показ аватареи <img src="/static/avatars/1552856589_464.png" alt="">
    </div>

    <div class="vcenter-ico">Уровень: <?=User\User::$arrDBUser['level'];?></div>



    <br /><div class="vcenter-ico">Имя: <?php echo User\User::$arrDBUser['prf_name']; ?></div>

    <br /><div class="vcenter-ico">Фамилия: <?php echo User\User::$arrDBUser['prf_fam']; ?></div>


                    <br /><br />
   <div class="nowrap title_line">Контактные данные</div>
    <br /><br />

<?php if (empty(User\User::$arrDBUser['cont_vk']) && empty(User\User::$arrDBUser['cont_ok']) && empty(User\User::$arrDBUser['cont_fb']) && empty(User\User::$arrDBUser['cont_wa']) && empty(User\User::$arrDBUser['cont_vi']) && empty(User\User::$arrDBUser['cont_sk']) && empty(User\User::$arrDBUser['cont_te']) && empty(User\User::$arrDBUser['cont_icq']) && empty(User\User::$arrDBUser['cont_sms'])) { ?>
 <div>
     Контактные данные не указаны. <a class="alert-link" href="/cabinet/profile">Указать</a>
                        </div>
                    <?php } else { ?>
<?php if (!empty(User\User::$arrDBUser['cont_vk'])) { ?><div class="vcenter-ico"><img src="/static/img/mini/vk.png" class="imgicn" data-toggle="tooltip" data-placement="left" title="Вконтакте" /> <?php echo htmlspecialchars(User\User::$arrDBUser['cont_vk']); ?></div><br /><?php } ?>
<?php if(!empty(User\User::$arrDBUser['cont_ok'])){?><div class="vcenter-ico">
        <img src="/static/img/mini/ok.png" title="Одноклассники" />
<?php echo htmlspecialchars(User\User::$arrDBUser['cont_ok']); ?></div><br /><?php } ?>
<?php if (!empty(User\User::$arrDBUser['cont_fb'])) { ?><div class="vcenter-ico"><img src="/static/img/mini/fb.png" class="imgicn" data-toggle="tooltip" data-placement="left" title="Facebook" />
        <?php echo htmlspecialchars(User\User::$arrDBUser['cont_fb']); ?></div><br /><?php } ?>
<?php if (!empty(User\User::$arrDBUser['cont_wa'])) { ?><div class="vcenter-ico"><img src="/static/img/mini/wa.png" class="imgicn" data-toggle="tooltip" data-placement="left" title="WhatsApp" /> <?php echo htmlspecialchars(User\User::$arrDBUser['cont_wa']); ?></div><br /><?php } ?>
<?php if (!empty(User\User::$arrDBUser['cont_vi'])) { ?><div class="vcenter-ico"><img src="/static/img/mini/viber.png" class="imgicn" data-toggle="tooltip" data-placement="left" title="Viber" /> <?php echo htmlspecialchars(User\User::$arrDBUser['cont_vi']); ?></div><br /><?php } ?>
<?php if (!empty(User\User::$arrDBUser['cont_sk'])) { ?><div class="vcenter-ico"><img src="/static/img/mini/sk.png" class="imgicn" data-toggle="tooltip" data-placement="left" title="Skype" /> <?php echo htmlspecialchars(User\User::$arrDBUser['cont_sk']); ?></div><br /><?php } ?>
<?php if (!empty(User\User::$arrDBUser['cont_te'])) { ?><div class="vcenter-ico"><img src="/static/img/mini/tg.png" class="imgicn" data-toggle="tooltip" data-placement="left" title="Telegram" /> <?php echo htmlspecialchars(User\User::$arrDBUser['cont_te']); ?></div><br /><?php } ?>
<?php if (!empty(User\User::$arrDBUser['cont_icq'])) { ?><div class="vcenter-ico"><img src="/static/img/mini/icq.png" class="imgicn" data-toggle="tooltip" data-placement="left" title="ICQ" /> <?php echo htmlspecialchars(User\User::$arrDBUser['cont_icq']); ?></div><br /><?php } ?>
 <?php if (!empty(User\User::$arrDBUser['cont_sms'])) { ?><div class="vcenter-ico"><img src="/static/img/mini/sms.png" class="imgicn" data-toggle="tooltip" data-placement="left" title="SMS" /> <?php echo htmlspecialchars(User\User::$arrDBUser['cont_sms']); ?></div><br /><?php } ?>
                        <br />
<?php } ?>

                    <div class="icon_line">
                        <i class="fa fa-credit-card"></i>
                        <div class="nowrap title_line">Платёжные данные</div>
                        <div class="line"></div>
                    </div>
                    <?php if (empty(User\User::$arrDBUser['pay_payeer']) && empty(User\User::$arrDBUser['pay_pm'])) { ?>
                        <div class="alert alert-info alert-dismissable p-l-40">
                            <i class="md md-info"></i> Платёжные данные не указаны. <a class="alert-link" href="/cabinet/profile">Указать</a>
                        </div>
                    <?php } else { ?>
                        <?php if (!empty(User\User::$arrDBUser['pay_pm'])) { ?><div class="vcenter-ico"><img src="/static/img/mini/pay_pm.png" class="imgicn" data-toggle="tooltip" data-placement="left" title="Payeer" /> <?php echo htmlspecialchars(User\User::$arrDBUser['pay_pm']); ?></div><br /><?php } ?>
                        <br />
                    <?php } ?>

                    <div class="icon_line">
                        <i class="fa fa-bar-chart"></i>
                        <div class="nowrap title_line">Результаты работы</div>
                        <div class="line"></div>
                    </div>
                    <div class="vcenter-ico">Команда: <?php echo $refs_all; ?> чел.</div><br />
                    <div class="vcenter-ico">Доход: <?php echo User\User::$arrDBUser['profit']; ?> $.</div>

                </div>
            </div>
        </div>
    </div>



    <div class="p-block__content">

        <div class="p-amount">

            <!--повышение уровня-->

            <?php
            //временно отключить
            if (User\User::$arrDBUser['level'] >= 4) { echo ''; } else { $next_level = User\User::$arrDBUser['level']+1;
            ?>

                <BR>+++++++++++++++++++++<BR>
    <input value="<?php echo $next_level; ?>"  id="level_u" />
                <BR><BR>$levels ИЗ файла конфиг<BR>
    <input value="<?php echo $levels[$next_level]; ?>"  id="level_u" />
                <BR><BR>

                <script>
                    $(document).ready(function(){ // функция будет выполнена при полной загрузке страницы
                        setTimeout(function(){ // если нужно устанавливаем задержку выполнения действия
                            $('#batch_send').click(); // имитируем нажатие кнопкой мишы на блок
                        },2000); // время задержки в милисикундах
                    });
                </script>

<div>
    Должна быть кнопка переактивации...
</div>
<div><button id="batch_send" data-loading-text="Ожидайте...">Активировать</button></div>



            <?php }
            ?>
            <script type='text/javascript'>
                $(function() {
                    var btn_send = $('#batch_send');
                    btn_send.click(function(){
                        btn_send.button('loading');
                        $.ajax({
                            type: 'POST',
                            url: '/actions/send_batch.php',
                            data: {'token': '<?php echo '$token'; ?>'},
                            cache: false,
                            success: function(result){
                                btn_send.button('reset');
                                if (result == '0') {
                                    $.jGrowl('На балансе аккаунта недостаточно средств', { theme: 'growl-error' });
                                }
                                if (result == '1') {
                                    $(location).attr('href','/cabinet');
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
        </div><!--p-amount-->
    </div><!--p-block__content-->
    </div><!--p-block-->



        <!-- /Контент -->
<?php
//include('../inc/bottom_menu.php');