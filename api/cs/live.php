//代码1单直播源检测

<?php
// 假设你通过GET参数获取网址
$url = $_GET['url'] ?? '';

function isLiveStream($streamUrl) {
    // 使用shell命令ffprobe检测流
    $command = "ffprobe -v error -show_format -i {$streamUrl} -f null /dev/null 2>&1";
    $result = shell_exec($command);
 
    // 检查ffprobe的输出来判断流是否活跃
    if (strpos($result, 'No such file or directory') !== false) {
        // 流不存在或者URL无效
        return false;
    } elseif (strpos($result, 'Connection refused') !== false) {
        // 服务器拒绝连接
        return false;
    } elseif (strpos($result, 'Connection timed out') !== false) {
        // 连接超时，可能是网络问题
        return false;
    } elseif (strpos($result, 'Protocol not found') !== false) {
        // 无法识别的流协议
        return false;
    } else {
        // 流应该是活跃的
        return true;
    }
}
 
// 测试直播源
$streamUrl = $url;
if (isLiveStream($streamUrl)) {
    // 如果是有效的网址，则重定向
    header("Location: $url");
} else {
    echo "直播源无效";
}
?>




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

<?php

$p = isset($_GET['p']) ? $_GET['p'] : '';
$v = isset($_GET['v']) ? $_GET['v'] : '';

function isLiveStreaming($streamUrl) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $streamUrl);
    curl_setopt($ch, CURLOPT_HEADER, 1);
    curl_setopt($ch, CURLOPT_NOBODY, 1); // 不需要body
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
 
    // 通常直播源会返回200或206，而非直播或VOD视频会返回404或者302等
    return $httpCode >= 200 && $httpCode < 303;
}
 
// 示例使用YouTube直播URL
$youtubeLiveStreamUrl = . $_GET['p']; // 替换为你的直播源URL
if (isLiveStreaming($youtubeLiveStreamUrl)) {
    echo "直播正在进行中。";
} else {
    echo "直播不在线。";
}
