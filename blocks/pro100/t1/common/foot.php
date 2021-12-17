<footer><div id="foot">
        <div class="ac"><p class="note">&copy; All right reserved. &nbsp;&nbsp;&nbsp; 2021 <?=\lib\Def\Opt::$site;?> |  <a href="/offer">Offer</a></p></div>
        <div id="shadow"></div><div id="up">Up</div>
</div></footer><?php
if(!\lib\Def\Opt::$live_user){
//<!--------------------form login------------------->
//<!--------------------form login------------------->
//<!--------------------form login------------------->
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

<div id="formLogin" class="form">
    <div class="form_header">
        <span id="closeFormLogin" class="close"></span>
        <h3>Authorization</h3>
    </div>
    <div class="form_label">
        <span>Username</span>
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
<!--------------------form reg------------------->
<!--------------------form reg------------------->
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
</div><script src="/j/m_login_form.js"></script>';}?>
</body></html>