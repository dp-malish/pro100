<?php
include('../inc/conf.php');
if (!isset($_SESSION["uid"])) {
    echo "5";
    exit;
}
if (isset($_POST['sum'])) {
    if (!empty($_POST['sum'])) {
        $uid = intval($_SESSION["uid"]);
        $sum = preg_replace("#[^\.\-0-9]+#i", '', mysqli_real_escape_string($connect_db, $_POST["sum"]));
        $sum = number_format($sum, 2, '.', '');


        $nb = mysqli_fetch_assoc(mysqli_query($connect_db, "SELECT uid,bal,pay_payeer,pay_pm FROM t_users WHERE uid='$uid' LIMIT 1"));
        $nbal = $nb['bal'];
        $pa = $nb['pay_payeer'];
        $pm = $nb['pay_pm'];
        if ($nbal < $min_out) {
            echo '4';
            exit;
        }
        if ($nbal < $sum) {
            echo '3';
            exit;
        }
        if ($sum < $min_out) {
            echo '2';
            exit;
        }
        if ($sum > $max_out) {
            echo '8';
            exit;
        }
        $dt = time();


        if ($_POST['ps'] == 1) {
            if (empty($pa)) {
                echo '7';
                exit;
            }
            include('../inc/cpayeer.php');

            $accountNumber = $p_out_number;
            $apiId = $p_out_id;
            $apiKey = $p_out_key;

            $payeer = new CPayeer($accountNumber, $apiId, $apiKey);
            if ($payeer->isAuth()) {
                $arTransfer = $payeer->transfer(array(
                    'curIn' => 'USD',
                    'sum' => $sum,
                    'curOut' => 'USD',
                    'to' => $pa,
                    'comment' => iconv('windows-1251', 'utf-8', 'Payment from ' . SITE)
                ));
                if (empty($arTransfer['errors'])) {
                    mysqli_query($connect_db, "INSERT INTO `t_out` (usr,sum,pa,dt) VALUES ('$uid','$sum+$sum/100*2.5','1','$dt')");
                    mysqli_query($connect_db, "UPDATE `t_users` SET `bal` = `bal`-'$sum+$sum/100*2.5' WHERE uid = '$uid' LIMIT 1");
                    exit('1');
                } else {
//echo '<pre>'.print_r($arTransfer["errors"], true).'</pre>';
                    exit('6');
                }
            } else {
//echo '<pre>'.print_r($payeer->getErrors(), true).'</pre>';
                exit('6');
            }

        }

        if ($_POST['ps'] == 2) {
            if (empty($pm)) {
                echo '7';
                exit;
            }


            $f = fopen('https://perfectmoney.is/acct/confirm.asp?AccountID=' . $perfect_id . '&PassPhrase=' . $perfect_pass . '&Payer_Account=' . $perfect_number . '&Payee_Account=' . $pm . '&Amount=' . $sum . '&PAY_IN=1&PAYMENT_ID=' . $dt . '', 'rb');
            if ($f === false) {
//echo 'error openning url';
                exit('6');
            }
            $out = array();
            $out = "";
            while (!feof($f)) $out .= fgets($f);
            fclose($f);
            if (!preg_match_all("/<input name='(.*)' type='hidden' value='(.*)'>/", $out, $result, PREG_SET_ORDER)) {
//echo 'Ivalid output';
                exit('6');
            }
            $ar = "";
            foreach ($result as $item) {
                $key = $item[1];
                $ar[$key] = $item[2];
            }
            if (empty($ar['ERROR'])) {
                mysqli_query($connect_db, "INSERT INTO `t_out` (usr,sum,ps,dt,st) VALUES ('$uid','$sum+$sum/100*2.5','2','$dt','1')");
                mysqli_query($connect_db, "UPDATE `t_users` SET `bal` = `bal`-'$sum+$sum/100*2.5' WHERE uid = '$uid' LIMIT 1");
                exit('1');
            } else {
//print_r($ar['ERROR']).'<br />';
                exit('6');
            }

        }

        echo '1';
    } else {
        echo '0';
    }
} else {
    echo '6';
}
