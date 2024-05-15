<?php // 24.4.3测试成功，输出文本
header("Content-Type: text/plain;charset=utf-8"); // 确保content是utf-8和text

$p = isset($_GET['p']) ? $_GET['p'] : 'dc';
$v = isset($_GET['v']) ? $_GET['v'] : '1';

function fetchContent($url, $p) {
    $content = @file_get_contents($url);
    if ($content === FALSE || ($p === "tv" && strpos($content, "sites") === false)) {
        if ($p === "tv") {
            $newUrl = "https://t4vod.hz.cz/api/pz?url=" . urlencode($url); // 对URL进行编码
            $content = @file_get_contents($newUrl);
            if ($content === FALSE || strpos($content, "sites") === false) {
                return false; // 返回false表示获取内容失败
            } else {
                return $content;
            }
        } else {
            return false; // 返回false表示获取内容失败
        }
    } else {
        return $content;
    }
}

function redirectWithIncrementedV($p, $v) {
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';
		$host = $_SERVER['HTTP_HOST'];
		$path = $_SERVER['REQUEST_URI'];
		$fullUrl = $protocol . $host . $path;
		$queryPosition = strpos($fullUrl, '?');
		if ($queryPosition !== false) {
			// 如果有查询字符串，则去掉它
			$cleanUrl = substr($fullUrl, 0, $queryPosition);
		} else {
			// 如果没有查询字符串，则使用完整的URL
			$cleanUrl = $fullUrl;
		}
		// 添加新的查询参数
		$newUrl = $cleanUrl . "?p=" . $_GET['p'] . "&v=" . ($_GET['v'] + 1);
		// 重定向到新的URL
		header("Location: " . $newUrl);
		exit(); // 确保在发送新的头信息后立即退出当前脚本
}

$urls = [
'v4' => [
'1' => 'https://pastebin.com/raw/2HgsFKtT',
'2' => 'https://hfr1107.github.io/up/tv/tv3.txt',
'3' => 'https://pastebin.com/raw/SvZqhpU5',
],
'v6' => [
'1' => 'https://hfr1107.github.io/up/tv/tv.txt',
'2' => 'https://hfr1107.github.io/up/tv/tv1.txt',
'3' => 'https://hfr1107.github.io/up/tv/tv2.txt',
],

'app' => [
'1' => 'https://hfr1107.github.io/up/appmarket/ads.php',
'2' => 'https://hfr1107.github.io/up/appmarket/index.php',
],
'tv' => [
'1' => 'http://饭太硬.top/tv',
'2' => 'https://agit.ai/leevi/PiG/raw/branch/master/jsm.json',
'991' => 'https://hfr1107.github.io/up/tv/1668.json',	
'992' => 'https://hfr1107.github.io/up/tv/1668.json',	
],
'dc' => [
'1' => 'https://hfr1107.github.io/up/tv/dc.json',	
],
];

if (isset($urls[$p]) && isset($urls[$p][$v])) {
    $url = $urls[$p][$v];
    $content = fetchContent($url, $p);
    if ($content !== false) {
        echo $content;
    } else {
        redirectWithIncrementedV($p, $v);
    }
} else {
    echo '未知参数';
}
?>