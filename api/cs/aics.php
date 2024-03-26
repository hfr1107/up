<?php

$p = isset($_GET['p']) ? $_GET['p'] : '';
$v = isset($_GET['v']) ? $_GET['v'] : '';

function fetchContent($url) {
	$content = @file_get_contents($url); // Suppress errors with @
	if ($content === FALSE) {
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
		//$url = .$url"?p=".$_GET['p']."&v=".($_GET['v']+1);// 要跳转的目标网址
		//header("Location: $url");
		//exit(); // 确保在发送新的头信息后立即退出当前脚本
	}
	return $content;
}

$urls = [
	'live' => [
		'0' => 'https://hfr1107.github.io/up/tv/tv.txt',
		'1' => 'https://hfr1107.github.io/up/tv/tv1.txt',
		'2' => 'https://hfr1107.github.io/up/tv/tv2.txt',
		'3' => 'https://pastebin.com/raw/2HgsFKtT',
		'4' => 'https://hfr1107.github.io/up/tv/tv3.txt',
		'5' => 'https://pastebin.com/raw/SvZqhpU5',
	],
	'app' => [
		'0' => 'https://hfr1107.github.io/up/appmarket/mads.php',
		'1' => 'https://hfr1107.github.io/up/appmarket/ads.php',
		'2' => 'https://hfr1107.github.io/up/appmarket/index.php',
	],
	'tv' => [
		'0' => 'https://hfr1107.github.io/up/dc.json',
		'1' => 'http://饭太硬.top/tv',
		'2' => 'https://t4vod.hz.cz/api/pz?url=http://饭太硬.top/tv',
	],
	'CCTV-13' => [
		'0' => 'http://饭太硬.top/tv',
		'1' => 'http://[2409:8087:1a01:df::4077]/PLTV/88888888/224/3221225812/index.m3u8',
		'2' => 'http://[2409:8087:1a01:df::4077]/ottrrs.hl.chinamobile.com/PLTV/88888888/224/3221226011/index.m3u8',
	],
];

if (isset($urls[$p]) && isset($urls[$p][$v])) {
	$content = fetchContent($urls[$p][$v]);
	echo $content;
} else {
	echo '未知参数';
}
?>
