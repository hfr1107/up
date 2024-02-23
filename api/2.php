<?php
header("Content-Type: text/html;charset=utf-8");
$url = 'https://pastebin.com/raw/5NHaxyGR';
$str = iconv("gb2312", "utf-8//IGNORE",$str);
$str = file_get_contents($url);//获取网页，此时输出$str为解析版网页
$str = iconv("gb2312", "utf-8//IGNORE",$str);
$str = htmlspecialchars($str);//转换为源代码
echo $str;
?>
