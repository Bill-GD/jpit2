<?php
include_once '../helpers/helper.php';
include_once '../helpers/ui.php';

if (!Helper::is_user_logged_in()) {
  header('Location: ..\account\signin.php');
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?= Helper::import_styles() ?>
    <title>拗音 - Probeto</title>
  </head>
  <body>
    <?= UI::navbar() ?>

    <div class="container mt-7">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="form-floating position-relative">
            <input type="text" class="form-control rounded-4 border-dark-subtle" id="search" name="search"
              placeholder="検索" required>
            <label for="search">検索</label>
            <i class="position-absolute end-5 bottom-30 fa-solid fa-search text-grey"></i>
          </div>
        </div>
      </div>

      <div class="container w-75">
        拗音
        <div class="row">
          <div class="col text-decoration-none text-center">
            <div class="border border-dark-subtle rounded-1 mx-1 my-2 pt-4 px-3">
              <img src="../../assets/images/quick_learn/iconhiany.png" width="200" height="200">
              <a class="text-decoration-none icon-link link-secondary fs-3 mt-3 fa-solid fa-volume-high play-sound"
                audio-path=""></a>
            </div>
          </div>
          <div class="col text-decoration-none text-center">
            <div class="border border-dark-subtle rounded-1 mx-1 my-2 pt-4 px-3">
              <img src="../../assets/images/quick_learn/iconhiany.png" width="200" height="200">
              <a class="text-decoration-none icon-link link-secondary fs-3 mt-3 fa-solid fa-volume-high play-sound"
                audio-path=""></a>
            </div>
          </div>
          <div class="col text-decoration-none text-center">
            <div class="border border-dark-subtle rounded-1 mx-1 my-2 pt-4 px-3">
              <img src="../../assets/images/quick_learn/iconhiany.png" width="200" height="200">
              <a class="text-decoration-none icon-link link-secondary fs-3 mt-3 fa-solid fa-volume-high play-sound"
                audio-path=""></a>
            </div>
          </div>
        </div>
      </div>
      <div class="container w-75">
        <div class="row">
          <div class="col text-decoration-none text-center">
            <div class="border border-dark-subtle rounded-1 mx-1 my-2 pt-4 px-3">
              <img src="../../assets/images/quick_learn/iconhiany.png" width="200" height="200">
              <a class="text-decoration-none icon-link link-secondary fs-3 mt-3 fa-solid fa-volume-high play-sound"
                audio-path=""></a>
            </div>
          </div>
          <div class="col text-decoration-none text-center">
            <div class="border border-dark-subtle rounded-1 mx-1 my-2 pt-4 px-3">
              <img src="../../assets/images/quick_learn/iconhiany.png" width="200" height="200">
              <a class="text-decoration-none icon-link link-secondary fs-3 mt-3 fa-solid fa-volume-high play-sound"
                audio-path=""></a>
            </div>
          </div>
          <div class="col text-decoration-none text-center">
            <div class="border border-dark-subtle rounded-1 mx-1 my-2 pt-4 px-3">
              <img src="../../assets/images/quick_learn/iconhiany.png" width="200" height="200">
              <a class="text-decoration-none icon-link link-secondary fs-3 mt-3 fa-solid fa-volume-high play-sound"
                audio-path=""></a>
            </div>
          </div>
        </div>
      </div>
  </body>
</html>