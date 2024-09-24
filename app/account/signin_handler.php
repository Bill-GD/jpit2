<?php
$username = $_POST['username'];
$password = $_POST['password'];

if (empty($username) || empty($password)) {
  header('Location: signin.php?e=全ての項目を入力してください');
  exit();
}

include '../helpers/database_manager.php';

$database_manager = DatabaseManager::instance();

// Kiểm tra xem người dùng có tồn tại trong cơ sở dữ liệu không
$user_data = $database_manager->query(
  'SELECT * FROM `user` WHERE username = :username',
  ['username' => DatabaseManager::mysql_escape($username)]
)->fetch(PDO::FETCH_ASSOC);

if (!$user_data) {
  // Nếu không tìm thấy người dùng
  header('Location: signin.php?e=ユーザー名が見つかりません');
  exit();
}

// Kiểm tra mật khẩu
if (!password_verify($password, $user_data['password'])) {
  // Nếu mật khẩu không khớp
  header('Location: signin.php?e=パスワードが正しくありません');
  exit();
}

// Nếu đăng nhập thành công
// Tạo session hoặc cookie tùy thuộc vào cách bạn quản lý trạng thái người dùng
session_start();
$_SESSION['username'] = $username;

// Chuyển hướng đến trang chính sau khi đăng nhập thành công
header('Location: dashboard.php');
exit();
?>
