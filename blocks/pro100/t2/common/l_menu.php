<div id="m_body" class="rel">
    <div id="l_col">
        <div id="lc_menu">
            <div class="lc_menu_line"></div>
            <div class="lc_menu_line">
                <a href="/cabinet/"><div class="lc_menu_ico i_cab"></div>
                    <div class="lc_menu_link_t<?=(empty(\lib\Def\Route::$uri_parts[1])?' lc_menu_check':'');?>"><?=incl\pro100\Def\LangLibCabMain::ARR_L_MENU_PC[lib\Def\Opt::$lang]['account'];?></div>
                </a>
            </div>
            <div class="lc_menu_line">
                <a href="/cabinet/balance"><div class="lc_menu_ico i_bal"></div>
                    <div class="lc_menu_link_t<?=(!empty(\lib\Def\Route::$uri_parts[1])&&\lib\Def\Route::$uri_parts[1]=='balance'?' lc_menu_check':'');?>"><?=incl\pro100\Def\LangLibCabMain::ARR_L_MENU_PC[lib\Def\Opt::$lang]['balance'];?></div>
                </a>
            </div>
            <div class="lc_menu_line">
                <a href="/cabinet/partners"><div class="lc_menu_ico i_partn"></div>
                    <div class="lc_menu_link_t<?=(!empty(\lib\Def\Route::$uri_parts[1])&&\lib\Def\Route::$uri_parts[1]=='partners'?' lc_menu_check':'');?>"><?=incl\pro100\Def\LangLibCabMain::ARR_L_MENU_PC[lib\Def\Opt::$lang]['partners'];?></div>
                </a>
            </div>
            <div class="lc_menu_line">
                <a href="/cabinet/level-up"><div class="lc_menu_ico i_l-up"></div>
                    <div class="lc_menu_link_t<?=(!empty(\lib\Def\Route::$uri_parts[1])&&\lib\Def\Route::$uri_parts[1]=='level-up'?' lc_menu_check':'');?>"><?=incl\pro100\Def\LangLibCabMain::ARR_L_MENU_PC[lib\Def\Opt::$lang]['level_up'];?></div>
                </a>
            </div>
            <div class="lc_menu_line">
                <a href="/cabinet/support"><div class="lc_menu_ico i_sup"></div>
                    <div class="lc_menu_link_t<?=(!empty(\lib\Def\Route::$uri_parts[1])&&\lib\Def\Route::$uri_parts[1]=='support'?' lc_menu_check':'');?>"><?=incl\pro100\Def\LangLibCabMain::ARR_L_MENU_PC[lib\Def\Opt::$lang]['support'];?></div>
                </a>
            </div>
            <div class="lc_menu_line">
                <a href="/cabinet/promo"><div class="lc_menu_ico i_promo"></div>
                    <div class="lc_menu_link_t<?=(!empty(\lib\Def\Route::$uri_parts[1])&&\lib\Def\Route::$uri_parts[1]=='promo'?' lc_menu_check':'');?>"><?=incl\pro100\Def\LangLibCabMain::ARR_L_MENU_PC[lib\Def\Opt::$lang]['promo'];?></div>
                </a>
            </div>

            <div class="lc_menu_line"></div>

            <div class="lc_menu_line">
                <a href="/news">
                    <div class="lc_menu_ico">
                        <!--<img src="img/cab/ico/analytics.png"/>-->
                    </div>
                    <div class="lc_menu_link_t"><?=incl\pro100\Def\LangLibCabMain::ARR_L_MENU_PC[lib\Def\Opt::$lang]['news'];?></div>
                </a>
            </div>
            <div class="lc_menu_line">
                <a href="/exit">
                    <div class="lc_menu_ico">
                        <!--<img src="img/cab/ico/analytics.png"/>-->
                    </div>
                    <div class="lc_menu_link_t"><?=incl\pro100\Def\LangLibCabMain::ARR_L_MENU_PC[lib\Def\Opt::$lang]['exit'];?></div>
                </a>

            </div>

        </div>
    </div>