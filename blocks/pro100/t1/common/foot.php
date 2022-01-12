<footer><div id="foot">
        <div class="ac"><p class="note">&copy; All right reserved. 2022 <?=\lib\Def\Opt::$site;?></p><p class="note"><a href="/offer">Offer</a> |  <a href="mailto:support@<?=\lib\Def\Opt::$site;?>">support@<?=\lib\Def\Opt::$site;?></a></p></div>
        <div id="shadow"></div><div id="up">Up</div>
</div></footer><?php
if(!\lib\Def\Opt::$live_user){
echo'<div id="shadowForm" class="shadow"></div>
<div id="formReset" class="form">
    <div class="form_header">
        <span id="closeFormReset" class="close"></span>
        <h3>Reset your password</h3>
    </div>
    <div class="form_label">
        <span>Email address</span>
    </div>
    <div class="form_row">
        <input type="text" id="res_email" placeholder="Enter your email address">
    </div>    
    <div class="form_row rel">
        <div id="formResetBtn" class="form_login_res">Send password</div>
    </div>
</div>
<!--------------------form login------------------->
<div id="formLogin" class="form">
    <div class="form_header">
        <span id="closeFormLogin" class="close"></span>
        <h3>Authorization</h3>
    </div>
    <div class="form_label">
        <span>Login</span>
    </div>
    <div class="form_row">
        <input type="text" id="log_login" placeholder="Enter your Login">
    </div>
    <div class="form_label">
        <span>Password</span>
    </div>
    <div class="form_row">
        <input type="password" id="log_password" placeholder="Enter your Password">
    </div>
    <div class="form_row rel">
        <div id="formLoginBtn" class="form_login_in">Sign in</div>
        <div id="rememberPassBtn" class="form_remember link">Forgot password?</div>
    </div>
    <div class="form_row rel ac">
        <span id="formLoginLinkToReg" class="form_link_center link">Register now</span>
    </div>
</div>
<!--------------------form reg------------------->
<div id="formReg" class="form">
    <div class="form_header">
        <span id="closeFormReg" class="close"></span>
        <h3>Registration</h3>
    </div>
    <div class="form_label">
        <span>Login</span>
    </div>
    <div class="form_row">
        <input type="text" id="reg_login" placeholder="Enter your Login">
    </div>
    <div class="form_label">
        <span>E-mail</span>
    </div>
    <div class="form_row">
        <input type="email" id="reg_email" placeholder="Enter your E-mail">
    </div>
    <div class="form_label">
        <span>Password</span>
    </div>
    <div class="form_row">
        <input type="password" id="reg_pass" placeholder="Enter your Password">
    </div>
    <div class="form_row rel">
        <input type="checkbox" id="formRegCheck">
        <label for="formRegCheck">
            <span class="check_box_reg"><a target="_blank" href="/offer">I agree to the User agreement</a></span>
        </label>
    </div>
    <div class="form_row rel">
        <div id="formRegBtn" class="form_login_reg">Sing Up</div>
    </div>
</div><script src="/j/m_login_form.js"></script>';}?>
</body></html>