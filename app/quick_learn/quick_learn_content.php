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
    <title>速習画面の内容 - Probeto</title>
  </head>
  <body>
    <?= UI::navbar() ?>

    <div class="row flex align-items-center mt-7 mb-4 ms-5">
      <p class="col-4 fs-5">よく使われるフレーズ > 挨拶</p>
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
      <section>
        <!-- <div class="grid-item" onclick="playSound('path/to/audio1.mp3')"> -->
        <div class="border border-1 border-dark-subtle rounded-2 py-3 px-4">
          <div class="row flex justify-content-between">
            <div class="col-5">
              <b class="fs-5">文の例 1: こんにちは！</b>
              <div class="col-auto ms-5 fs-5">• Xin chào!</div>
            </div>
            <div class="col-6">
              <div class="col-auto h-50"></div>
              <div class="col-auto">• シンチャオ!</div>
            </div>
            <a class="col-1 text-decoration-none icon-link link-secondary fs-3 mt-3 fa-solid fa-volume-high play-sound"
              audio-path="subfortopic1/a chao.m4a"></a>
          </div>
        </div>

        <div class="border border-1 border-dark-subtle rounded-2 mt-4 py-3 px-4">
          <div class="row flex justify-content-between">
            <div class="col-5">
              <b class="fs-5">文の例 2: お元気ですか?！</b>
              <div class="col-auto ms-5 fs-5">• Bạn khỏe không?</div>
            </div>
            <div class="col-6">
              <div class="col-auto h-50"></div>
              <div class="col-auto">• パンクエコン?</div>
            </div>
            <a class="col-1 text-decoration-none icon-link link-secondary fs-3 mt-3 fa-solid fa-volume-high play-sound"
              audio-path="subfortopic1/a chao.m4a"></a>
          </div>
        </div>

        <div class="border border-1 border-dark-subtle rounded-2 mt-4 py-3 px-4">
          <div class="row flex justify-content-between">
            <div class="col-5">
              <b class="fs-5">文の例 3: どこから来ましたか?</b>
              <div class="col-auto ms-5 fs-5">• Bạn đến từ đâu??</div>
            </div>
            <div class="col-6">
              <div class="col-auto h-50"></div>
              <div class="col-auto">• バンデントゥダ?</div>
            </div>
            <a class="col-1 text-decoration-none icon-link link-secondary fs-3 mt-3 fa-solid fa-volume-high play-sound"
              audio-path="subfortopic1/a chao.m4a"></a>
          </div>
        </div>

        <div class="border border-1 border-dark-subtle rounded-2 mt-4 py-3 px-4">
          <div class="row flex justify-content-between">
            <div class="col-5">
              <b class="fs-5">文の例 4: 私は日本から来ました。</b>
              <div class="col-auto ms-5 fs-5">• Tôi đến từ Nhật Bản</div>
            </div>
            <div class="col-6">
              <div class="col-auto h-50"></div>
              <div class="col-auto">• トイデントゥニャットパン</div>
            </div>
            <a class="col-1 text-decoration-none icon-link link-secondary fs-3 mt-3 fa-solid fa-volume-high play-sound"
              audio-path="subfortopic1/a chao.m4a"></a>
          </div>
        </div>

        <div class="border border-1 border-dark-subtle rounded-2 mt-4 py-3 px-4">
          <div class="row flex justify-content-between">
            <div class="col-5">
              <b class="fs-5">文の例 5: もありがとう!</b>
              <div class="col-auto ms-5 fs-5">• Cảm ơn!</div>
            </div>
            <div class="col-6">
              <div class="col-auto h-50"></div>
              <div class="col-auto">• カームオン!</div>
            </div>
            <a class="col-1 text-decoration-none icon-link link-secondary fs-3 mt-3 fa-solid fa-volume-high play-sound"
              audio-path="subfortopic1/a chao.m4a"></a>
          </div>
        </div>
      </section>
    </main>
  </body>
</html>