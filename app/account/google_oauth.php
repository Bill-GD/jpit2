<?php
echo 'Hey there :)';

include_once '../helpers/globals.php';

if (empty(Globals::$google_client_id) || empty(Globals::$google_client_secret)) {
  Globals::init('../../.env');
}

$google_oauth_redirect_uri = Globals::$is_dev
  ? 'http://localhost:8000/app/account/google_oauth.php'
  : 'https://bill-gd-probeto.koyeb.app/app/account/google_oauth.php';
$google_oauth_version = 'v3';

assert(Globals::$aiven_username !== '', 'Aiven username is empty');
assert(Globals::$google_client_id !== '', 'Google client id is empty');

// request info with code
if (isset($_GET['code']) && !empty($_GET['code'])) {
  $params = [
    'code' => $_GET['code'],
    'client_id' => Globals::$google_client_id,
    'client_secret' => Globals::$google_client_secret,
    'redirect_uri' => $google_oauth_redirect_uri,
    'grant_type' => 'authorization_code'
  ];

  // get access token
  $ch = curl_init();

  curl_setopt($ch, CURLOPT_URL, 'https://accounts.google.com/o/oauth2/token');
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

  $response = curl_exec($ch);
  curl_close($ch);

  $response = json_decode($response, true);

  if (!isset($response['access_token']) || empty($response['access_token'])) {
    // exit('Invalid access token! Please try again later!');
    header('Location: signin.php?e=無効なアクセストークンです！後でもう一度お試しください！');
    exit;
  }

  foreach ($response as $key => $value) {
    echo "<p>{$key}: {$value}</p>";
  }
  $token = $response['access_token'];

  // get profile information
  $ch = curl_init();

  curl_setopt($ch, CURLOPT_URL, "https://www.googleapis.com/oauth2/{$google_oauth_version}/userinfo");
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_HTTPHEADER, ['Authorization: Bearer ' . $response['access_token']]);

  $response = curl_exec($ch);
  curl_close($ch);
  $profile = json_decode($response, true);

  if (!isset($profile['email'])) {
    // header('Could not retrieve profile information! Please try again later!');
    header('Location: signin.php?e=プロファイル情報を取得できませんでした！後でもう一度お試しください！');
    exit;
  }

  foreach ($profile as $key => $value) {
    echo "<p>{$key}: {$value}</p>";
  }

  include_once '../helpers/database_manager.php';
  $dm = DatabaseManager::instance();

  $email = DatabaseManager::mysql_escape($profile['email']);
  $name = DatabaseManager::mysql_escape($profile['name']);

  $user_data = $dm->query(
    'SELECT * FROM `user` WHERE email = :email',
    ['email' => $email]
  )->fetch();

  if ($user_data) {
    if (!password_verify($email, $user_data['password'])) {
      header('Location: signin.php?e=パスワードが正しくありません。これは発生しないはずです。開発者に連絡してください。');
      exit();
    }
  } else {
    $hashed_password = password_hash($profile['email'], PASSWORD_BCRYPT);
    $hashed_password = DatabaseManager::mysql_escape($hashed_password);
    $token = DatabaseManager::mysql_escape($token);

    $dm->query('CALL reset_user_id()');
    $dm->query(
      'INSERT INTO `user` (username, email, `password`, access_token) VALUES (:username, :email, :password, :access_token)',
      [
        'username' => $name,
        'email' => $email,
        'password' => $hashed_password,
        'access_token' => $token,
      ],
    );
  }

  $user_data = $dm->query(
    'SELECT user_id FROM `user` WHERE email = :email',
    ['email' => $email]
  )->fetch();

  Helper::set_cookies([
    'is_logged_in' => true,
    'user_id' => $user_data['user_id'],
    'username' => $name,
    'email' => $email,
  ]);

  header('Location: ../homepage/dashboard.php');
  exit;
}

// initial request for code to authorize
$params = [
  'response_type' => 'code',
  'client_id' => Globals::$google_client_id,
  'redirect_uri' => $google_oauth_redirect_uri,
  'scope' => 'https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/userinfo.profile',
  'access_type' => 'offline',
  'prompt' => 'consent'
];

// echo "<script>console.log(" . json_encode($params) . ")</script>";
header('Location: https://accounts.google.com/o/oauth2/auth?' . http_build_query($params));
