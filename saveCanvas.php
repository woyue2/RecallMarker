<?php
// saveCanvas.php
header('Content-Type: text/plain');

// 确保pic文件夹存在
$targetDir = 'pic/';
if (!is_dir($targetDir)) {
    mkdir($targetDir, 0755, true);
}

// 接收Base64编码的数据
$imageData = $_POST['imageData'];

// 去除"data:image/png;base64,"前缀
$imageData = str_replace('data:image/png;base64,', '', $imageData);
$imageData = str_replace(' ', '+', $imageData);

// 解码Base64数据
$decodedData = base64_decode($imageData);

// 生成唯一的文件名，例如使用时间戳
$filename = $targetDir . time() . '.png';

// 保存文件
if (file_put_contents($filename, $decodedData)) {
    echo '图片已成功保存至' . $filename;
} else {
    echo '保存图片失败';
}
?>  