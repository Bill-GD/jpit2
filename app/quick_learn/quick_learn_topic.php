<?php
include_once '../helpers/helper.php';
include_once '../helpers/ui.php';
include_once '../helpers/database_manager.php';

$dm = DatabaseManager::instance();

$topics = $dm->query('SELECT topic_name from quick_learn_topic')->fetchAll(PDO::FETCH_COLUMN);
$images = [
  'quick_learn/iconhiany.png', 'quick_learn/family.png',
  'quick_learn/food.png', 'quick_learn/health.png',
  'quick_learn/hobby.png', 'quick_learn/shopping.jpg',
  'quick_learn/travel.png', 'quick_learn/work.jpg',
];
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?= Helper::import_styles() ?>
    <title>速習画面 - Probeto</title>
  </head>
  <body>
    <?= UI::navbar() ?>

    <div class="row flex align-items-center mt-7 mb-4 ms-5">
      <p class="col-4 fs-5">よく使われるフレーズ</p>
      <div class="col-3">
        <div class="form-floating position-relative">
          <input type="text" class="form-control rounded-4 border-dark-subtle" id="search" name="search" placeholder=""
            required>
          <label for="search">検索</label>
          <i class="position-absolute end-5 bottom-35 fa-solid fa-search text-grey"></i>
        </div>
      </div>
    </div>

    <main class="container">
      <?php
      if (isset($_GET['e'])) {
        echo UI::alert_danger($_GET['e']);
      }
      ?>
      <?php
      echo '<div class="row d-flex row-cols-4 justify-content-center">';
      for ($i = 0; $i < count($topics); $i++) {
        echo '
          <a href="quick_learn_content.php?i=' . $i + 1 . '" class="col text-decoration-none text-center">
            <div class="border border-dark-subtle rounded-1 mx-1 my-2 pt-4 px-3">
              <img src="../../assets/images/' . $images[$i] . '" width="200" height="200">
              <p class="text-dark text-start pt-2 pb-3 ps-4 fs-4">' . $topics[$i] . '</p>
            </div>
          </a>';
      }
      echo '</div>';
      ?>
    </main>
  </body>
</html>