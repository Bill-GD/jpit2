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
    <?= Helper::import_styles() ?>
    <title>模擬試験 - Probeto</title>
  </head>
  <body>
    <?= UI::navbar() ?>

    <main class="container mt-7">
      <?php 
      if (isset($_GET['e'])) {
        echo UI::alert_danger($_GET['e']);
      }
      ?>

      <div class="row gap-5 justify-content-start m-0 mt-3">
        <a href="mock_test.php?l=1" class="col-auto d-flex flex-column justify-content-between border rounded-3 text-decoration-none">
          <img src="../../assets/images/personalized/certified-stamp.png" width="250" class="p-4">
          <div class="text-dark fs-5 pb-4 ps-3">
            Level 1<br>
            <b>A1 (1.0 ~ 1.5)</b>
          </div>
        </a>

        <a href="" class="col-auto d-flex flex-column justify-content-between border rounded-3 text-decoration-none">
          <img src="../../assets/images/personalized/certified-stamp.png" width="250" class="p-4">
          <div class="text-dark fs-5 pb-4 ps-3">
            Level 2<br>
            <b>A2 (2.0 ~ 3.5)</b>
          </div>
        </a>

        <a href="" class="col-auto d-flex flex-column justify-content-between border rounded-3 text-decoration-none">
          <img src="../../assets/images/personalized/certified-stamp.png" width="250" class="p-4">
          <div class="text-dark fs-5 pb-4 ps-3">
            Level 3<br>
            <b>B1 (4.0 ~ 5.5)</b>
          </div>
        </a>

        <a href="" class="col-auto d-flex flex-column justify-content-between border rounded-3 text-decoration-none">
          <img src="../../assets/images/personalized/certified-stamp.png" width="250" class="p-4">
          <div class="text-dark fs-5 pb-4 ps-3">
            Level 4<br>
            <b>B2 (6.0 ~ 7.0)</b>
          </div>
        </a>

        <a href="" class="col-auto d-flex flex-column justify-content-between border rounded-3 text-decoration-none">
          <img src="../../assets/images/personalized/certified-stamp.png" width="250" class="p-4">
          <div class="text-dark fs-5 pb-4 ps-3">
            Level 5<br>
            <b>C1 (7.5 ~ 8.5)</b>
          </div>
        </a>

        <a href="" class="col-auto d-flex flex-column justify-content-between border rounded-3 text-decoration-none">
          <img src="../../assets/images/personalized/certified-stamp.png" width="250" class="p-4">
          <div class="text-dark fs54 pb-4 ps-3">
            Level 6<br>
            <b>C2 (9.0 ~ 10)</b>
          </div>
        </a>
      </div>
    </main>
  </body>
</html>