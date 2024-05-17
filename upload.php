<?php
// 设置上传目录
$targetDir = "uploads/"; // 请确保该目录存在，并有写权限
$targetFile = $targetDir . basename($_FILES["imageFile"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));

// 检查是否是图片
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["imageFile"]["tmp_name"]);
    if($check !== false) {
        echo "文件是一张图片 - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "文件不是一张图片。";
        $uploadOk = 0;
    }
}

// 检查是否已存在同名文件
if (file_exists($targetFile)) {
    echo "文件已存在。";
    $uploadOk = 0;
}

// 根据检查结果执行上传
if ($uploadOk == 0) {
    echo "文件未被上传。";
} else {
    if (move_uploaded_file($_FILES["imageFile"]["tmp_name"], $targetFile)) {
        echo "文件 ". htmlspecialchars( basename( $_FILES["imageFile"]["name"])). " 已成功上传。";
        // 这里还可以添加将文件路径或相关信息保存到数据库的逻辑
    } else {
        echo "文件上传出错。";
    }
}
?>