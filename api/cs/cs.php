<?php 
//JSRUN引擎2.0，支持多达30种语言在线运行，全仿真在线交互输入输出。 
// 假设JSON文件名为"data.json"
<?php
echo "跳转前的代码内容";
 
// 页面跳转
header("Location:https://xn--sss604efuw.top/tv");
exit; // 确保之后的代码不会执行


$jsonFile = "https://xn--sss604efuw.top/tv";
 

// 读取文件内容
$jsonData = file_get_contents($jsonFile);

// 读取文件内容
$jsonData = file_get_contents($jsonFile);

echo $jsonData;
// 将JSON字符串转换为PHP数组
$dataArray = json_decode($jsonData, true);
 
// 使用数组中的数据
print_r($dataArray);

$jsonFile = "https://xn--sss604efuw.top/tv";

// 将JSON字符串转换为PHP对象
$dataObject = json_decode($jsonData);
 
// 使用对象中的数据
print_r($dataObject);
 
// 使用正则表达式匹配隐藏的JSON数据
preg_match_all('/<!--([^{}]*?)-->/', "https://xn--sss604efuw.top/tv", $matches);
 
// 提取并解码JSON数据
$jsonData = array_map(function($match) {
    return json_decode($match, true);
}, $matches[1]);
 
// 输出结果
print_r($jsonData);

// 读取文件内容
$jsonData = file_get_contents($jsonFile);

echo $jsonData;


