<?php
$url = "https://t4vod.hz.cz/api/pz"; // 替换为你想抓取的网站URL
 
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$html = curl_exec($ch);
curl_close($ch);
 
echo $html;
?>
