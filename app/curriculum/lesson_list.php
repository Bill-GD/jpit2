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
  'SELECT lesson_name, thumbnail from lesson'
)->fetchAll(PDO::FETCH_ASSOC);
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
          <div class="form-floating position-relative">
            <input type="text" class="form-control rounded-4 border-dark-subtle" id="search" name="search"
              placeholder="" required>
            <label for="search">検索</label>
            <i class="position-absolute end-5 bottom-35 fa-solid fa-search text-grey"></i>
          </div>
        </div>
      </div>

      <!-- <p class="col-4 fs-5">&larr; コースー覧</p> -->
      <!-- .row>.thumbnail+.col>p.fs-4+.row>.col-auto*5 -->
      <?php
      if (count($lessons) === 0) {
        echo '<p class="fs-5">レッスンがまだありません。</p>';
      } else {
        for ($i = 0; $i < count($lessons); $i++) {
          echo '
          <div class="row mb-4">
            <img class="col-3 me-3 object-fit-contain" height="150" src="../../assets/images/' . $lessons[$i]['thumbnail'] . '">
            <div class="col d-flex flex-column justify-content-between border border-4 rounded-2 px-4 py-3">
              <p class="fs-4 fw-semibold mb-4">第' . ($i + 1) . '課: ' . $lessons[$i]['lesson_name'] . '</p>
              <div class="row justify-content-around">
                <a class="col-2 btn btn-purple rounded-5 px-3 py-2">学校に行く</a>
                <a class="col-2 btn btn-purple rounded-5 px-3 py-2">単語</a>
                <a class="col-2 btn btn-purple rounded-5 px-3 py-2">文法</a>
                <a class="col-2 btn btn-purple rounded-5 px-3 py-2">会話</a>
                <a class="col-2 btn btn-purple rounded-5 px-3 py-2">練習問題</a>
              </div>
            </div>
          </div>';
        }
      }
      ?>
    </main>
  </body>
</html>