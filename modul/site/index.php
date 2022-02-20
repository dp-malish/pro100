<?php
namespace lib\Def;

Opt::$css.='<link rel="stylesheet" href="/css/index/in1.css">
    <link rel="stylesheet" href="/css/index/in2.css">
    <link rel="stylesheet" href="/css/index/in3.css">
    <link rel="stylesheet" href="/css/index/in4.css">
    <link rel="stylesheet" href="/css/index/in5.css">
    <link rel="stylesheet" href="/css/index/particles-js.css">';

//Opt::$jscript.='';


Opt::$title='SOCIAL NETWORK OF FINANCIAL MUTUAL SUPPORT';
Opt::$description='SocHelping is an alliance of like-minded people, giving everyone the opportunity to create Their own international business with a minimum financial investment of over $198 000. By following simple steps and developing Your business structure, we help each other to achieve quick and profitable results.';





Opt::$main_content.='<main>
<div id="in1">
    <div id="in1_l1">
        <h1>SOCIAL NETWORK OF FINANCIAL MUTUAL SUPPORT</h1>
    </div>
    <div id="in1_l2">PROFIT IS OVER $198 000</div>

    <div id="in1_l3"><div id="particles-js"></div></div>
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
<script src="/j/lib/particles.min.js"></script><script>$(document).ready(function(){$("#particles-js").appendTo("#rec99999999 .t396__filter");});</script><script>particlesJS("particles-js", {"particles":{"number":{"value":80,"density":{"enable":true,"value_area":800}},"color":{"value":"#6f7faa"},"shape":{"type":"circle","stroke":{"width":0,"color":"#000000"},"polygon":{"nb_sides":5},"image":{"src":"img/github.svg","width":100,"height":100}},"opacity":{"value":0.5,"random":false,"anim":{"enable":false,"speed":1,"opacity_min":0.1,"sync":false}},"size":{"value":3,"random":true,"anim":{"enable":false,"speed":40,"size_min":0.1,"sync":false}},"line_linked":{"enable":true,"distance":150,"color":"#7d96d9","opacity":0.4,"width":1},"move":{"enable":true,"speed":6,"direction":"none","random":false,"straight":false,"out_mode":"out","bounce":false,"attract":{"enable":false,"rotateX":600,"rotateY":1200}}},"interactivity":{"detect_on":"canvas","events":{"onhover":{"enable":true,"mode":"repulse"},"onclick":{"enable":true,"mode":"push"},"resize":true},"modes":{"grab":{"distance":400,"line_linked":{"opacity":1}},"bubble":{"distance":400,"size":40,"duration":2,"opacity":8,"speed":3},"repulse":{"distance":200,"duration":0.4},"push":{"particles_nb":4},"remove":{"particles_nb":2}}},"retina_detect":true});var count_particles, stats, update; stats = new Stats; stats.setMode(0); stats.domElement.style.position = \'absolute\'; stats.domElement.style.left = \'0px\'; stats.domElement.style.top = \'0px\'; document.body.appendChild(stats.domElement); count_particles = document.querySelector(\'.js-count-particles\'); update = function() { stats.begin(); stats.end(); if (window.pJSDom[0].pJS.particles && window.pJSDom[0].pJS.particles.array) { count_particles.innerText = window.pJSDom[0].pJS.particles.array.length; } requestAnimationFrame(update); };</script>
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
        <p>First line`s cost $30. This is the end of your investment.</p>
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
                <div>$30</div>
                <div>3</div>
                <div>$72</div>
            </div>
            <div>
                <div class="in3_l3_t_c">2</div>
                <div>$60</div>
                <div>9</div>
                <div>$432</div>
            </div>
                <div>
                    <div class="in3_l3_t_c">3</div>
                    <div>$300</div>
                    <div>27</div>
                    <div>$6 480</div>
                </div>
                <div>
                    <div class="in3_l3_t_c">4</div>
                    <div>$3000</div>
                    <div>81</div>
                    <div>$194 400</div>
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