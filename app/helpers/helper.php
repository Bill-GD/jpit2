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

  /**
   * Add a container that displays a error message.
   * @param string $error_message
   * @return string The component for the error container.
   */
  static function alert_danger(string $error_message): string {
    return <<<HTML
      <div class="row alert alert-danger border-2 border-danger align-items-center py-3 m-0 mb-2" role="alert">
        <i class="col-auto h-100 mt-1 col-2 text-danger fa-solid fa-triangle-exclamation fs-3"></i>
        <div class="col align-content-center fs-6">$error_message</div>
      </div>
    HTML;
  }

  static function get_resource_path(string $relative_path): string {
    $relative_path[0] !== '/' ? $relative_path = "/{$relative_path}" : 0;
    return 'http://' . $_SERVER['HTTP_HOST'] . $relative_path;
  }
}