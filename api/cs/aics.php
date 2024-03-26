<?php
global $w;
$p = isset($_GET['p']) ? $_GET['p'] : '';
$v = isset($_GET['v']) ? $_GET['v'] : '';
$maxRetries = 2; 
$w = 0; // 初始化 w 变量
$retries = 0; // 初始化 retries 变量
function fetchContent($url, &$retries,  $maxRetries) { 
    $context = stream_context_create([
        'http' => [
            'timeout' => 5
        ]
    ]);
    $content = @file_get_contents($url, false, $context);
    if ($content === FALSE) {
 if ($retries < $maxRetries) { 
            sleep(1); 
            $retries++; 
            return fetchContent($url, $retries, $maxRetries); 
        } else {
            return '无法获取内容。';     
        }                                             
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
        '2' => 'https://hfr1107.github.io/up/tv/tv2.txt',    
    ],
];

if (isset($urls[$p]) && isset($urls[$p][$v])) {   
    $W=$v+$retries
    $content = fetchContent($urls[$p][$W], $retries, $maxRetries); 
    echo $content; 
} else {
    echo '未知参数';
}
?>
