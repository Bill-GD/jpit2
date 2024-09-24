<?php
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

if (empty($username) || empty($email) || empty($password)) {
  header('Location: signup.php?e=全ての項目を入力してください');
  exit();
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  header('Location: signup.php?e=正しいメールアドレスを入力してください');
  exit();
}

include '../helpers/database_manager.php';
$database_manager = DatabaseManager::instance();

$existing_email = $database_manager->query(
  'SELECT email from `user` where email = :email',
  ['email' => DatabaseManager::mysql_escape($email)],
)->fetchAll();

print_r($existing_email);
$existing_email_count = count($existing_email);
echo $existing_email_count;

if ($existing_email_count > 0) {
  header('Location: signup.php?e=このメールアドレスは既に登録されています');
  exit();
}

if (!preg_match('/^(?![@$!%*?&])(?=.*[A-Za-z1-9])(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', $password)) {
  header('Location: signup.php?e=パスワードは 8 文字以上で、少なくとも 1 つの文字、数字、特殊文字を含み、空白を含んではなりません。');
  exit();
}

$hashed_password = password_hash($password, PASSWORD_BCRYPT);

// remove this after testing
echo 'username: ' . $username . '<br>' .
  'email: ' . $email . '<br>' .
  'password: ' . $password . '<br>' .
  'password_hash: ' . $hashed_password . '<br>' .
  'password_verify: ' . password_verify($password, password_hash($password, PASSWORD_BCRYPT)) . '<br>' .
  'escaped_password: ' . DatabaseManager::mysql_escape($hashed_password);

$username = DatabaseManager::mysql_escape($username);
$email = DatabaseManager::mysql_escape($email);
$hashed_password = DatabaseManager::mysql_escape($hashed_password);

$database_manager->query(
  'INSERT INTO `user` (username, email, `password`) VALUES (:username, :email, :password)',
  ['username' => $username, 'email' => $email, 'password' => $hashed_password],
);

header('Location: signin.php?s=登録が完了しました');