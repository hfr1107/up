<?php

$p = isset($_GET['p']) ? $_GET['p'] : '';
$v = isset($_GET['v']) ? $_GET['v'] : '';
$retryCount = 0; // 初始化重试计数器

function fetchContent($url, &$retryCount) {
    $content = @file_get_contents($url); // Suppress errors with @, but consider using proper error handling instead
    if ($content === FALSE) {
        $retryCount++; // 增加重试计数器
        if ($retryCount < 10) { // 如果重试次数少于10次，则再次尝试获取内容
            return fetchContent($url, $retryCount); // 注意这里可能会导致无限递归，如果file_get_contents一直失败的话
        }
        return "无法获取内容"; // 如果重试10次仍然失败，则返回错误信息
    }
    return $content; // 如果成功获取内容，则返回内容
}

$urls = [
    'live' => [
        '1' => 'https://hfr1107.github.io/up/tv/tvv.txt',
        '2' => 'https://hfr1107.github.io/up/tv/tv1.txt',
        '3' => 'https://hfr1107.github.io/up/tv/tv2.txt',
    ],
    'app' => [
        '1' => 'https://hfr1107.github.io/up/appmarket/adss.php',
        '2' => 'https://hfr1107.github.io/up/appmarket/index.php',
    ],
    'tv' => [
        '0' => 'https://hfr1107.github.io/up/dcc.json',
        '1' => 'http://饭太硬.top/tv', // 注意这个URL使用的是http协议，而其他URL使用的是https协议，这可能会导致混合内容问题或安全性问题
    ],
];

if (isset($urls[$p]) && isset($urls[$p][$v])) {
    $content = fetchContent($urls[$p][$v], $retryCount); // 调用fetchContent函数来获取内容，并传入重试计数器作为引用参数以便在函数内部修改它
    echo $content; // 输出获取到的内容或错误信息
} else {
    echo '未知参数'; // 如果参数无效或不存在于URL数组中，则输出错误信息
}
?>
