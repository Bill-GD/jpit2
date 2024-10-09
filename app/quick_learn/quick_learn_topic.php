<?php
include_once '../helpers/helper.php';
include_once '../helpers/ui.php';
include_once '../helpers/database_manager.php';

$dm = DatabaseManager::instance();

$topics = $dm->query('SELECT topic_name, image from quick_learn_topic')->fetchAll();
if (isset($_GET['search'])) {
  $topics = array_values(array_filter(
    $topics,
    fn($t): bool => str_contains($t['topic_name'], $_GET['search'])
  ));
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?= Helper::import_styles() ?>
    <title>速習 - Probeto</title>
  </head>
  <body>
    <?= UI::navbar() ?>

    <main class="container">
      <div class="row flex align-items-center mt-7 mb-4">
        <p class="col-4 fs-5">よく使われるフレーズ</p>
        <div class="col-4">
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

      <?php
      if (isset($_GET['e'])) {
        echo UI::alert_danger($_GET['e']);
      }

      echo '<div class="row d-flex row-cols-4 justify-content-center">';
      for ($i = 0; $i < count($topics); $i++): ?>
        <a href="quick_learn_content.php?i=<?= $i + 1 ?>" class="col text-decoration-none text-center">
          <div class="border border-dark-subtle rounded-1 mx-1 my-2 pt-4 px-3">
            <img src="../../assets/images/<?= $topics[$i]['image'] ?>" width="200" height="200">
            <p class="text-dark text-start pt-2 pb-3 ps-4 fs-4"><?= $topics[$i]['topic_name'] ?></p>
          </div>
        </a>
      <?php endfor;
      echo '</div>';
      ?>
    </main>
  </body>
</html>