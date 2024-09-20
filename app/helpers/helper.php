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
    ';
  }

  static function get_resource_path(string $relative_path): string {
    $relative_path[0] !== '/' ? $relative_path = "/{$relative_path}" : 0;
    return 'http://' . $_SERVER['HTTP_HOST'] . $relative_path;
  }
}