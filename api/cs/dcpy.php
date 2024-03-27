

<?php

// 要合并的文件列表
$files = [
    'https://agit.ai/n/b/raw/branch/master/o/1.txt',
    'https://agit.ai/n/b/raw/branch/master/o/2.txt',
    'https://agit.ai/n/b/raw/branch/master/o/3.txt',
    'https://agit.ai/n/b/raw/branch/master/o/4.txt',
    'https://agit.ai/n/b/raw/branch/master/o/5.txt',
    'https://agit.ai/n/b/raw/branch/master/o/6.txt'
];

// 合并后的文件保存路径
$outputFile = 'merged.json';

// 初始化合并后的数据数组
$mergedData = [];

// 遍历文件列表，合并数据
foreach ($files as $file) {
    // 检查文件是否存在
    if (file_exists($file)) {
        // 获取文件扩展名
        $extension = pathinfo($file, PATHINFO_EXTENSION);

        // 根据扩展名选择读取文件的方式
        if ($extension === 'json') {
            // 读取 JSON 文件并解码为数组
            $data = json_decode(file_get_contents($file), true);
        } elseif ($extension === 'txt') {
            // 读取 TXT 文件内容
            $data = file_get_contents($file);
        } else {
            // 不支持的扩展名，跳过该文件
            continue;
        }

        // 将数据合并到总数据中
        if (is_array($data)) {
            $mergedData = array_merge($mergedData, $data);
        } else {
            $mergedData[] = $data;
        }
    }
}

// 将合并后的数据编码为 JSON 并保存到文件
file_put_contents($outputFile, json_encode($mergedData, JSON_PRETTY_PRINT));

echo "合并完成，已保存到文件：$outputFile";

?>
