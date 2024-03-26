<?php
$p = isset($_GET['p']) ? $_GET['p'] : '';
$v = isset($_GET['v']) ? $_GET['v'] : '';
$retryCount = 0;

function fetchContent($url, &$retryCount) {
    global $v;
    $content = @file_get_contents($url);
    if ($content === FALSE) {
        $retryCount++;
        if ($retryCount >= 10) {
            return "无法获取内容"; // Error occurred
        }
        // You can add some logic here to handle retries or fallback to another URL
        return fetchContent($url, $retryCount); // Retry fetching the content
    }
    return $content;
}

$urls = [
    'live' => [
       '0' => 'https://hfr1107.github.io/up/tv/tvv.txt',
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
        // Note: The following URL uses a different protocol (http) and domain.
        // Consider using https and a consistent domain if possible.
        '1' => 'http://饭太硬.top/tv', 
    ],
];

if (isset($urls[$p]) && isset($urls[$p][$v])) {
    $content = fetchContent($urls[$p][$v], $retryCount);
    echo $content;
} else {
    echo '未知参数'; // Unknown parameters
}
?>
