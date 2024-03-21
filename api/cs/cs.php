<?php 
//JSRUN引擎2.0，支持多达30种语言在线运行，全仿真在线交互输入输出。 
// 假设JSON文件名为"data.json"
$jsonFile = "http://饭太硬.top/tv";
 

// 读取文件内容
$jsonData = file_get_contents($jsonFile);
 
// 将JSON字符串转换为PHP对象
$dataObject = json_decode($jsonData);
 
// 使用对象中的数据
print_r($dataObject);
