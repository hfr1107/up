<?php

$p = isset($_GET['p']) ? $_GET['p'] : '';
$v = isset($_GET['v']) ? $_GET['v'] : '';
 
switch ($p) {
    case 'live':
        // 根据$v的值返回对应数据
        switch ($v) {
            case '1':
$url = 'https://hfr1107.github.io/up/tv/tv.txt';
$str = file_get_contents($url);//获取网页，此时输出$str为解析版网页
//$str = iconv("gb2312", "utf-8//IGNORE",$str);
echo $str;
                break;
            case '2':
$url = 'https://hfr1107.github.io/up/tv/tv1.txt';
$str = file_get_contents($url);//获取网页，此时输出$str为解析版网页
//$str = iconv("gb2312", "utf-8//IGNORE",$str);
echo $str;
                break;
            case '3':
$url = 'https://pastebin.com/raw/2HgsFKtT';
$str = file_get_contents($url);//获取网页，此时输出$str为解析版网页
//$str = iconv("gb2312", "utf-8//IGNORE",$str);
echo $str;
                break;
            default:
$url = '未知参数';
                break;
        }
        break;

    case 'app':
        // 根据$v的值返回对应数据
        switch ($v) {
            case '1':
$url = 'https://hfr1107.github.io/up/appmarket/ads.php';
$str = file_get_contents($url);//获取网页，此时输出$str为解析版网页
//$str = iconv("gb2312", "utf-8//IGNORE",$str);
         echo $str;
                break;
            case '2':
$url = 'https://hfr1107.github.io/up/appmarket/index.php';
$str = file_get_contents($url);//获取网页，此时输出$str为解析版网页
//$str = iconv("gb2312", "utf-8//IGNORE",$str);
         echo $str;
                break;
            default:
$url = '未知参数';
                break;
        }
        break;

    case 'tv':
        // 根据$v的值返回对应数据
        switch ($v) {
            case '0':
$handle = fopen ("https://pastebin.com/raw/2HgsFKtT", "rb");
$contents = "";
do {
$data = fread($handle, 1024);
if (strlen($data) == 0) {
break;
}
$contents .= $data;
} while(true);
fclose ($handle);
echo $contents;
                break;
            case '1':
$url = 'https://t4vod.hz.cz/api/pz?url=https://pastebin.com/raw/2HgsFKtT';
//$url = iconv("gb2312", "utf-8//IGNORE",$url);
$str = file_get_contents($url);//获取网页，此时输出$str为解析版网页
//$str = iconv("gb2312", "utf-8//IGNORE",$str);
echo $str;
                break;
            default:
  echo '未知参数';
                break;
        }
        break;

    default:
  echo '未知参数';
        break;
}
?>
