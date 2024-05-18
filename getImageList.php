<?php
// getImageList.php
header('Content-Type: application/json');

function listImages($dir) {
    $files = array_diff(scandir($dir), array('.', '..'));
    $images = array_filter($files, function($file) {
        return preg_match('/\.(png)$/', $file);
    });
    return array_values($images); // 重新索引数组
}
$path = isset($_GET['path']) && $_GET['path'] !== '' ? $_GET['path'] : './pic'; // 默认当前目录
echo $path . '<br>';
$fullPath = __DIR__ . '/' . trim($path, '/') . '/';
echo $fullPath . '<br>'; 
if (is_dir($fullPath)) {
    echo json_encode(array('images' => listImages($fullPath)));
} else {
    http_response_code(404);
    echo json_encode(array('error' => 'Directory not found.'));
}
?>