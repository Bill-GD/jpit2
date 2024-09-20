<?php
class Globals {
  public static string $aiven_username = '';
  public static string $aiven_password = '';

  public static function init() {
    self::$aiven_username = getenv('AIVEN_USERNAME');
    self::$aiven_password = getenv('AIVEN_PASSWORD');
  }
}