<?php
include_once "../helpers/helper.php";
include_once "../helpers/ui.php";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <?= Helper::import_styles() ?>
    <title>速習画面の内容 - Probeto</title>
  </head>
  <body class="personalize_study">
    <?= UI::navbar() ?>



    <main class="container mt-4">
      <div class="flex align-items-center mt-7 mb-4">
        <p class="fs-5">Home > 個別化</p>
        <p class="fs-2">テストの結果に基づいて、私たちはあなたの学習プランを以下のように提案します</p>
      </div>
      <div class="row">
        <div class="col-md-6 mb-4">
          <div
            class="border border-1 border-dark-subtle rounded-2 p-3 d-flex justify-content-between align-items-center">
            <div>
              <h3>アルファベットと発音に慣れる</h3>
              <p>ベトナム語のアルファベッ トを理解し、各文字の発音 を確実に把握する。</p>
              <button class="btn btn-primary">Learn</button>
            </div>
            <a href="link-to-resource1.html">
              <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/3a/Cat03.jpg/220px-Cat03.jpg"
                alt="Description of image 1" class="img-fluid item-image" />
            </a>
          </div>
        </div>

        <div class="col-md-6 mb-4">
          <div
            class="border border-1 border-dark-subtle rounded-2 p-3 d-flex justify-content-between align-items-center">
            <div>
              <h3>基本的な語彙と日常会話のフレーズを学 ぶ</h3>
              <p>基本的な語彙や日常生活でよく 使われる会話表現を学ぶ</p>
              <button class="btn btn-primary">Learn</button>
            </div>
            <a href="link-to-resource2.html">
              <img src="path/to/image2.jpg" alt="Description of image 2" class="img-fluid item-image" />
            </a>
          </div>
        </div>

        <div class="col-md-6 mb-4">
          <div
            class="border border-1 border-dark-subtle rounded-2 p-3 d-flex justify-content-between align-items-center">
            <div>
              <h3>基本的な文法を学ぶ</h3>
              <p>ベトナム語の基本的な 文法構造を理解して適用 する</p>
              <button class="btn btn-primary">Learn</button>
            </div>
            <a href="link-to-resource3.html">
              <img src="path/to/image3.jpg" alt="Description of image 3" class="img-fluid item-image" />
            </a>
          </div>
        </div>

        <div class="col-md-6 mb-4">
          <div
            class="border border-1 border-dark-subtle rounded-2 p-3 d-flex justify-content-between align-items-center">
            <div>
              <h3>会話や具体的な状況での実践練習を行う</h3>
              <p>学んだ語彙と文法を具 体的な会話の状況に応 用する</p>
              <button class="btn btn-primary">Learn</button>
            </div>
            <a href="link-to-resource4.html">
              <img src="path/to/image4.jpg" alt="Descriptiona of image 4" class="img-fluid item-image" />
            </a>
          </div>
        </div>
      </div>
    </main>
  </body>
</html>