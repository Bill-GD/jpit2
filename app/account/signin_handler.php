<?php
$email = $_POST['email'];
$password = $_POST['password'];

if (empty($email) || empty($password)) {
  header('Location: signin.php?e=全ての項目を入力してください');
  exit();
}

include '../helpers/database_manager.php';

$database_manager = DatabaseManager::instance();

$user_data = $database_manager->query(
  'SELECT * FROM `user` WHERE email = :email',
  ['email' => DatabaseManager::mysql_escape($email)]
)->fetch(PDO::FETCH_ASSOC);

if (!$user_data) {
  header('Location: signin.php?e=メールアドレスが正しくありません');
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
// session_start();
// $_SESSION['email'] = $email;

// Chuyển hướng đến trang chính sau khi đăng nhập thành công
header('Location: dashboard.php');
