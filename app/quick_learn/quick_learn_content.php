<?php
include '../helpers/helper.php';
include '../helpers/ui.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <?= Helper::import_styles() ?>
    <title>速習画面の内容 - Probeto</title>
  </head>
  <body class="quick_learn_detail">
    <?= UI::navbar() ?>

    <div class="container">
      <div class="mt-7 mb-4 w-25 m-auto">
        <div class="form-floating position-relative">
          <input type="text" class="form-control rounded-5 border-dark-subtle" id="search" name="search" placeholder=""
            required>
          <label for="search">検索</label>
          <i class="position-absolute end-5 bottom-35 fa-solid fa-search text-grey"></i>
        </div>
      </div>

      <!-- <embed src="../../assets/sounds/subfortopic1/a chao.m4a" type=""> -->

      <section class="grid-container">
        <!-- <div class="grid-item" onclick="playSound('path/to/audio1.mp3')"> -->
        <div class="border border-1 border-dark-subtle rounded-2 py-3 px-4">
          <div class="row flex justify-content-between">
            <div class="col-5">
              <b>文の例 1: こんにちは！</b>
              <div class="ms-5 col-auto">• Xin chào!</div>
            </div>
            <div class="col-6">
              <div class="col-auto h-50"></div>
              <div class="col-auto">• シンチャオ!</div>
            </div>
            <i class="col-1 fs-3 mt-3 fa-solid fa-volume-high"></i>
          </div>
        </div>

        <div class="border border-1 border-dark-subtle rounded-2 mt-4 py-3 px-4">
          <div class="row flex justify-content-between">
            <div class="col-5">
              <b>文の例 2: お元気ですか?！</b>
              <div class="ms-5 col-auto">• Bạn khỏe không?</div>
            </div>
            <div class="col-6">
              <div class="col-auto h-50"></div>
              <div class="col-auto">• パンクエコン?</div>
            </div>
            <i class="col-1 fs-3 mt-3 fa-solid fa-volume-high"></i>
          </div>
        </div>

        <div class="border border-1 border-dark-subtle rounded-2 mt-4 py-3 px-4">
          <div class="row flex justify-content-between">
            <div class="col-5">
              <b>文の例 3: どこから来ましたか?</b>
              <div class="ms-5 col-auto">• Bạn đến từ đâu??</div>
            </div>
            <div class="col-6">
              <div class="col-auto h-50"></div>
              <div class="col-auto">• バンデントゥダ?</div>
            </div>
            <i class="col-1 fs-3 mt-3 fa-solid fa-volume-high"></i>
          </div>
        </div>

        <div class="border border-1 border-dark-subtle rounded-2 mt-4 py-3 px-4">
          <div class="row flex justify-content-between">
            <div class="col-5">
              <b>文の例 4: 私は日本から来ました。</b>
              <div class="ms-5 col-auto">• Tôi đến từ Nhật Bản</div>
            </div>
            <div class="col-6">
              <div class="col-auto h-50"></div>
              <div class="col-auto">• トイデントゥニャットパン</div>
            </div>
            <i class="col-1 fs-3 mt-3 fa-solid fa-volume-high"></i>
          </div>
        </div>

        <div class="border border-1 border-dark-subtle rounded-2 mt-4 py-3 px-4">
          <div class="row flex justify-content-between">
            <div class="col-5">
              <b>文の例 5: もありがとう!</b>
              <div class="ms-5 col-auto">• Cảm ơn!</div>
            </div>
            <div class="col-6">
              <div class="col-auto h-50"></div>
              <div class="col-auto">• カームオン!</div>
            </div>
            <i class="col-1 fs-3 mt-3 fa-solid fa-volume-high"></i>
          </div>
        </div>
      </section>
    </div>

    <script src="script.js"></script>
  </body>
</html>