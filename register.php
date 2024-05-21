<?php
require_once 'config.php';

// // 创建连接
// $conn = new mysqli($servername, $username, $password, $database);

// // 检查连接
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }

// 获取表单数据
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

// // 验证表单数据
// if (empty($username) || empty($email) || empty($password)) {
//     echo "所有字段都是必填的!";
//     exit;
// }

// // 插入数据到数据库
// $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
// if ($conn->query($sql) === TRUE) {
//     echo "注册成功!";
// } else {
//     echo "错误: " . $sql . "<br>" . $conn->error;
// }

// $conn->close();
?>