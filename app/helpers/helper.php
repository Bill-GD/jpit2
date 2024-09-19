<?php
class Helper {
  /**
   * Add stylesheets to the page: bootstrap & custom.
   * To add custom CSS, add to the `/style/styles.css` file.
   * @return string The tags for stylesheets.
   */
  static public function import_styles(): string {
    return '
      <link rel="stylesheet" href="' . self::get_resource_path('/style/bootstrap.css') . '">
      <script src="' . self::get_resource_path('/style/bootstrap.bundle.js') . '"></script>
      <link rel="stylesheet" href="' . self::get_resource_path('/style/styles.css') . '">
    ';
  }

  static function get_resource_path(string $relative_path): string {
    $relative_path[0] !== '/' ? $relative_path = "/{$relative_path}" : 0;
    return 'http://' . $_SERVER['HTTP_HOST'] . $relative_path;
  }
}