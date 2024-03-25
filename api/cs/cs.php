<?php

$p = isset($_GET['p']) ? $_GET['p'] : '';
$v = isset($_GET['v']) ? $_GET['v'] : '';

function fetchContent($url) {
    $content = @file_get_contents($url); // Suppress errors with @
    if ($content === FALSE) {
        return "无法获取内容"; // Error occurred
    }
    return $content;
}

$urls = [
    'live' => [
        '1' => 'https://hfr1107.github.io/up/tv/tv.txt',
        '2' => 'https://hfr1107.github.io/up/tv/tv1.txt',
        '3' => 'https://hfr1107.github.io/up/tv/tv2.txt',
    ],
    'app' => [
        '1' => 'https://hfr1107.github.io/up/appmarket/ads.php',
        '2' => 'https://hfr1107.github.io/up/appmarket/index.php',
    ],
    'tv' => [
        '0' => 'https://hfr1107.github.io/up/dc.json',
        '1' => 'http://饭太硬.top/tv',
    ],
];

if (isset($urls[$p]) && isset($urls[$p][$v])) {
    $content = fetchContent($urls[$p][$v]);
    echo $content;
} else {
    echo '未知参数';
}
?>
