<?php
include 'helper.php';

class Globals {
  public static string $aiven_username = '';
  public static string $aiven_password = '';

  private static function load_env(): void {
    $env = file('..\..\.env');
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

  public static function init() {
    self::load_env();
    self::$aiven_username = getenv('AIVEN_USERNAME');
    self::$aiven_password = getenv('AIVEN_PASSWORD');
  }
}