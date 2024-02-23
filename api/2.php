<?php
header("Content-Type: text/html;charset=utf-8");
$url = 'https://pastebin.com/raw/5NHaxyGR';
$str = file_get_contents($url);//获取网页，此时输出$str为解析版网页
$str = htmlspecialchars($str);//转换为源代码
echo $str;
?>
