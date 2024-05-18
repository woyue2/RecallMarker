<?php
$dir = 'pic'; // 指定要列出内容的目录
$contents = array_diff(scandir($dir), array('.', '..')); // 扫描目录排除.和..

// 准备输出数据
$output = array();
foreach ($contents as $item) {
    $path = $dir . '/' . $item;
    if (is_dir($path)) {
        // 是文件夹
        $output[] = array(
            'type' => 'folder',
            'name' => $item,
        );
    } elseif (preg_match('/\.(png|jpg|jpeg|gif)$/i', $item)) {
        // 是图片文件
        $output[] = array(
            'type' => 'image',
            'name' => $item,
        );
    }
}

// 输出JSON格式数据
echo json_encode($output);
?>