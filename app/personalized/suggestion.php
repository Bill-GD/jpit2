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

$score_thresholds = [0, 20, 30, 50, 70, 90, 101];
$titles = [
  'アルファベットと発音に慣れる',
  '複合音とその発音を学ぶ',
  'ベトナム語会話の基本を再学習する',
  '様々なトピックの簡単なベトナム語会話を学ぶ',
  '上級語彙と会話を学ぶ',
  'ベトナム語基礎コースの復習'
];
$desc = [
  'ベトナム語のアルファベットを理解し、各文字の発音を確実に把握する。',
  '一般的に使用されるベトナム語の複合音を理解する。',
  'ベトナム語の挨拶や簡単な会話に関連する語彙と文を学ぶ。',
  '日常生活の様々なトピックに関する基本情報と質問を理解する。',
  '上級の語彙と特定のトピックに関する会話を学ぶ。',
  'ベトナム語の基礎知識を復習し、練習問題を通じて学んだ内容を強化する。'
];
$images = ['personalized/weird_a.jpg', 'compound/ch.jpg', 'lesson/greeting.png', '', '', ''];
$urls = ['alphabet.php', 'compound.php', 'lesson_list.php#1', 'lesson_list.php#5', 'lesson_list.php#20', 'lesson_list.php#40'];
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

      <div class="d-flex flex-row justify-content-center mt-5">
        <?php
        for ($i = 0; $i < count($score_thresholds) - 1; $i++) {
          $image = empty($images[$i])
            ? ''
            : '<img class="col-lg-4 rounded-4" src="../../assets/images/' . $images[$i] . '">';
          if ($test_score >= $score_thresholds[$i] && $test_score < $score_thresholds[$i + 1]) {
            echo '
              <div class="d-flex flex-column justify-content-start bg-secondary-subtle rounded-2 w-50 px-4 py-3">
                <p class="fs-3 fw-bold">' . $titles[$i] . '</p>
                <div class="row d-flex mb-3">
                  <p class="col fs-4">' . $desc[$i] . '</p>
                  ' . $image . '
                </div>
                <a href="../curriculum/' . $urls[$i] . '"
                  class="btn btn-purple align-self-end text-white px-4 py-2 rounded-5">詳細</a>
              </div>';
          }
        }
        ?>
      </div>
    </main>

    <div class="modal fade" id="score-modal" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title"><?= "Level {$level} の模擬試験" ?>の結果</h5>
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