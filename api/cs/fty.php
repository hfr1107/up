<?php
// 创建cURL资源
$curl = curl_init();

// 设置URL和其他适当的选项
curl_setopt($curl, CURLOPT_URL, "http://饭太硬.top/tv"); // 替换为你想要抓取的网页URL
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

// 执行请求并获取HTML内容
$html = curl_exec($curl);

// 关闭cURL资源，并释放系统资源
curl_close($curl);

// 创建一个新的DOMDocument对象
$dom = new DOMDocument();

// 加载HTML内容到DOMDocument对象
@$dom->loadHTML($html); // 使用@符号抑制可能的错误消息

// 使用XPath查询来提取你感兴趣的数据
$xpath = new DOMXPath($dom);
$textNodes = $xpath->query('//div[@class="some-class"]/text()'); // 替换为你的XPath查询

// 遍历提取到的文本节点并输出内容
foreach ($textNodes as $node) {
    echo $node->nodeValue . "\n";
}
?><?php
// 创建cURL资源
$curl = curl_init();
 
// 设置URL和其他适当的选项
curl_setopt($curl, CURLOPT_URL, "http://www.example.com");
curl_setopt($curl, CURLOPT_USERAGENT, "My Custom User Agent");
 
// 执行cURL会话
curl_exec($curl);
 
// 关闭cURL资源，并释放系统资源
curl_close($curl);
?>
