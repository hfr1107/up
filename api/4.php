<?php
header("Content-Type: text/html;charset=utf-8");
$url = 'http://lige.unaux.com/?url=http://%E9%A5%AD%E5%A4%AA%E7%A1%AC.top/tv';
//$url = iconv("gb2312", "utf-8//IGNORE",$url);
$str = file_get_contents($url);//获取网页，此时输出$str为解析版网页
//$str = iconv("gb2312", "utf-8//IGNORE",$str);
echo $str;
?>
