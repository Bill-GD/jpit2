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

$sentences = $dm->query(
  'SELECT * from lesson_convo where lesson_id = :lesson_id',
  ['lesson_id' => $lesson_id]
)->fetchAll();
$total = count($sentences);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?= Helper::import_styles() ?>
    <title>第<?= $lesson_id ?>課: 会話 - Probeto</title>
  </head>
  <body>
    <?= UI::navbar() ?>

    <main class="container">
      <div class="row mt-7 mb-4">
        <p class="col-4 fs-5 mt-3">
          <a class="text-decoration-none link-secondary" href="lesson_list.php">&lArr;</a>
          <?= "第{$lesson_id}課: {$lesson_name}" ?> > 会話
        </p>
        <h5>会話でしょう！</h5>
      </div>

      <?php if ($total > 0) {
        foreach ($sentences as $sentence): ?>
          <div class="border border-1 border-dark-subtle rounded-2 mb-4 py-3 px-4">
            <div class="row flex justify-content-between">
              <div class="col-5">
                <b class="fs-5">例 <?= $sentence['convo_id'] - $total ?>: <?= $sentence['japanese_sentence'] ?></b>
                <div class="col-auto ms-5 fs-5">• <?= $sentence['vietnamese_sentence'] ?></div>
              </div>
              <div class="col-6">
                <div class="col-auto h-50"></div>
                <div class="col-auto">• <?= $sentence['vietnamese_katakana'] ?></div>
              </div>
              <a class="col text-decoration-none icon-link link-secondary fs-3 mt-3 fa-solid fa-volume-high play-sound"
                audio-path="<?= $sentence['audio'] ?>"></a>
            </div>
          </div>
        <?php endforeach;
      } else { ?>
        <h4 class="text-center">現在コンテンはありません</h4>
      <?php } ?>
    </main>
  </body>
</html>