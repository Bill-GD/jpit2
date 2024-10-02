<?php
include_once '../helpers/helper.php';
include_once '../helpers/ui.php';

if (!isset($_GET['i'])) {
  header('Location: quick_learn_topic.php?e=トピックが無効です。もう一度お試しください。');
  exit;
}

include_once '../helpers/database_manager.php';
$dm = DatabaseManager::instance();

$topic_name = $dm->query(
  'SELECT topic_name from quick_learn_topic where topic_id = :topic_id',
  ['topic_id' => $_GET['i']]
)->fetch()['topic_name'];
$list = $dm->query(
  'SELECT japanese_sentence, vietnamese_sentence, vietnamese_katakana, audio from quick_learn_content where topic_id = :topic_id',
  ['topic_id' => $_GET['i']]
)->fetchAll();
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

    <main class="container">
      <div class="row mt-7 mb-4">
        <p class="col-4 fs-5 mt-3">
          <a class="text-decoration-none link-secondary" href="quick_learn_topic.php">よく使われるフレーズ</a>
          >
          <?= $topic_name ?>
        </p>
        <div class="col-4">
          <div class="form-floating position-relative">
            <input type="text" class="form-control rounded-4 border-dark-subtle" id="search" name="search"
              placeholder="" required>
            <label for="search">検索</label>
            <i class="position-absolute end-5 bottom-35 fa-solid fa-search text-grey"></i>
          </div>
        </div>
      </div>

      <section>
        <?php
        // print_r($list);
        if (count($list) === 0) {
          echo '<p class="fs-5">このトピックにはまだ文がありません。</p>';
        } else {
          for ($i = 0; $i < count($list); $i++) {
            echo '
            <div class="border border-1 border-dark-subtle rounded-2 mb-4 py-3 px-4">
              <div class="row flex justify-content-between">
                <div class="col-5">
                  <b class="fs-5">文の例 ' . ($i + 1) . ': ' . $list[$i]['japanese_sentence'] . '</b>
                  <div class="col-auto ms-5 fs-5">• ' . $list[$i]['vietnamese_sentence'] . '</div>
                </div>
                <div class="col-6">
                  <div class="col-auto h-50"></div>
                  <div class="col-auto">• ' . $list[$i]['vietnamese_katakana'] . '</div>
                </div>
                <a class="col text-decoration-none icon-link link-secondary fs-3 mt-3 fa-solid fa-volume-high play-sound"
                  audio-path="' . $list[$i]['audio'] . '"></a>
              </div>
            </div>
          ';
          }
        }
        ?>
      </section>
    </main>
  </body>
</html>