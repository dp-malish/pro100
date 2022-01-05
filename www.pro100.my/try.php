<?php


$s='';
trim(htmlspecialchars($s,ENT_QUOTES));

$new = htmlspecialchars("<a href='test'>Test</a>", ENT_QUOTES);
echo $new;
