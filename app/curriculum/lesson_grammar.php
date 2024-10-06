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
    <title>第<?= $lesson_id ?>課: 文法 - Probeto</title>
  </head>
  <body>
    <?= UI::navbar() ?>

    <main class="container">
      <div class="row mt-7 mb-4">
        <p class="col-4 fs-5 mt-3">
          <a class="text-decoration-none link-secondary" href="lesson_list.php">&lArr;</a>
          <?= "第{$lesson_id}課: {$lesson_name}" ?> > 文法
        </p>
      </div>

      <div class="row">
        <div class="col-md-5">
            <div> 
              <h3>文法 (Ngữ pháp)</h3>
            </div>
            <div class="d-flex align-items-center mb-3">
                <div class="flex-shrink-0">
                  <img src="logo.png" alt="Logo" style="width: 50px; height: 50px;">
                </div>
                <div class="flex-grow-1 ms-3 p-3 rounded" style="background-color: #d9d9d9;">
                  <span class="fw-medium">単語 2</span>
                </div>

          </div>
        </div>

        <!-- Grammar Section -->
        <div class="col-md-7">
            <div>
              <h3>語彙 (Từ vựng)</h3>
            </div>
            <div >
            <div class="border border-2 rounded-3 fs-5 mt-3">
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
              </div>
            </div>';
          if ($i % 2 == 1) {
            echo '</div>';
          }
        }
        ?>
      </div>
        </div>
        </div>
      </div>

    </main>
  </body>
</html>