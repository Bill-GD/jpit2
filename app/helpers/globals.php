<?php
include_once 'helper.php';

class Globals {
  public static bool $is_dev = true;
  public static string $aiven_username = '';
  public static string $aiven_password = '';
  public static string $google_client_id = '';
  public static string $google_client_secret = '';

  private static function load_env(string $env_path): void {
    $env = file($env_path);
    // $env = explode("\n", $env);
    foreach ($env as $line) {
      $line = trim($line);
      if (empty($line) || $line[0] === '#') {
        continue;
      }
      $line = explode('=', $line);
      putenv("" . trim($line[0]) . "=" . trim($line[1]) . "");
    }
  }

  public static function init(string $env_path): void {
    if (getenv('ENVIROMENT') === false) {
      self::load_env($env_path);
    }
    self::$is_dev = getenv('ENVIROMENT') === 'development';
    self::$aiven_username = getenv('AIVEN_USERNAME');
    self::$aiven_password = getenv('AIVEN_PASSWORD');
    self::$google_client_id = getenv('GOOGLE_CLIENT_ID');
    self::$google_client_secret = getenv('GOOGLE_CLIENT_SECRET');

    // echo '<script>console.log("Globals init with: ' . self::$aiven_username . ' ' . self::$aiven_password . ' ' . self::$google_client_id . ' ' . self::$google_client_secret . '")</script>';
    // error_log("Globals init with: " . self::$aiven_username . " " . self::$aiven_password . " " . self::$google_client_id . " " . self::$google_client_secret);
  }
}