<?php
$pname = 'Скрипт млм Пирамиды с переливами';
$pkey = 'инвестиции, прибыль, работа, заработок, кэш, cash, деньги, профит, обмен деньгами';
$pdesc = 'Скрипт млм Пирамиды с переливами';
include('inc/conf.php');
?><!doctype html>
<html lang="ru">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="copyright" lang="ru" content="Win">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index,follow">
    <link rel="shortcut icon" href="/img/ico.png" type="image/png">
    <!--<script async src="/js/scroll.php"></script>
    <script async src="/js/common.php?v2"></script>
    <script async src="/js/config.php"></script>

    <link rel="stylesheet" type="text/css" href="/css.php?v=0"> -->
    <link rel="stylesheet" type="text/css" href="/css/def.css">
    <link rel="stylesheet" type="text/css" href="/css/common.css">
    <link rel="stylesheet" type="text/css" href="/css/top_menu.css">
    <link rel="stylesheet" type="text/css" href="/css/block_1.css?t=1">


    <link rel="stylesheet" type="text/css" href="/css/footer.css">

    <link rel="stylesheet" type="text/css" href="/css/form_modal.css">


    <meta name="description" content="Хотите создать сайт">


    <!--Подключаем библиотеку-->
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>-->
    <script src="/j/lib/m_jq.js"></script>

    <!--<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/jquery-jgrowl/1.4.8/jquery.jgrowl.min.css" />-->
    <link rel="stylesheet" type="text/css" href="/css/all_jGrowl.css" />
    <!--<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-jgrowl/1.4.8/jquery.jgrowl.min.js"></script>-->
    <script src="/j/lib/all_jGrowl.js"></script>


    <title>Создать сайт</title>
</head>
<body>


<div id="top_menu">
    <div class="maxw">
        <div id="logo">
            <a href="/"><img src="img/logo.png" alt="Logo"></a>
        </div>

        <!--Верхнее меню -->
        <div class="top_menu">
            <nav class="top_menu_nav">
                <ul>
                    <li><a href="/">ГЛАВНАЯ</a></li>
                    <li><a href="/marketing">МАРКЕТИНГ</a></li>
                    <li><a href="/news">НОВОСТИ</a></li>
                    <li><a href="/offer">ПРАВИЛА</a></li>
                    <li><a href="/faq">FAQ</a></li>
                </ul>
            </nav>
        </div>
        <!--/Верхнее меню -->

        <!--Login/Reg-->
        <div class="block_login">
            <?php if(USER_LOGGED) { ?>
            <div id="cabinet_btn" class="block_login_in">Кабинет</div>
            <div id="exit_btn" class="block_login_in">Выход</div>
                <script type="text/javascript">
                    $(document).ready(function() {
                        document.getElementById('cabinet_btn').onclick = function () {
                            location.href = "cabinet_/";
                        }
                        document.getElementById('exit_btn').onclick = function () {
                            location.href = "cabinet_/exit";
                        };
                    });
                </script>
            <?php }else{ ?>
            <div id="registration_btn" class="block_login_in">Регистрация</div>
            <div id="login_btn" class="block_login_in">Вход</div>
                <script src="/j/m_login.js"></script>
            <?php } ?>

                <!--
                <script type="text/javascript">
                    document.getElementById('registration_btn').onclick=function(){registrationBtn();}
                    document.getElementById('login_btn').onclick=function(){loginBtn();};
                </script>-->

        </div>
        <!--/Login/Reg-->

        <div class="google_lang">
            <!-- GTranslate: https://gtranslate.io/ -->
            <a href="#" onclick="doGTranslate('ru|en');return false;" title="English" class="gflag nturl" style="background-position:-0px -0px;"><img src="//gtranslate.net/flags/blank.png" height="16" width="16" alt="English" /></a><a href="#" onclick="doGTranslate('ru|fr');return false;" title="French" class="gflag nturl" style="background-position:-200px -100px;"><img src="//gtranslate.net/flags/blank.png" height="16" width="16" alt="French" /></a><a href="#" onclick="doGTranslate('ru|de');return false;" title="German" class="gflag nturl" style="background-position:-300px -100px;"><img src="//gtranslate.net/flags/blank.png" height="16" width="16" alt="German" /></a><a href="#" onclick="doGTranslate('ru|it');return false;" title="Italian" class="gflag nturl" style="background-position:-600px -100px;"><img src="//gtranslate.net/flags/blank.png" height="16" width="16" alt="Italian" /></a><a href="#" onclick="doGTranslate('ru|pt');return false;" title="Portuguese" class="gflag nturl" style="background-position:-300px -200px;"><img src="//gtranslate.net/flags/blank.png" height="16" width="16" alt="Portuguese" /></a><a href="#" onclick="doGTranslate('ru|ru');return false;" title="Russian" class="gflag nturl" style="background-position:-500px -200px;"><img src="//gtranslate.net/flags/blank.png" height="16" width="16" alt="Russian" /></a><a href="#" onclick="doGTranslate('ru|es');return false;" title="Spanish" class="gflag nturl" style="background-position:-600px -200px;"><img src="//gtranslate.net/flags/blank.png" height="16" width="16" alt="Spanish" /></a>

            <style type="text/css">
                <!--
                a.gflag {vertical-align:middle;font-size:16px;padding:1px 0;background-repeat:no-repeat;background-image:url(//gtranslate.net/flags/16.png);}
                a.gflag img {border:0;}
                a.gflag:hover {background-image:url(//gtranslate.net/flags/16a.png);}
                #goog-gt-tt {display:none !important;}
                .goog-te-banner-frame {display:none !important;}
                .goog-te-menu-value:hover {text-decoration:none !important;}
                body {top:0 !important;}
                #google_translate_element2 {display:none!important;}
                -->


            </style>
            <div>
                <div></div>
                <div>
                    <select onchange="doGTranslate(this);"><option value="">Select Language</option><option value="ru|af">Afrikaans</option><option value="ru|sq">Albanian</option><option value="ru|ar">Arabic</option><option value="ru|hy">Armenian</option><option value="ru|az">Azerbaijani</option><option value="ru|eu">Basque</option><option value="ru|be">Belarusian</option><option value="ru|bg">Bulgarian</option><option value="ru|ca">Catalan</option><option value="ru|zh-CN">Chinese (Simplified)</option><option value="ru|zh-TW">Chinese (Traditional)</option><option value="ru|hr">Croatian</option><option value="ru|cs">Czech</option><option value="ru|da">Danish</option><option value="ru|nl">Dutch</option><option value="ru|en">English</option><option value="ru|et">Estonian</option><option value="ru|tl">Filipino</option><option value="ru|fi">Finnish</option><option value="ru|fr">French</option><option value="ru|gl">Galician</option><option value="ru|ka">Georgian</option><option value="ru|de">German</option><option value="ru|el">Greek</option><option value="ru|ht">Haitian Creole</option><option value="ru|iw">Hebrew</option><option value="ru|hi">Hindi</option><option value="ru|hu">Hungarian</option><option value="ru|is">Icelandic</option><option value="ru|id">Indonesian</option><option value="ru|ga">Irish</option><option value="ru|it">Italian</option><option value="ru|ja">Japanese</option><option value="ru|ko">Korean</option><option value="ru|lv">Latvian</option><option value="ru|lt">Lithuanian</option><option value="ru|mk">Macedonian</option><option value="ru|ms">Malay</option><option value="ru|mt">Maltese</option><option value="ru|no">Norwegian</option><option value="ru|fa">Persian</option><option value="ru|pl">Polish</option><option value="ru|pt">Portuguese</option><option value="ru|ro">Romanian</option><option value="ru|ru">Russian</option><option value="ru|sr">Serbian</option><option value="ru|sk">Slovak</option><option value="ru|sl">Slovenian</option><option value="ru|es">Spanish</option><option value="ru|sw">Swahili</option><option value="ru|sv">Swedish</option><option value="ru|th">Thai</option><option value="ru|tr">Turkish</option><option value="ru|uk">Ukrainian</option><option value="ru|ur">Urdu</option><option value="ru|vi">Vietnamese</option><option value="ru|cy">Welsh</option><option value="ru|yi">Yiddish</option></select><div id="google_translate_element2"></div>
                    <script type="text/javascript">
                        function googleTranslateElementInit2() {new google.translate.TranslateElement({pageLanguage: 'ru',autoDisplay: false}, 'google_translate_element2');}
                    </script><script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit2"></script>
                </div>
                <div></div>
            </div>
            <script type="text/javascript">
                /* <![CDATA[ */
                eval(function(p,a,c,k,e,r){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('6 7(a,b){n{4(2.9){3 c=2.9("o");c.p(b,f,f);a.q(c)}g{3 c=2.r();a.s(\'t\'+b,c)}}u(e){}}6 h(a){4(a.8)a=a.8;4(a==\'\')v;3 b=a.w(\'|\')[1];3 c;3 d=2.x(\'y\');z(3 i=0;i<d.5;i++)4(d[i].A==\'B-C-D\')c=d[i];4(2.j(\'k\')==E||2.j(\'k\').l.5==0||c.5==0||c.l.5==0){F(6(){h(a)},G)}g{c.8=b;7(c,\'m\');7(c,\'m\')}}',43,43,'||document|var|if|length|function|GTranslateFireEvent|value|createEvent||||||true|else|doGTranslate||getElementById|google_translate_element2|innerHTML|change|try|HTMLEvents|initEvent|dispatchEvent|createEventObject|fireEvent|on|catch|return|split|getElementsByTagName|select|for|className|goog|te|combo|null|setTimeout|500'.split('|'),0,{}))
                /* ]]> */
            </script>


        </div>

        <!--Бургер меню-->
        <div class="burger-menu">
            <a href="" class="burger-menu_button">
                <spun class="burger-menu_lines"></spun>
            </a>
            <nav class="burger-menu_nav">
                <a href="#section-1" class="burger-menu_link">Главная</a>
                <a href="#section-2" class="burger-menu_link">Секция 2</a>
                <a href="#section-3" class="burger-menu_link">Секция 3</a>
                <a href="#section-4" class="burger-menu_link">Секция 4</a>
                <a href="#section-5" class="burger-menu_link">Секция 5</a>
            </nav>

            <div class="burger-menu_overlay"></div>
        </div>

<script type="text/javascript">
    function burgerMenu(selector) {
        let menu = $(selector);
        let button = menu.find('.burger-menu_button', '.burger-menu_lines');
        let links = menu.find('.burger-menu_link');
        let overlay = menu.find('.burger-menu_overlay');

        button.on('click', (e) => {
            e.preventDefault();
            toggleMenu();
        });
        links.on('click', () => toggleMenu());
        overlay.on('click', () => toggleMenu());
        function toggleMenu(){
            menu.toggleClass('burger-menu_active');
            if (menu.hasClass('burger-menu_active')){
                $('body').css('overlow', 'hidden');
            } else {
                $('body').css('overlow', 'visible');
            }
        }
    }
    burgerMenu('.burger-menu');
</script>
        <!--/Бургер меню-->

        <div class="cl"></div>
    </div>
</div>


<!----------------------------------------------------------------------------->
<!----------------------------------------------------------------------------->
<!----------------------------------------------------------------------------->
<div id="block_1" class="rel">
    <div id="block_1_back"></div>
    <div id="block_1_main" class="rel">
        <div id="under_top_menu"></div>
        <div class="maxw rel">
                <div class="block_1_cont">
                    <section>
                    <h1>СОЦИАЛЬНАЯ СЕТЬ ФИНАНСОВОЙ ВЗАИМОПОМОЩИ</h1><br>
                    <h2>ДОХОД СВЫШЕ 450 000 USD<br>ЭТО ГАРАНТИРОВАННО С НАШЕЙ СИСТЕМОЙ ЗАРАБОТКА</h2>
                    <div class="block_1_btn">
                        <?php if(USER_LOGGED) { ?>
                        <button id="cabinet_btn_block_1">Кабинет</button>
                        <button id="exit_btn_block_1">Выход</button>
                        <script type="text/javascript">

                                document.getElementById('cabinet_btn_block_1').onclick = function () {
                                    location.href = "cabinet_/";
                                };
                                document.getElementById('exit_btn_block_1').onclick = function () {
                                    location.href = "cabinet_/exit";
                                };
                        </script>
                        <?php }else{ ?>
                            <button id="registration_btn_block_1"> Регистрация </button>
                            <button id="login_btn_block_1"> Вход </button>
                            <script type="text/javascript">
                                $(document).ready(function(){
                                    //$('#registration_btn_block_1').click(function(){registrationBtn();});
                                    document.getElementById('registration_btn_block_1').onclick = function(){                             registrationBtn();};
                                    document.getElementById('login_btn_block_1').onclick = function () {
                                        loginBtn();
                                    };
                                });
                            </script>

                        <?php } ?>
                    </div>
                    </section>
                </div>
        </div>
    </div>
    <div class="cl"></div><a href="#section-1" class="arrow_down"></a>
</div>
<!----------------------------------------------------------------------------->
<!----------------------------------------------------------------------------->
<!----------------------------------------------------------------------------->



<section id="section-1">Секция 1</section><br><br><br><br><br><br>45
<!--<a href="javascript:void(0);" onclick="$.jGrowl('Я пример', {параметры через запятую});">Пример</a>
<a href="javascript:void(0);" onclick="$.jGrowl('Я пример', {sticky: true,life:2000});">Пример!!!!!</a>
-->

<div class="form_row">
    <a href="javascript:void(0);" onclick="$.jGrowl('Я пример', {sticky: true,life:2000});">Пример!!!!!</a>
</div>

<a href="/cabinet/">Кабинет</a>

<!----------------------------------------------------------------------------->
<!----------------------------------------------------------------------------->
<!----------------------------------------------------------------------------->
<div id="foot">
    <footer>
        <div class="foot_right">
            <p class="note">&copy; Bсe пpaвa 3aщищeны!. &nbsp;&nbsp;&nbsp; 2021 <?=$_SERVER['SERVER_NAME'];?> |  <a href="/offer">Публичная оферта</a></p>
        </div>
        <div id="up"> ^ Наверх</div>
    </footer>
</div>


<!--------------------Форма входа------------------->
<!--------------------Форма входа------------------->
<!--------------------Форма входа------------------->
<div id="shadowForm" class="shadow"></div>
<div id="formLogin" class="form">
    <div class="form_header">
        <span id="closeFormLogin" class="close"></span>
        <h3>ВХОД</h3>
    </div>
    <div class="form_label">
        <span>Логин</span>
    </div>
    <div class="form_row">
        <input type="text" id="log_login" placeholder="Ваш логин">
    </div>
    <div class="form_label">
        <span>Пароль</span>
    </div>
    <div class="form_row">
        <input type="password" id="log_password" placeholder="Ваш пароль">
    </div>
    <div class="form_row rel">
        <div id="formLoginBtn" class="form_login_in">Вход</div>
        <div id="rememberPassBtn" class="form_remember link">Забыли пароль?</div>
    </div>
    <div class="form_row rel ac">
        <span id="formLoginLinkToReg" class="form_link_center link">Зарегистрироваться</span>
    </div>
</div>
<!--------------------Форма регистрации------------------->
<!--------------------Форма регистрации------------------->
<!--------------------Форма регистрации------------------->

<div id="formReg" class="form">
    <div class="form_header">
        <span id="closeFormReg" class="close"></span>
        <h3>РЕГИСТРАЦИЯ</h3>
    </div>
    <div class="form_label">
        <span>Логин</span>
    </div>
    <div class="form_row">
        <input type="text" id="reg_login" placeholder="Введите логин">
    </div>
    <div class="form_label">
        <span>E-mail</span>
    </div>
    <div class="form_row">
        <input type="email" id="reg_email" placeholder="Введите e-mail">
    </div>
    <div class="form_label">
        <span>Пароль</span>
    </div>
    <div class="form_row">
        <input type="text" id="reg_pass" placeholder="Введите пароль">
    </div>
    <div class="form_row rel">
        <input type="checkbox" id="formRegCheck">
        <label for="formRegCheck">
            <span class="check_box_reg"><a target="_blank" href="/offer">Принимаю условия Соглашения</a></span>
        </label>

    </div>
    <div class="form_row rel">
        <div id="formRegBtn" class="form_login_reg">Регистрация</div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#lost_btn').click(function(){
            var mail = $('#lost_email').val();
            $.ajax({
                type: 'POST',
                url: '/actions/lost.php',
                data: {'mail': mail, 'token': '<?php echo $token; ?>'},
                cache: false,
                success: function(result){
                    if (result == '0') {
                        $.jGrowl('Данный E-mail не зарегистрирован', { theme: 'growl-error' });
                    }
                    if (result == '1') {
                        $.jGrowl('Инструкция отправлена на E-mail', { theme: 'growl-success' }); $('#lost_email').val('');
                    }
                    if (result == '2') {
                        $.jGrowl('Вы не ввели E-mail', { theme: 'growl-error' });
                    }
                    if (result == '3') {
                        $.jGrowl('Ошибка', { theme: 'growl-error' });
                    }
                    if (result == '4') {
                        $.jGrowl('Неверный формат E-mail', { theme: 'growl-error' });
                    }
                }
            });
        });

        $('#formLoginBtn').click(function(){
            var login = $('#log_login').val();
            var pass = $('#log_password').val();
            $.ajax({
                type: 'POST',
                url: '/actions/log.php',
                data: {'login': login, 'pass': pass, 'token': '<?php echo $token; ?>'},
                cache: false,
                success: function(result){
                    if (result == '0') {
                        $.jGrowl('Неверный логин или пароль', { theme: 'growl-error' });
                    }
                    if (result == '1') {
                        $(location).attr('href','/cabinet/');
                    }
                    if (result == '2') {//Забанен сделать редирект
                        $.jGrowl('Попробуйте войти позднее', { theme: 'growl-error' });
                    }
                    if (result == '3') {
                        $.jGrowl('Не введён логин или пароль', { theme: 'growl-error' });
                    }
                    if (result == '4') {
                        $.jGrowl('Вы уже вошли', { theme: 'growl-error' });
                    }
                }
            });
        });

        $('#formRegBtn').click(function(){
            var oferta = $('#formRegCheck').prop('checked');
            var login = $('#reg_login').val();
            var pass = $('#reg_pass').val();
            var mail = $('#reg_email').val();
            $.ajax({
                type: 'POST',
                url: '/actions/reg.php',
                data: {'oferta': oferta, 'login': login, 'pass': pass, 'mail': mail, 'token': '<?php echo $token; ?>'},
                cache: false,
                success: function(result){
                    if (result == 'live_user') {
                        $.jGrowl('Сессия пользователя не закончена. Повторите попытку...', { theme: 'growl-error' });
                    }
                    if (result == 'offer') {
                        $.jGrowl('Вы не согласились с правилами', { theme: 'growl-error' });
                    }
                    if (result == 'regged') {
                        $.jGrowl('Данный логин уже зарегистрирован', { theme: 'growl-error' });
                    }
                    if (result == 'lsmall') {
                        $.jGrowl('Логин меньше 8-ми символов', { theme: 'growl-error' });
                    }
                    if (result == 'nologin') {
                        $.jGrowl('Логин должен состоять из латинских букв и цифр', { theme: 'growl-error' });
                    }
                    if (result == 'psmall') {
                        $.jGrowl('Пароль меньше 8-х символов', { theme: 'growl-error' });
                    }
                    if (result == 'nopass') {
                        $.jGrowl('Пароль должен состоять из латинских букв и цифр', { theme: 'growl-error' });
                    }
                    if (result == 'mail') {
                        $.jGrowl('Введён неверный E-mail', { theme: 'growl-error' });
                    }
                    if (result == 'usrmail') {
                        $.jGrowl('Данный E-mail уже используется другим пользователем', { theme: 'growl-error' });
                    }




                    if (result == 'error') {
                        $.jGrowl('Неизвестная ошибка', { theme: 'growl-error' });
                    }
                    if (result == '1') {
                        $.jGrowl('Успешно', { theme: 'growl-success' });
                        $.ajax({
                            type: 'POST',
                            url: '/actions/log.php',
                            data: {'login': login, 'pass': pass, 'token': '<?php echo $token; ?>'},
                            cache: false,
                            success: function(result){
                                if (result == '0') {
                                    $.jGrowl('Войти автоматически не удалось. Попробуйте войти на странице авторизации', { theme: 'growl-error' });
                                }
                                if (result == '1') {
                                    $(location).attr('href','/cabinet/');
                                }
                                if (result == '2') {
                                    $.jGrowl('Попробуйте войти позднее', { theme: 'growl-error' });
                                }
                                if (result == '3') {
                                    $.jGrowl('Войти автоматически не удалось. Попробуйте войти на странице авторизации', { theme: 'growl-error' });
                                }
                                if (result == '4') {
                                    $.jGrowl('Вы уже вошли', { theme: 'growl-error' });
                                }
                            }
                        });
                    }
                }
            });
            return false;
        });
    });
</script>



</body>
</html>