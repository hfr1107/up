<?php
header("Content-Type: text/html;charset=utf-8");
$url = 'https://www.xn--sss604efuw.top/jm/jiemi.php?url=http://饭太硬.top/tv';
//$url = iconv("gb2312", "utf-8//IGNORE",$url);
$str = file_get_contents($url);//获取网页，此时输出$str为解析版网页
//$str = iconv("gb2312", "utf-8//IGNORE",$str);
echo $str;
?>
