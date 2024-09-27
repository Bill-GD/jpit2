<?php
include '../helpers/helper.php';
include '../helpers/ui.php';

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
    <title>Document</title>
  </head>
  <body>
    <?= UI::navbar() ?>

    <div class="container">
      <div class="row flex align-items-center justify-content-between mt-7 mb-4 ms-5">
        <p class="col-4 fs-5">アルファベット</p>
        <div class="col-3">
          <div class="form-floating position-relative">
            <input type="text" class="form-control rounded-5 border-dark-subtle" id="search" name="search"
              placeholder="" required>
            <label for="search">検索</label>
            <i class="position-absolute end-5 bottom-35 fa-solid fa-search text-grey"></i>
          </div>
        </div>
        <div class="col-4 row flex justify-content-end">
          <button class="col-auto btn btn-primary me-2" type="submit">a->z</button>
          <button class="col-auto btn btn-primary" type="submit">z->a</button>
        </div>
      </div>
    </div>
    <div class="container w-75">
      <div class="row">
        <div class="col text-decoration-none text-center">
          <div class="row border border-dark-subtle rounded-1 mx-1 my-2 pt-4 px-3">
            <div class="col-auto"><img src="../../assets/images/quick_learn/family.png" width="200" height="200"></div>
            <div class="col-2 flex align-content-center">
              <p class="">dasda</p>
              <p class="">dasda</p>
              <a class="text-decoration-none icon-link icon-link-hover fs-3 mt-3 fa-solid fa-volume-high"
                id="play_sound" href="#"></a>
            </div>
          </div>
        </div>
        <div class="col text-decoration-none text-center">
          <div class="row border border-dark-subtle rounded-1 mx-1 my-2 pt-4 px-3">
            <div class="col-auto"><img src="../../assets/images/quick_learn/family.png" width="200" height="200"></div>
            <div class="col-2 flex align-content-center">
              <p class="">dasda</p>
              <p class="">dasda</p>
              <a class="text-decoration-none icon-link icon-link-hover fs-3 mt-3 fa-solid fa-volume-high"
                id="play_sound" href="#"></a>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col text-decoration-none text-center">
          <div class="row border border-dark-subtle rounded-1 mx-1 my-2 pt-4 px-3">
            <div class="col-auto"><img src="../../assets/images/quick_learn/family.png" width="200" height="200"></div>
            <div class="col-2 flex align-content-center">
              <p class="">dasda</p>
              <p class="">dasda</p>
              <a class="text-decoration-none icon-link icon-link-hover fs-3 mt-3 fa-solid fa-volume-high"
                id="play_sound" href="#"></a>
            </div>
          </div>
        </div>
        <div class="col text-decoration-none text-center">
          <div class="row border border-dark-subtle rounded-1 mx-1 my-2 pt-4 px-3">
            <div class="col-auto"><img src="../../assets/images/quick_learn/family.png" width="200" height="200"></div>
            <div class="col-2 flex align-content-center">
              <p class="">dasda</p>
              <p class="">dasda</p>
              <a class="text-decoration-none icon-link icon-link-hover fs-3 mt-3 fa-solid fa-volume-high"
                id="play_sound" href="#"></a>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col text-decoration-none text-center">
          <div class="row border border-dark-subtle rounded-1 mx-1 my-2 pt-4 px-3">
            <div class="col-auto"><img src="../../assets/images/quick_learn/family.png" width="200" height="200"></div>
            <div class="col-2 flex align-content-center">
              <p class="">dasda</p>
              <p class="">dasda</p>
              <a class="text-decoration-none icon-link icon-link-hover fs-3 mt-3 fa-solid fa-volume-high"
                id="play_sound" href="#"></a>
            </div>
          </div>
        </div>
        <div class="col text-decoration-none text-center">
          <div class="row border border-dark-subtle rounded-1 mx-1 my-2 pt-4 px-3">
            <div class="col-auto"><img src="../../assets/images/quick_learn/family.png" width="200" height="200"></div>
            <div class="col-2 flex align-content-center">
              <p class="">dasda</p>
              <p class="">dasda</p>
              <a class="text-decoration-none icon-link icon-link-hover fs-3 mt-3 fa-solid fa-volume-high"
                id="play_sound" path="" href="#"></a>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
    <script>
      document.getElementById('play_sound').addEventListener('click', function () {
        const audio = new Audio('../../assets/sounds/subfortopic1/a chao.m4a');
        audio.play();
      });
    </script>
  </body>
</html>