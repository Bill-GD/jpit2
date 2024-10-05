<?php
include_once '../helpers/helper.php';
include_once '../helpers/ui.php';

if (!Helper::is_user_logged_in()) {
  header('Location: ..\account\signin.php');
  exit();
}

$level = 0;
$test_score = 0;
if (isset($_GET['l'])) {
  $level = $_GET['l'];
}
if (isset($_GET['s'])) {
  $test_score = $_GET['s'];
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
          <a href="../curriculum/alphabet.php" class="btn btn-purple align-self-end mt-auto text-white px-4 py-2 rounded-5">詳細</a>
        </div>

        <div class="col d-flex flex-column justify-content-start bg-secondary-subtle rounded-2 ps-4 py-3">
          <p class="fs-3 fw-bold">基本的な語彙と日常会話のフレーズを学 ぶ</p>
          <div class="row d-flex mb-3">
            <p class="col-lg-8 fs-4">基本的な語彙や日常生活でよく使われる会話表現を学ぶ</p>
            <div class="col-lg-4 rounded-4"></div>
          </div>
          <a href="../quick_learn/quick_learn_topic.php" class="btn btn-purple align-self-end mt-auto text-white px-4 py-2 rounded-5">詳細</a>
        </div>
      </div>

      <div class="row mb-4 gap-5">
        <div class="col d-flex flex-column justify-content-start bg-secondary-subtle rounded-2 ps-4 py-3">
          <p class="fs-3 fw-bold">基本的な文法を学ぶ</p>
          <div class="row d-flex mb-3">
            <p class="col-lg-8 fs-4">ベトナム語の基本的な文法構造を理解して適用する</p>
            <img class="col-lg-4 rounded-4" src="../../assets/images/personalized/grammar.png">
          </div>
          <a href="../curriculum/lesson_list.php" class="btn btn-purple align-self-end mt-auto text-white px-4 py-2 rounded-5">詳細</a>
        </div>

        <div class="col d-flex flex-column justify-content-start bg-secondary-subtle rounded-2 ps-4 py-3">
          <p class="fs-3 fw-bold">会話や具体的な状況での実践練習を行う</p>
          <div class="row d-flex mb-3">
            <p class="col-lg-8 fs-4">学んだ語彙と文法を具体的な会話の状況に応用する</p>
            <img class="col-lg-4 rounded-4" src="../../assets/images/personalized/practice-makes-perfect-cover.png">
          </div>
          <a href="../curriculum/lesson_list.php" class="btn btn-purple align-self-end mt-auto text-white px-4 py-2 rounded-5">詳細</a>
        </div>
      </div>
    </main>

    <div class="modal fade" id="score-modal" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title"><?= "Level {$level} の模擬試験" ?>の結果</h5>
            <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
          </div>
          <div class="modal-body text-center">
            <h5>獲得ポイント</h5>
            <h1 class="fw-bold"><?= $test_score ?></h1>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">OK</button>
          </div>
        </div>
      </div>
    </div>
  </body>
  <script>
    const data = window.location.href.split('?').find(e => e.startsWith('l='));

    if (data) {
      const myModalAlternative = new bootstrap.Modal(document.getElementById('score-modal'), {});
      myModalAlternative.show();
    }
  </script>
</html>