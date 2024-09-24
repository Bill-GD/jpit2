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

$existing_email_count = $database_manager->query(
  'SELECT email from `user` where email = :email',
  ['email' => DatabaseManager::mysql_escape($email)],
)->fetch(PDO::FETCH_COLUMN);
echo 'Duplicate email: ' . ($existing_email_count == 1 ? 'true' : 'false') . '<br><br>';

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
  'escaped_password: ' . DatabaseManager::mysql_escape($hashed_password) . '<br>';

$username = DatabaseManager::mysql_escape($username);
$email = DatabaseManager::mysql_escape($email);
$hashed_password = DatabaseManager::mysql_escape($hashed_password);


// select coalesce(max(project_id), 0) + 1 from `project` into @next_id;
// set @alter_statement = concat('alter table project auto_increment = ', @next_id);
try {
  $database_manager->query('CALL reset_user_id()');

  // Insert the new user
  $database_manager->query(
    'INSERT INTO `user` (username, email, `password`) VALUES (:username, :email, :password)',
    ['username' => $username, 'email' => $email, 'password' => $hashed_password]
  );

  header('Location: signin.php?s=登録が完了しました');
} catch (\Throwable $th) {
  header('Location: signup.php?e=エラーが発生しました: ' . $th->getMessage());
}
