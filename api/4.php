<?php
$url = "https://www.xn--sss604efuw.top/jm/jiemi.php?url=https://agit.ai/leevi/PiG/raw/branch/master/jsm.json";
$ch = curl_init();
$timeout = 5;
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
//在需要用户检测的网页里需要增加下面两行
//curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
//curl_setopt($ch, CURLOPT_USERPWD, US_NAME.":".US_PWD);
$contents = curl_exec($ch);
curl_close($ch);
echo $contents;
?>
