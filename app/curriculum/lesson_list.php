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

$scores = $dm->query(
  'SELECT lesson_id, test_result from test_result where user_id = :user_id order by lesson_id asc',
  ['user_id' => $_COOKIE['user_id']]
)->fetchAll();

$scores = array_values(array_filter(
  $scores,
  fn($score): bool => in_array($score['lesson_id'], array_column($lessons, 'lesson_id'))
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
          $s = $scores[$i]['test_result'] ?? 0;

          echo '
          <div class="row mb-4">
            <img class="col-3 me-3 object-fit-contain" height="150" src="../../assets/images/' . $lessons[$i]['thumbnail'] . '">
            <div class="col d-flex flex-column justify-content-between border border-4 rounded-2 px-4 py-3">
              <div class="row justify-content-between align-items-center">
                <p class="col fs-4 fw-semibold mb-4">
                第' . $lessons[$i]['lesson_id'] . '課: ' . $lessons[$i]['lesson_name'] .
            '</p>
                <p class="col-auto fs-5">' . $s . '/100</p>
              </div>
              <div class="row justify-content-around">
                <a href="lesson_overview.php?i=' . ($i + 1) . '" class="col-2 btn btn-purple rounded-5 px-3 py-2">概要</a>
                <a class="col-2 btn btn-purple rounded-5 px-3 py-2' . ($i > 1 ? '" href="lesson_vocab.php?i=' . ($i + 1) : ' disabled') . '">語彙</a>
                <a class="col-2 btn btn-purple rounded-5 px-3 py-2' . ($i > 1 ? '" href="lesson_grammar.php?i=' . ($i + 1) : ' disabled') . '">文法</a>
                <a class="col-2 btn btn-purple rounded-5 px-3 py-2' . ($i > 1 ? '" href="lesson_convo.php?i=' . ($i + 1) : ' disabled') . '">会話</a>
                <a href="lesson_test.php?i=' . ($i + 1) . '" class="col-2 btn btn-purple rounded-5 px-3 py-2">練習問題</a>
              </div>
            </div>
          </div>';
        }
      }
      ?>
    </main>
  </body>
</html>