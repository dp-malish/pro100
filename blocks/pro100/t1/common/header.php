<body>
<header>



    <div id="l1" class="rel">

        <div  class="maxw rel">

            <div id="l1_logo">
                <img src="/img/logo.png" alt="logo">
            </div>
            <!--<div id="l1_logo_back"></div>-->

            <!--pc version-->
            <div class="l1_r">
                <div class="l1_Login_btn">
                    <div id="l1_reg_btn">
                        <div class="l1_reg_btn_triangle"></div>
                        <div class="l1_reg_btn_triangle_"></div>
                        Registration
                    </div>
                    <div id="l1_log_btn">
                        <div class="l1_log_btn_triangle"></div>
                        <div class="l1_log_btn_triangle_"></div>
                        Login
                    </div>
                </div><script src="/j/m_login.js"></script>


                <div class="l1_mob_burger">
                    <div id="l1_mob_burger">
                        <div class="l1_mob_burg_line"></div>
                        <div class="l1_mob_burg_line"></div>
                        <div class="l1_mob_burg_line"></div>
                    </div>
                </div>

                <script type="text/javascript">
                    document.getElementById('l1_mob_burger').onclick=function(){
                        document.getElementById('shadow').style.display='block';
                        document.getElementById('l1_mob_burger_can').style.display='block';

                        //alert('Клик!');
                    };

                </script>



                <div id="l1_pc_menu">


                    <div id="l1_lng_trans">
                        <!--переводчик !!!!!!-->
                    </div>

                    <div id="l1_pc_link">
                        <ul id="l1_pc_link_nav">
                            <li id="l1_pc_link_nav_1"><a href="/">HOME</a></li>
                            <li id="l1_pc_link_nav_2"><a href="/marketing">MARKETING</a></li>
                            <li><a href="/news">NEWS</a></li>
                            <li><a href="/offer">OFFER</a></li>
                            <li><a href="/faq">FAQ</a></li>
                        </ul>
                    </div>

                    <div class="cl"></div>
                </div>



                <div class="cl"></div>
            </div>


            <div class="cl"></div>
        </div>
    </div>
    <div id="l1_mob_burger_can">
        <div id="l1_bur_cl" class="close_btn">X</div>
        <script type="text/javascript">
            document.getElementById('l1_bur_cl').onclick=function(){
                document.getElementById('shadow').style.display='none';
                document.getElementById('l1_mob_burger_can').style.display='none';
            }
        </script>

        <div class="l1_mob_bur_line"></div>
        <div class="l1_mob_bur_line">
            <a href="/">Home</a>
        </div>
        <div class="l1_mob_bur_line">
            <a href="/marketing">Marketing</a>
        </div>
        <div class="l1_mob_bur_line">
            <a href="/news">News</a>
        </div>
        <div class="l1_mob_bur_line">
            <a href="/faq">FAQ</a>
        </div>
        <div class="l1_mob_bur_line">
            <a href="/offer">Offer</a>
        </div>
        <div class="l1_mob_bur_line"></div>



        <div class="l1_mob_bur_line">
            <a href="/cabinet">Cabinet</a>

        </div>
        <div class="l1_mob_bur_line">
            <a href="/exit">Exit</a>
        </div>
    </div>

    <div id="l1_back"></div><!--Не забыть расстояние-->
</header>