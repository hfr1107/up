<?php
<?php
global $v;
$p = isset($_GET['p']) ? $_GET['p'] : '';
$v = isset($_GET['w']) ? $_GET['w'] : '';
$maxRetries = 1; 
$retries = 0; // 初始化 retries 变量
function fetchContent($url, &$retries,  $maxRetries) { // 通过引用传递 retries 变量，并添加 maxRetries 参数
    $context = stream_context_create([
        'http' => [
            'timeout' => 5
        ]
    ]);
    $content = @file_get_contents($url, false, $context);
    if ($content === FALSE) {
 if ($retries < $maxRetries) { 
            sleep(1); 
            $retries++; // 直接修改引用的变量
            $v++; // 直接修改引用的变量
            return fetchContent($url, $retries, $maxRetries); // 递归调用以尝试再次获取内容
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

if (isset($urls[$p]) && isset($urls[$p][$v])) { // 移除了对 retries 的检查，因为 fetchContent 函数现在会处理重试                                  
    $content = fetchContent($urls[$p][$v], $retries, $maxRetries); // 传递 retries 和 maxRetries 到函数
    echo $content; // 注意：如果 fetchContent 返回 '无法获取内容。'，这里也会直接输出
} else {
    echo '未知参数';
}
?>
$p = isset($_GET['p']) ? $_GET['p'] : '';
$v = isset($_GET['v']) ? $_GET['v'] : '';
$maxRetries = 1; 
$retries = 0; // 初始化 retries 变量
function fetchContent($url, &$retries,  $maxRetries) { // 通过引用传递 retries 变量，并添加 maxRetries 参数
    $context = stream_context_create([
        'http' => [
            'timeout' => 5
        ]
    ]);
    $content = @file_get_contents($url, false, $context);
    if ($content === FALSE) {
 if ($retries < $maxRetries) { 
            sleep(1); 
            $retries++; // 直接修改引用的变量
            $v++; // 直接修改引用的变量
            return fetchContent($url, $retries, $maxRetries); // 递归调用以尝试再次获取内容
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

if (isset($urls[$p]) && isset($urls[$p][$v])) { // 移除了对 retries 的检查，因为 fetchContent 函数现在会处理重试                                  
    $content = fetchContent($urls[$p][$v], $retries, $maxRetries); // 传递 retries 和 maxRetries 到函数
    echo $content; // 注意：如果 fetchContent 返回 '无法获取内容。'，这里也会直接输出
} else {
    echo '未知参数';
}
?>
