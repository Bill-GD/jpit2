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

  static function navbar(string $other_items): string {
    // <!-- <img src="logo.png" alt="Logo" class="logo"> -->
    return <<<HTML
    <header class="navbar border border-bottom-2 fixed-top p-2 bg-white">
      <a class="nav-brand fs-4 text-decoration-none text-dark ms-3">Probeto</a>
      <ul class="nav">
        <li class="nav-item"><a class="nav-link text-dark" href="#">個人辞書</a></li>
        <li class="nav-item"><a class="nav-link text-dark" href="#">オープン辞書</a></li>
        <li class="nav-item"><a class="nav-link text-dark" href="#">専門用語</a></li>
        <li class="nav-item"><a class="nav-link text-dark" href="#">よく使われるフレーズ</a></li>
        <li class="nav-item"><a class="nav-link text-dark" href="#">模擬試験</a></li>
        {$other_items}
      </ul>
    </header>
    <div class="mb-6"></div>
    HTML;
  }
}