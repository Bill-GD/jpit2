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
    <title>速習画面の内容 - Probeto</title>
  </head>
  <body>
    <?= UI::navbar() ?>

    <main class="container mt-4">
      <div class="mt-7">
        <p class="fs-5">Home > 個別化</p>
        <p class="fs-2">テストの結果に基づいて、私たちはあなたの学習プランを以下のように提案します</p>
      </div>

      <div class="row mb-4 gap-5">
        <div class="col d-flex flex-column justify-content-start bg-secondary-subtle rounded-2 ps-4 py-3">
          <p class="fs-3 fw-bold">アルファベットと発音に慣れる</p>
          <div class="row d-flex mb-3">
            <p class="col-lg-8 fs-4">ベトナム語のアルファベットを理解し、各文字の発音を確実に把握する。</p>
            <img class="col-lg-4 rounded-4" src="../../assets/images/personalized/weird_a.jpg">
          </div>
          <a class="btn btn-purple align-self-end mt-auto text-white px-4 py-2 rounded-5">詳細</a>
        </div>

        <div class="col d-flex flex-column justify-content-start bg-secondary-subtle rounded-2 ps-4 py-3">
          <p class="fs-3 fw-bold">基本的な語彙と日常会話のフレーズを学 ぶ</p>
          <div class="row d-flex mb-3">
            <p class="col-lg-8 fs-4">基本的な語彙や日常生活でよく使われる会話表現を学ぶ</p>
            <div class="col-lg-4 rounded-4"></div>
          </div>
          <a class="btn btn-purple align-self-end mt-auto text-white px-4 py-2 rounded-5">詳細</a>
        </div>
      </div>
      
      <div class="row mb-4 gap-5">
        <div class="col d-flex flex-column justify-content-start bg-secondary-subtle rounded-2 ps-4 py-3">
          <p class="fs-3 fw-bold">基本的な文法を学ぶ</p>
          <div class="row d-flex mb-3">
            <p class="col-lg-8 fs-4">ベトナム語の基本的な文法構造を理解して適用する</p>
            <img class="col-lg-4 rounded-4" src="../../assets/images/personalized/grammar.png">
          </div>
          <a class="btn btn-purple align-self-end mt-auto text-white px-4 py-2 rounded-5">詳細</a>
        </div>

        <div class="col d-flex flex-column justify-content-start bg-secondary-subtle rounded-2 ps-4 py-3">
          <p class="fs-3 fw-bold">会話や具体的な状況での実践練習を行う</p>
          <div class="row d-flex mb-3">
            <p class="col-lg-8 fs-4">学んだ語彙と文法を具体的な会話の状況に応用する</p>
            <img class="col-lg-4 rounded-4" src="../../assets/images/personalized/practice-makes-perfect-cover.png">
          </div>
          <a class="btn btn-purple align-self-end mt-auto text-white px-4 py-2 rounded-5">詳細</a>
        </div>
      </div>
    </main>
  </body>
</html>