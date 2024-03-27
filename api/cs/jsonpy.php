<?php

// 定义一个函数来读取文件内容并解析为数组
function readAndParseFile($filePath) {
    $data = [];
    if (filter_var($filePath, FILTER_VALIDATE_URL)) { // 判断是否是URL
        $content = file_get_contents($filePath);
        if ($content === false) { // file_get_contents失败时返回false
            return $data;
        }
        $data = json_decode($content, true);
    } elseif (file_exists($filePath)) { // 本地文件
        $fileContent = file_get_contents($filePath);
        if ($fileContent === false) { // file_get_contents失败时返回false
            return $data;
        }
        // 判断是JSON文件还是TXT文件
        if (pathinfo($filePath, PATHINFO_EXTENSION) === 'json') {
            $data = json_decode($fileContent, true);
        } elseif (pathinfo($filePath, PATHINFO_EXTENSION) === 'txt') {
            $lines = explode("\n", $fileContent);
            foreach ($lines as $line) {
                $item = json_decode($line, true);
                if ($item) {
                    $data[] = $item;
                }
            }
        }
    }
    return $data;
}

// 要合并的文件列表
$files = [
    'https://agit.ai/n/b/raw/branch/master/o/1.txt',
    'https://agit.ai/n/b/raw/branch/master/o/2.txt',
    'https://agit.ai/n/b/raw/branch/master/o/3.txt',
    'https://agit.ai/n/b/raw/branch/master/o/4.txt',
    'https://agit.ai/n/b/raw/branch/master/o/5.txt',
    'https://agit.ai/n/b/raw/branch/master/o/6.txt'
    // 添加更多文件...
];

// 读取和解析所有文件，并将数据合并到一个数组中
$mergedData = [];
foreach ($files as $file) {
    $dataFromFile = readAndParseFile($file);
    if (!empty($dataFromFile)) { // 如果文件有数据则合并
        $mergedData = array_merge($mergedData, $dataFromFile);
    }
}

// 根据"url"键对数据进行分组，并统计每个"url"出现的次数
$urlCounts = [];
foreach ($mergedData as $item) {
    if (isset($item['url'])) {
        $url = $item['url'];
        if (!isset($urlCounts[$url])) {
            $urlCounts[$url] = 0;
        }
        $urlCounts[$url]++;
    }
}

// 根据"url"出现的次数对数据进行降序排序
$sortedData = [];
foreach ($mergedData as $item) {
    if (isset($item['url']) && isset($urlCounts[$item['url']])) {
        $sortedData[$urlCounts[$item['url']]][] = $item;
    }
}
ksort($sortedData, SORT_NUMERIC); // 按键名（即url出现次数）降序排序
$sortedData = array_merge(...$sortedData); // 合并所有子数组

// 去除重复的"name"键的值
$uniqueNames = [];
$uniqueData = [];
foreach ($sortedData as $item) {
    if (isset($item['url']) && !in_array($item['url'], $uniqueNames)) {
        $uniqueNames[] = $item['url'];
        $uniqueData[] = $item;
    }
}

// 输出最终的结果
echo json_encode($uniqueData, JSON_PRETTY_PRINT);
