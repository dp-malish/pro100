<?php
namespace lib\Def;

Opt::$css.='<link rel="stylesheet" href="/css/index/in1.css">
    <link rel="stylesheet" href="/css/index/in2.css">
    <link rel="stylesheet" href="/css/index/in3.css">
    <link rel="stylesheet" href="/css/index/in4.css">
    <link rel="stylesheet" href="/css/index/in5.css">';

//Opt::$jscript.='';


Opt::$title='SOCIAL NETWORK OF FINANCIAL MUTUAL SUPPORT';
Opt::$description='SocHelping is an alliance of like-minded people, giving everyone the opportunity to create Their own international business with a minimum financial investment of over $450,000. By following simple steps and developing Your business structure, we help each other to achieve quick and profitable results.';





Opt::$main_content.='<main>
<div id="in1">
    <div id="in1_l1">
        <h1>SOCIAL NETWORK OF FINANCIAL MUTUAL SUPPORT</h1>
    </div>
    <div id="in1_l2">PROFIT IS OVER $450 000</div>

    <div id="in1_l3"></div>
    <div id="in1_l4">
        <div class="dwfce">
        <div id="in1_l4_reg">
            <div class="l1_reg_btn_triangle"></div>
            <div class="l1_reg_btn_triangle_"></div>';
            Opt::$main_content.=(\lib\Def\Opt::$live_user?"Cabinet":"Registration").'</div>
        <div id="in1_l4_log">
            <div class="l1_log_btn_triangle"></div>
            <div class="l1_log_btn_triangle_"></div>';
            Opt::$main_content.=(\lib\Def\Opt::$live_user?"Exit":"Login").'
        </div>
        <script type="text/javascript">';
            Opt::$main_content.=(\lib\Def\Opt::$live_user?'document.getElementById("in1_l4_log").onclick=function(){location.href="/exit";};document.getElementById("in1_l4_reg").onclick=function(){location.href="/cabinet/";};':'document.getElementById("in1_l4_log").onclick=function(){loginBtn();};document.getElementById("in1_l4_reg").onclick=function(){registrationBtn();};').'</script>
        </div>
    </div>
    <div id="in1_l5">
        <div class="in1_l5_flax dwfc">
        <div class="in1_l5_flax_t ac">You can get money transfers all over the world</div>
        <div class="in1_l5_flax_t ac">You can use desktop and mobile devices</div>
        </div>
    </div>

    <div id="in1_l6">
        <div class="in1_l5_flax_t ac">Stable profit without risks</div>
    </div>

</div>

<div id="in2">
    <div id="in2_l1">
        <h2>THE PLATFORM WITH UNIQUE ABILITIES</h2>
    </div>
    <div id="in2_l2"></div><!--phone -->
    <div id="in2_l3">
        <!--раздвигашки тут-->
        <div class="in2_l3_line">
            <div class="in2_l3_line_">
                <span id="in2_l3_l_i1" class="in2_l3_ico"></span>
                <div class="in2_l3_ico_b"></div>
                <h3 class="al">MARKETING</h3>
                <p>Proven marketing is the maximum profit in the short term</p>
                <div class="cl"></div>
            </div>
            <div class="in2_l3_line_">
                <span id="in2_l3_l_i4" class="in2_l3_ico_r"></span>
                <div class="in2_l3_ico_b_r"></div>
                <h3 class="ar">PAYMENTS</h3>
                <p class="ar">Instant replenishment and secure withdrawal through the payment system</p>
                <div class="cl"></div>
            </div>
        </div>
        <div class="in2_l3_line">
            <div class="in2_l3_line_">
                <span id="in2_l3_l_i2" class="in2_l3_ico"></span>
                <div class="in2_l3_ico_b"></div>
                <h3 class="al">SECURITY</h3>
                <p>SSL-certificate, protection from DDoS-attacks, powerful dedicated server</p>
            <div class="cl"></div>
            </div>
            <div class="in2_l3_line_">
                <span id="in2_l3_l_i5" class="in2_l3_ico_r"></span>
                <div class="in2_l3_ico_b_r"></div>
                <h3 class="ar">SUPPORT</h3>
                <p class="ar">Support is online 24/7</p>
                <div class="cl"></div>
            </div>
        </div>
        <div class="in2_l3_line">
            <div class="in2_l3_line_">
                <span id="in2_l3_l_i3" class="in2_l3_ico"></span>
                <div class="in2_l3_ico_b"></div>
                <h3 class="al">OVER FLOWS</h3>
                <p>Overflow`s Operations from the Service and partners</p>
                <div class="cl"></div>
            </div>
            <div class="in2_l3_line_">
                <span id="in2_l3_l_i6" class="in2_l3_ico_r"></span>
                <div class="in2_l3_ico_b_r"></div>
                <h3 class="ar">RESULTS</h3>
                <p class="ar">Maximum results in the shortest possible term</p>
                <div class="cl"></div>
            </div>
        </div>
    </div>
    <div id="in2_l4">
        <h3>Register and make a profit right now</h3>
    </div>
</div>


<div id="in3">
    <div id="in3_l1">
        <h2>ACTIVE MARKETING PLAN</h2>
    </div>
    <div id="in3_l2" class="ac">
        <p>First line`s cost $100. This is the end of your investment.</p>
        <p>The following lines are activated as your structure fills up with partners.</p>
    </div>
    <div id="in3_l3">
        <div class="maxw">

            <div id="in3_l3_t">

            <div>
                <div class="in3_l3_t_c">Line</div>
                <div>Cost</div>
                <div>Partners</div>
                <div>Profit</div>
            </div>
            <div>
                <div class="in3_l3_t_c">1</div>
                <div>$100</div>
                <div>3</div>
                <div>$240</div>
            </div>
            <div>
                <div class="in3_l3_t_c">2</div>
                <div>$200</div>
                <div>9</div>
                <div>$1440</div>
            </div>
                <div>
                    <div class="in3_l3_t_c">3</div>
                    <div>$1000</div>
                    <div>27</div>
                    <div>$21600</div>
                </div>
                <div>
                    <div class="in3_l3_t_c">4</div>
                    <div>$7000</div>
                    <div>81</div>
                    <div>$453600</div>
                </div>

            </div>
        </div>

    </div>
    <div id="in3_l4">
        <h2>OVERFLOW OPERATION PRINCIPLE</h2>
        <div id="in3_l4_i">
            <img src="/img/index/icon.png" alt="OVERFLOW OPERATION PRINCIPLE">
        </div>
    </div>
</div>


<div id="in4">
<div id="in4_l1">
    <p>SocHelping.com has an overflow operation.</p>

    <p>If you already have three paid partners on level one, then each subsequent invitee becomes<br> a second line under your level one partners until line two is filled and so on - as your structure fills up.</p>

</div>
</div>

<div id="in5">

    <div id="in5_l1">
        <h2>THREE SIMPLE STEPS TO IMPLEMENT</h2>

        <div class="maxw">



            <div id="in5_l1_f">
                <div class="in5_l1_f_d">
                    <div id="in5_l1_f_di1" class="in5_l1_f_di"></div>
                    <div class="in5_l1_f_dh">
                        <h3>FAST REGISTRATION</h3>
                    </div>
                    <p>It takes no more than a minute.</p>


                </div>
                <div class="in5_l1_f_d">
                    <div id="in5_l1_f_di2" class="in5_l1_f_di"></div>
                    <div class="in5_l1_f_dh"><h3>LEVEL UP</h3></div>
                    <p>Get first line and develop your business structure.</p>
                </div>
                <div class="in5_l1_f_d">
                    <div id="in5_l1_f_di3" class="in5_l1_f_di"></div>
                    <div class="in5_l1_f_dh"><h3>GET A PROFIT</h3></div>
                    <p>Be prepared to accept transfers from different countries.</p>
                </div>
            </div>
        </div>





    </div>


</div></main>';











/*

Opt::$main_content.='<br><br><a href="/cabinet/">Кабинет</a>';


Opt::$main_content.='<br><br><br><a href="/addcash/">Добавить деньги</a>';


Opt::$main_content.='<br><br><a href="/">Главная</a>';
Opt::$main_content.='<br><br><a href="/login?login=admin&pass=admin">Вход</a>';

Opt::$main_content.='<br><br><a href="/login?login=proba3&pass=12345678">Вход Proba3</a>';

Opt::$main_content.='<br><br><a href="/exit">Выход</a>';
Opt::$main_content.='<br> <br><br><br> User#'.\incl\pro100\User\User::$u_id;



Opt::$main_content.='<br><br><a href="/reg?login=Proba1&pass=12345678&mail=win@ix.ru&oferta=1">Registraciya</a>';
Opt::$main_content.='<br><br><a href="/reg?login=admin&pass=12345678&mail=zelejoy@ya.ru&oferta=1">Registraciya Есть</a>';
//Opt::$main_content.='<br>'.$_GET['i'];
*/