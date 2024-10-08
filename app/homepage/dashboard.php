<?php
include_once '../helpers/helper.php';
include_once '../helpers/ui.php';

if (!Helper::is_user_logged_in()) {
  header('Location: guest.php');
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?= Helper::import_styles() ?>
    <title>Probeto</title>
  </head>
  <body>
    <?= UI::navbar() ?>

    <div class="container mt-7">
      <p class="fs-3">学習の進捗状況:</p>

      <div class="px-5 mx-5 mt-6">
        <p class="fs-3">第1章:</p>
        <div class="my-3 py-5 border-start border-end border-3">
          <div class="container w-50">
            <div class="row flex justify-content-between">
              <i class="col-auto fa-regular fa-flag fs-2"></i>
              <i class="col-auto fa-regular fa-flag fs-2"></i>
              <i class="col-auto fa-regular fa-flag fs-2"></i>
            </div>

            <div class="progress mt-4">
              <div class="progress-bar bg-dark" role="progressbar" style="width: 40%;"></div>
            </div>
          </div>
        </div>
      </div>

      <div class="row flex justify-content-around mt-6 mb-6">
        <a href="../quick_learn/quick_learn_topic.php" class="btn btn-dark px-5 py-3 col-2">早く学ぶ</a>
        <a href="../curriculum/select.php" class="btn btn-success px-5 py-3 col-2">勉強を続ける</a>
        <a href="../personalized/mock_exam.php" class="btn btn-dark px-5 py-3 col-2">個性化</a>
      </div>

      <div class="row flex justify-content-center align-items-center mt-6 pt-5">
        <img class="col-auto" src="../../assets/images/mazda-demio-woman-thumb-up.png" width="90" height="136"
          alt="jp-woman">
        <p class="col-auto fs-3 mt-3">今週は3時間勉強しました。体調を整えてください!</p>
      </div>
    </div>
  </body>
</html>