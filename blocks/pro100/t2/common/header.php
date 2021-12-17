<body>
<div id="l1">
    <div id="l1_menu_admin_can">
        <div id="menu_admin_cl" class="close_btn">X</div>
        <div class="l1_menu_adm_can_line"></div>

        <div class="l1_menu_adm_can_line ac l1_menu_adm_f1_col l1_menu_adm_bor_bot">
            Usver
        </div>


        <div class="l1_menu_adm_can_line l1_menu_adm_bor_bot">
            <span class="l1_menu_adm_can_line_br">Уровень

            </span>
        </div>
        <div class="l1_menu_adm_can_line l1_menu_adm_bor_bot">
            <span class="l1_menu_adm_can_line_br">Визитов: 0</span>
        </div>
        <div class="l1_menu_adm_can_line l1_menu_adm_bor_bot">
            <span class="l1_menu_adm_can_line_br">Баланс: $100</span>
        </div>
        <div class="l1_menu_adm_can_line l1_menu_adm_bor_bot">
            <span class="l1_menu_adm_can_line_br"><?=\incl\pro100\Def\LangLibTemplCab::ARR_CAB_TOP[lib\Def\Opt::$lang]['reflink'];?></span>
        </div>
        <div class="l1_menu_adm_can_line"></div>
        <div class="l1_menu_adm_can_line">
            <a href="#">Профиль</a>
        </div>
        <div class="l1_menu_adm_can_line">
            <a href="/exit">Exit</a>
        </div>
    </div>

    <div id="l1_logo"><a href="/"><img src="/img/logo.png" alt="logo"></a></div>
    <div id="l1_logo_back"></div>

    <!--pc version-->
    <div class="l1_r">
        <div id="menu_admin" class="l1_pc_cell">
            Admin
        </div>
        <script type="text/javascript">
            document.getElementById('menu_admin').onclick=function(){
                document.getElementById('shadow').style.display='block';
                document.getElementById('l1_menu_admin_can').style.display='block';};
            document.getElementById('menu_admin_cl').onclick=function(){
                document.getElementById('shadow').style.display='none';
                document.getElementById('l1_menu_admin_can').style.display='none';}
        </script>

        <div id="l1_ref_link_pc" class="l1_pc_cell" data-ref="<?=\incl\pro100\User\User::$arrDBUser['log'];?>">
            <div class="l1_triangle_pc"></div>
            <div class="l1_triangle_pc_"></div>
            <?=\incl\pro100\Def\LangLibTemplCab::ARR_CAB_TOP[lib\Def\Opt::$lang]['reflink'];?>
            <div class="l1_pc_cell_ext">7</div>
        </div>
        <script type="text/javascript">
            if (navigator.clipboard) {
                // поддержка имеется, включить соответствующую функцию проекта.
                alert(1);
                const textToCopy = 'Hello there!';

                window.navigator.clipboard.writeText(textToCopy).then(() => { alert(`Copied!`) })
                    .catch((error) => { alert(`Copy failed! ${error}`) })

            } else {
                // поддержки нет. Придётся пользоваться execCommand или не включать эту функцию.
                //alert(0);

            }
            document.getElementById("l1_ref_link_pc").onclick=function(){
                /*var copy=document.getElementById("l1_ref_link_pc").dataset.ref;
                alert(copy);*/

                //alert(67);
            }


//https://habr.com/ru/post/256027/
            //https://webdesign.tutsplus.com/ru/tutorials/css-tooltip-magic--cms-28082
            //https://sitehere.ru/ne-slozhnaya-vsplyvayushhaya-podskazka-na-css
        </script>
        <div id="l1_balance_pc" class="l1_pc_cell" >
            <div class="l1_triangle_pc"></div>
            <div class="l1_triangle_pc_"></div>
            <?=\incl\pro100\Def\LangLibTemplCab::ARR_CAB_TOP[lib\Def\Opt::$lang]['balance'].':$'.\incl\pro100\User\User::$arrDBUser['bal'];?>
            <!--допилить!!!!'За весь период работы Ваш заработок составляет $'profit-->
        </div>
        <div id="l1_visit_pc" class="l1_pc_cell">
            <div class="l1_triangle_pc"></div>
            <div class="l1_triangle_pc_"></div>
            <?=\incl\pro100\Def\LangLibTemplCab::ARR_CAB_TOP[lib\Def\Opt::$lang]['visit'].':'.\incl\pro100\User\User::$arrDBUser['hits'];?>
        </div>
        <div id="l1_level_pc" class="l1_pc_cell">
            <div class="l1_triangle_pc"></div>
            <div class="l1_triangle_pc_"></div>
            <?=\incl\pro100\Def\LangLibTemplCab::ARR_CAB_TOP[lib\Def\Opt::$lang]['level'].':'.\incl\pro100\User\User::$arrDBUser['level'];?>
        </div>
    </div>
    <!--mob version dwfce-->
    <div class="dwfse l1_r_mob">

        <div class="dwfse l1_r_mob_">
            <div class="l1_mob_cell">
                <div class="l1_mob_cell_">Уровень: 0</div>
                <div class="l1_mob_cell_">Визитов: 0</div>
            </div>
            <div class="l1_mob_cell">
                <div class="l1_mob_cell_"><?=\incl\pro100\Def\LangLibTemplCab::ARR_CAB_TOP[lib\Def\Opt::$lang]['reflink'];?></div>
                <div class="l1_mob_cell_">Баланс: 100$</div>
            </div>
            <!--
                        <div class="l1_mob_cell">4</div>-->
        </div>
        <div id="l1_mob_burger">
            <div class="l1_mob_burg_line"></div>
            <div class="l1_mob_burg_line"></div>
            <div class="l1_mob_burg_line"></div>
        </div>
    </div>
    <script type="text/javascript">
        document.getElementById('l1_mob_burger').onclick=function(){
            document.getElementById('l1_mob_burger_can').style.display='block';
        };
    </script>
    <div id="l1_mob_burger_can">
        <div id="l1_burger_close">
            <div id="l1_burger_close_btn">X</div>
        </div>
        <script type="text/javascript">
            document.getElementById('l1_burger_close_btn').onclick=function(){
                document.getElementById('l1_mob_burger_can').style.display='none';}
        </script>
        <div id="l1_burger_f1" class="l1_burger_line">
            Usver
        </div>

        <div class="l1_burger_line">
            <a href="#1"><span class="l1_ico_burg">ico</span><span class="l1_link_burg">link</span></a>
        </div>
        <div class="l1_burger_line">
            <a href="#2"><span class="l1_ico_burg">ico</span><span class="l1_link_burg">link</span></a>
        </div>
        <div class="l1_burger_line">
            <a href="#3"><span class="l1_ico_burg">ico</span><span class="l1_link_burg">link</span></a>
        </div>
        <div class="l1_burger_line">
            <a href="#4"><span class="l1_ico_burg">ico</span><span class="l1_link_burg">link</span></a>
        </div>
        <div class="l1_burger_line"></div>
        <div class="l1_burger_line">
            <a href="#4"><span class="l1_ico_burg">ico</span><span class="l1_link_burg">link</span></a>
        </div>
        <div class="l1_burger_line">
            <a href="#4"><span class="l1_ico_burg">ico</span><span class="l1_link_burg">link</span></a>
        </div>
    </div>
    <div class="cl"></div>

</div>