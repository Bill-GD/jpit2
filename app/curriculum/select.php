<?php
include_once '../helpers/helper.php';
include_once '../helpers/ui.php';

if (!Helper::is_user_logged_in()) {
  header('Location: ..\account\signin.php');
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>カリキュラム - Probeto</title>
    <?= Helper::import_styles() ?>
  </head>
  <body>
    <?= UI::navbar() ?>

    <div class="container d-flex justify-content-center align-items-center vh-100">
      <div class="row column-gap-5">
        <a href="alphabet.php"
          class="col-auto d-flex flex-column justify-content-between align-items-center p-5 card-hover text-decoration-none">
          <img src="../../assets/images/lesson/study_alphabet.png" width="250" class="rounded-3">
          <p class="text-dark fs-5 mt-3">アルファベット</p>
        </a>

        <a href="compound.php"
          class="col-auto d-flex flex-column justify-content-between align-items-center p-5 card-hover text-decoration-none">
          <img src="../../assets/images/compound/ch.jpg" width="250" class="rounded-3">
          <p class="text-dark fs-5 mt-3">拗音</p>
        </a>

        <a href="lesson_list.php"
          class="col-auto d-flex flex-column justify-content-between align-items-center p-5 card-hover text-decoration-none">
          <img src="../../assets/images/lesson/lesson.png" width="250" class="rounded-3">
          <p class="text-dark fs-5 mt-3">レッスン</p>
        </a>
      </div>
    </div>
  </body>
</html>