<?php
include_once '../helpers/helper.php';
include_once '../helpers/ui.php';

if (!Helper::is_user_logged_in()) {
  header('Location: ..\account\signin.php');
  exit();
}

$compounds = [
  'ch', 'gh', 'kh', 'ng', 'ngh', 'nh', 'ph', 'th', 'tr', 'gi', 'qu'
];

$images = array_map(fn($c): string => "../../assets/images/compound/{$c}.jpg", $compounds);
natsort($images);

$sounds = array_map(fn($c): string => "{$c}.mp3", $compounds);
if (isset($_GET['s'])) {
  $images = array_reverse($images);
  $compounds = array_reverse($compounds);
  $words = array_reverse($words);
  $sounds = array_reverse($sounds);
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?= Helper::import_styles() ?>
    <title>拗音 - Probeto</title>
  </head>
  <body>
    <?= UI::navbar() ?>

    <main class="container w-75">
      <p class="col-4 fs-2 mt-7 mb-4">拗音</p>

      <?php
      $max = count($compounds);
      for ($i = 0; $i < $max; $i++) {
        if ($i % 3 == 0) {
          echo '<div class="row mb-4 column-gap-5 justify-content-center' . ($i == $max - 1 ? 'justify-content-center' : '') . ' ">';
        }

        echo '
          <div class="col-3 d-flex justify-content-center position-relative border border-dark-subtle rounded-1 p-3">
            <img src="' . $images[$i] . '" width="220" height="220">
            <div class="pt-4 ms-2 position-absolute end-5 bottom-5">
              <div class="text-decoration-none icon-link link-secondary fs-3 mt-5 fa-solid fa-volume-high play-sound" audio-path="compound/' . $sounds[$i] . '"></div>
            </div>
          </div>';

        if ($i % 3 == 2) {
          echo '</div>';
        }
      }
      ?>
    </main>
  </body>
</html>