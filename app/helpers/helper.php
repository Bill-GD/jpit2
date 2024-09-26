<?php
class Helper {
  /**
   * Add stylesheets to the page: bootstrap & custom.
   * To add custom CSS, add to the `/style/styles.css` file.
   * @return string The tags for stylesheets.
   */
  static public function import_styles(): string {
    return '
      <script src="' . self::get_resource_path('/js/bootstrap.bundle.js') . '"></script>
      <link rel="stylesheet" href="' . self::get_resource_path('/css/bootstrap.css') . '">
      <link rel="stylesheet" href="' . self::get_resource_path('/css/styles.css') . '">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    ';
  }

  static function is_user_logged_in(): bool {
    return isset($_COOKIE['is_logged_in']) && $_COOKIE['is_logged_in'] === '1';
  }

  /**
   * Add cookie to the browser for 7 days.
   */
  static function set_cookies(array $cookies): void {
    foreach ($cookies as $key => $value) {
      setcookie($key, $value, time() + 604800, '/');
    }
  }

  static function alert(string $message): void {
    echo "<script>alert('{$message}')</script>";
  }

  static function get_resource_path(string $relative_path): string {
    $relative_path[0] !== '/' ? $relative_path = "/{$relative_path}" : 0;
    return 'http://' . $_SERVER['HTTP_HOST'] . $relative_path;
  }
}