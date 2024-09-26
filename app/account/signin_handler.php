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
)->fetch();
if (!$user_data) {
  header('Location: signin.php?e=このメールアドレスは登録されていません');
  exit();
}

if (!password_verify($password, $user_data['password'])) {
  header('Location: signin.php?e=パスワードが正しくありません');
  exit();
}

include '../helpers/helper.php';
Helper::add_cookie('is_logged_in', 'true');
Helper::add_cookie('user_id', $user_data['user_id']);
Helper::add_cookie('username', $user_data['username']);
Helper::add_cookie('email', $user_data['email']);

header('Location: ../homepage/dashboard.php');
