<?php
include_once '../helpers/helper.php';
include_once '../helpers/ui.php';

if (!Helper::is_user_logged_in()) {
  header('Location: ..\account\signin.php');
  exit();
}

if (!isset($_GET['i'])) {
  header('Location: lesson_list.php?e=選択したレッスンは無効でした');
  exit();
}
$lesson_id = $_GET['i'];

include_once '../helpers/database_manager.php';
$dm = DatabaseManager::instance();

$lesson_name = $dm->query(
  'SELECT lesson_name from lesson where lesson_id = :lesson_id',
  ['lesson_id' => $lesson_id]
)->fetch(PDO::FETCH_COLUMN);

$vocabs = $dm->query(
  'SELECT * from vocab where lesson_id = :lesson_id',
  ['lesson_id' => $lesson_id]
)->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?= Helper::import_styles() ?>
    <title>第<?= $lesson_id ?>課: 語彙 - Probeto</title>
  </head>
  <body>
    <?= UI::navbar() ?>

    <main class="container">
      <div class="mt-7 mb-4">
        <p class="fs-5 mt-3">
          <a class="text-decoration-none link-secondary" href="lesson_list.php">&lArr;</a>
          <?= "第{$lesson_id}課: {$lesson_name}" ?> > 語彙
        </p>
        <h5>関連する語彙</h5>
      </div>

      <div class="fs-3 text-purple fw-bold">Từ vựng - 言葉</div>

      <div class="border border-2 rounded-3 fs-4 mt-4">
        <?php
        $total = count($vocabs);
        for ($i = 0; $i < $total; $i++) {
          if ($i % 2 == 0) {
            echo '<div class="row justify-content-start mx-0 border-bottom">';
          }
          $border = $i % 2 == 0 ? ' border-end' : '';
          $rounded = $i == 0 ? ' rounded-start-top-3' : ($i == $total - 1 ? ' rounded-start-bottom-3' : '');

          echo '
            <div class="row col-6">
              <p class="col-5 m-0 px-3 py-2 bg-yellow-subtle' . $rounded . '">' . $vocabs[$i]['word'] . '</p>
              <div class="col row' . $border . ' border-start m-0 px-3 py-2">
                <p class="col m-0">' . $vocabs[$i]['meaning'] . '</p>
                <a class="col-auto align-self-center icon-link link-secondary text-decoration-none
                 fs-3 fa-solid fa-volume-high play-sound" audio-path="' . $vocabs[$i]['audio'] . '"></a>
              </div>
            </div>';
          if ($i % 2 == 1) {
            echo '</div>';
          }
        }
        ?>
      </div>
    </main>
  </body>
</html>