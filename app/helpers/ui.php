<?php
class UI {

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

  static function alert_success(string $message): string {
    return <<<HTML
      <div class="row alert alert-success border-2 border-success align-items-center py-3 m-0 mb-2" role="alert">
        <i class="col-auto h-100 mt-1 col-2 text-success fa-solid fa-check fs-3"></i>
        <div class="col align-content-center fs-6">$message</div>
      </div>
    HTML;
  }

  static function navbar(): string {
    // <!-- <img src="logo.png" alt="Logo" class="logo"> -->
    return "
    <header class='navbar border border-bottom-2 fixed-top bg-white p-2'>
      <a href='../../index.php' class='nav-brand fs-4 text-decoration-none text-dark ms-3'>Probeto</a>
      <ul class='nav'>
        <li class='nav-item'><a class='nav-link text-dark' href='#'>個人辞書</a></li>
        <li class='nav-item'><a class='nav-link text-dark' href='#'>オープン辞書</a></li>
        <li class='nav-item'><a class='nav-link text-dark' href='#'>専門用語</a></li>
        <li class='nav-item'><a class='nav-link text-dark' href='../quick_learn/quick_learn_topic.php'>よく使われるフレーズ</a></li>
        <li class='nav-item'><a class='nav-link text-dark' href='#'>模擬試験</a></li>
        <li class='nav-item'><a class='nav-link text-dark' href='../amghep/amghep.php'>amghep</a></li>
        <li class='nav-item'><a class='nav-link text-dark' href='../bangchucai/abc.php'>アルファベット</a></li>"
      . (Helper::is_user_logged_in()
        ? self::account_drop_down()
        : <<<HTML
            <li class="nav-item ms-4 me-3">
              <a href="../account/signin.php" role="button" class="btn btn-outline-dark bg-dark-subtle">ログイン</a>
            </li>
            <li class="nav-item me-3">
              <a href="../account/signup.php" role="button" class="btn btn-dark">登録</a>
            </li>
          HTML) .
      "</ul>
    </header>
    <div class='mb-6'></div>
    ";
  }

  static function account_drop_down(): string {
    return self::dropdown(
      '<img class="rounded-5" src=" . $user_pfp . " width=30, height=30>',
      '',
      [
        '<li class="px-3 py-2">' . $_COOKIE['username'] . '</li>',
        '<li><hr class="dropdown-divider"></li>',
        '<li><a class="dropdown-item disabled" href="#">Profile</a></li>',
        // '<li><a class="dropdown-item disabled" href="#">Settings</a></li>',
        // '<li><a class="dropdown-item" target="blank" href="https://github.com/Bill-GD/jpit2">Source Code</a></li>',
        // '<li><hr class="dropdown-divider"></li>',
        '<li><a class="dropdown-item" href="../account/signout_handler.php">Logout</a></li>',
      ],
      'text-white',
      'nav-link',
    );
  }

  static function dropdown(string $title, string $dropdown_header = '', array $items, string $extra_dropdown_classes = '', string $extra_title_classes = ''): string {
    $dropdown_items = implode(array_map(fn($item) => '<li>' . $item . '</li>', $items));
    return <<<HTML
      <div class="dropdown $extra_dropdown_classes">
        <a class="dropdown-toggle text-decoration-none $extra_title_classes" data-bs-toggle="dropdown" role="button">
          $title
        </a>
        <ul class="dropdown-menu bg-dark-subtle dropdown-menu-end border border-dark-light rounded-1">
          <li>$dropdown_header</li>
          $dropdown_items
        </ul>
      </div>
    HTML;
  }
}