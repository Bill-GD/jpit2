<?php
include '../helpers/helper.php';
include '../helpers/ui.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?= Helper::import_styles() ?>
    <title>速習画面 - Probeto</title>
  </head>
  <body class="quick_learn_detail">
    <?= UI::navbar() ?>

    <div class="row flex align-items-center mt-7 mb-4 ms-5">
      <p class="col-4 fs-5">よく使われるフレーズ</p>
      <div class="col-3">
        <div class="form-floating position-relative">
          <input type="text" class="form-control rounded-4 border-dark-subtle" id="search" name="search" placeholder=""
            required>
          <label for="search">検索</label>
          <i class="position-absolute end-5 bottom-35 fa-solid fa-search text-grey"></i>
        </div>
      </div>
    </div>

    <main class="container">
      <div class="row">
        <a href="quick_learn_content.php" class="col text-decoration-none text-center">
          <div class="border border-dark-subtle rounded-1 mx-1 my-2 pt-4 px-3">
            <img src="../../assets/images/quick_learn/iconhiany.png" width="200" height="200">
            <p class="text-dark pt-2 pb-3 ps-4 text-start">挨拶</p>
          </div>
        </a>
        <a href="" class="col text-decoration-none text-center">
          <div class="border border-dark-subtle rounded-1 mx-1 my-2 pt-4 px-3">
            <img src="../../assets/images/quick_learn/family.png" width="200" height="200">
            <p class="text-dark pt-2 pb-3 ps-4 text-start">家族</p>
          </div>
        </a>
        <a href="" class="col text-decoration-none text-center">
          <div class="border border-dark-subtle rounded-1 mx-1 my-2 pt-4 px-3">
            <img src="../../assets/images/quick_learn/food.png" width="200" height="200">
            <p class="text-dark pt-2 pb-3 ps-4 text-start">食べ物</p>
          </div>
        </a>
        <a href="" class="col text-decoration-none text-center">
          <div class="border border-dark-subtle rounded-1 mx-1 my-2 pt-4 px-3">
            <img src="../../assets/images/quick_learn/health.png" width="200" height="200">
            <p class="text-dark pt-2 pb-3 ps-4 text-start">健康</p>
          </div>
        </a>
      </div>
      <div class="row">
        <a href="" class="col text-decoration-none text-center">
          <div class="border border-dark-subtle rounded-1 mx-1 my-2 pt-4 px-3">
            <img src="../../assets/images/quick_learn/hobby.png" width="200" height="200">
            <p class="text-dark pt-2 pb-3 ps-4 text-start">趣味</p>
          </div>
        </a>
        <a href="" class="col text-decoration-none text-center">
          <div class="border border-dark-subtle rounded-1 mx-1 my-2 pt-4 px-3">
            <img src="../../assets/images/quick_learn/shopping.jpg" width="200" height="200">
            <p class="text-dark pt-2 pb-3 ps-4 text-start">買い物</p>
          </div>
        </a>
        <a href="" class="col text-decoration-none text-center">
          <div class="border border-dark-subtle rounded-1 mx-1 my-2 pt-4 px-3">
            <img src="../../assets/images/quick_learn/travel.png" width="200" height="200">
            <p class="text-dark pt-2 pb-3 ps-4 text-start">旅行</p>
          </div>
        </a>
        <a href="" class="col text-decoration-none text-center">
          <div class="border border-dark-subtle rounded-1 mx-1 my-2 pt-4 px-3">
            <img src="../../assets/images/quick_learn/work.png" width="200" height="200">
            <p class="text-dark pt-2 pb-3 ps-4 text-start">仕事</p>
          </div>
        </a>
      </div>
    </main>
  </body>
</html>