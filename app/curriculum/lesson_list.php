<?php
include_once '../helpers/helper.php';
include_once '../helpers/ui.php';

if (!Helper::is_user_logged_in()) {
  header('Location: ..\account\signin.php');
  exit();
}

include_once '../helpers/database_manager.php';
$dm = DatabaseManager::instance();

$lessons = $dm->query(
  'SELECT lesson_id, lesson_name, thumbnail from lesson'
)->fetchAll();

if (isset($_GET['search'])) {
  $lessons = array_values(array_filter(
    $lessons,
    fn($l) => str_contains(
      mb_strtolower($l['lesson_name']),
      mb_strtolower($_GET['search'])
    )
  ));
}

$test_lesson_id = 0;
$test_score = 0;
if (isset($_GET['d'])) {
  $data = explode('-', $_GET['d']);
  $test_lesson_id = $data[0];
  $test_score = $data[1];
}

$scores = $dm->query(
  'SELECT lesson_id, test_result from test_result where user_id = :user_id order by lesson_id asc',
  ['user_id' => $_COOKIE['user_id']]
)->fetchAll();

$scores = array_values(array_filter(
  $scores,
  fn($s): bool => in_array($s['lesson_id'], array_column($lessons, 'lesson_id'))
));
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?= Helper::import_styles() ?>
    <title>カリキュラム - Probeto</title>
  </head>
  <body>
    <?= UI::navbar() ?>

    <main class="container w-60 mt-7">
      <div class="row d-flex justify-content-center mt-7 mb-5">
        <div class="col-5">
          <form action="" method="get">
            <div class="form-floating position-relative">
              <input type="text" class="form-control rounded-4 border-dark-subtle" id="search" name="search"
                placeholder="" required>
              <label for="search">検索</label>
              <i class="position-absolute end-5 bottom-35 fa-solid fa-search text-grey"></i>
            </div>
          </form>
        </div>
      </div>

      <!-- <p class="col-4 fs-5">&larr; コースー覧</p> -->
      <!-- .row>.thumbnail+.col>p.fs-4+.row>.col-auto*5 -->
      <?php
      if (isset($_GET['e'])) {
        echo UI::alert_danger($_GET['e']);
      }

      if (count($lessons) === 0) {
        echo '<p class="fs-5">レッスンがまだありません。</p>';
      } else {
        for ($i = 0; $i < count($lessons); $i++) {
          $prev = 100;
          if ($i > 0) {
            $prev = $scores[$i - 1]['test_result'] ?? 0;
          }
          $s = $scores[$i]['test_result'] ?? 0;

          $unlocked = $prev >= 50;

          echo '
          <div class="row mb-4"' . (!$unlocked ? ' title="前のレッスンで50点以上を取得してロックを解除"' : '') . '>
            <img class="col-3 me-3 object-fit-contain" height="150" src="../../assets/images/' . $lessons[$i]['thumbnail'] . '">
            <div class="col d-flex flex-column justify-content-between border border-4 rounded-2 px-4 py-3">
              <div class="row justify-content-between align-items-center">
                <p class="col fs-4 fw-semibold mb-4">第' . $lessons[$i]['lesson_id'] . '課: ' . $lessons[$i]['lesson_name'] . '</p>
                <p class="col-auto fs-5">' . $s . '/100</p>
              </div>
              <div class="row justify-content-around">
                <a class="col-2 btn btn-purple rounded-5 px-3 py-2' . ($unlocked ? '" href="lesson_overview.php?i=' . ($i + 1) : ' disabled') . '">概要</a>
                <a class="col-2 btn btn-purple rounded-5 px-3 py-2' . ($unlocked ? '" href="lesson_vocab.php?i=' . ($i + 1) : ' disabled') . '">語彙</a>
                <a class="col-2 btn btn-purple rounded-5 px-3 py-2' . ($unlocked ? '" href="lesson_grammar.php?i=' . ($i + 1) : ' disabled') . '">文法</a>
                <a class="col-2 btn btn-purple rounded-5 px-3 py-2' . ($unlocked ? '" href="lesson_convo.php?i=' . ($i + 1) : ' disabled') . '">会話</a>
                <a class="col-2 btn btn-purple rounded-5 px-3 py-2' . ($unlocked ? '" href="lesson_test.php?i=' . ($i + 1) : ' disabled') . '">練習問題</a>
              </div>
            </div>
          </div>';
        }
      }
      ?>

      <div class="modal fade" id="score-modal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"><?= "第{$test_lesson_id}課" ?>のテスト結果</h5>
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
    </main>
  </body>
  <script>
    const data = window.location.href.split('?').find(e => e.startsWith('d='));

    if (data) {
      const myModalAlternative = new bootstrap.Modal(document.getElementById('score-modal'), {});
      myModalAlternative.show();
    }
  </script>
</html>