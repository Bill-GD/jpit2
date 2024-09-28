<?php
$email = $_POST['email'];
$password = $_POST['password'];

if (empty($email) || empty($password)) {
  header('Location: signin.php?e=全ての項目を入力してください');
  exit();
}

include_once '../helpers/database_manager.php';

$database_manager = DatabaseManager::instance();

$user_data = $database_manager->query(
  'SELECT * FROM `user` WHERE email = :email',
  ['email' => DatabaseManager::mysql_escape($email)]
)->fetch();

if (!$user_data) {
  header('Location: signin.php?e=このメールアドレスは登録されていません');
  exit();
}

if (!password_verify($password, $user_data['password'])) {
  header('Location: signin.php?e=パスワードが正しくありません');
  exit();
}

Helper::set_cookies([
  'is_logged_in' => true,
  'user_id' => $user_data['user_id'],
  'username' => $user_data['username'],
  'email' => $user_data['email'],
]);

header('Location: ../homepage/dashboard.php');
