<?php
include_once '../helpers/helper.php';
include_once '../helpers/ui.php';

if (!Helper::is_user_logged_in()) {
  header('Location: ..\account\signin.php');
  exit();
}

$images = scandir('../../assets/images/alphabet');
natsort($images);
$images = array_values(array_diff($images, ['.', '..']));
$chars = [
  'A', 'Ă', 'Â', 'B', 'C', 'D', 'Đ', 'E', 'Ê', 'G', 'H', 'I', 'K', 'L', 'M', 'N', 'O', 'Ô', 'Ơ', 'P', 'Q', 'R', 'S', 'T', 'U', 'Ư', 'V', 'X', 'Y'
];
$words = [
  '魚', '月', '曇り', '飛行機', 'キツネ', 'ヤギ', '時計', '赤ちゃん', 'カエル', 'パンダ', 'イルカ', 'テレビ', 'サル', '恐竜', '蚊', 'キノコ', '牛', 'くるま', 'アボカド', '宇宙飛行士', '紙扇風機', 'ヘビ', 'ライオン', '潜水艦', 'フクロウ', '羊', 'オウム', '自転車', '看護師',
];
$sounds = array_map(fn($c): string => mb_strtolower($c) . '.mp3', $chars);
if (isset($_GET['s'])) {
  $images = array_reverse($images);
  $chars = array_reverse($chars);
  $words = array_reverse($words);
  $sounds = array_reverse($sounds);
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?= Helper::import_styles() ?>
    <title>アルファベット - Probeto</title>
  </head>
  <body>
    <?= UI::navbar() ?>

    <main class="container w-75 px-5 mb-5">
      <div class="row flex align-items-center justify-content-between mt-7 mb-4">
        <p class="col-4 fs-4">アルファベット</p>
        <div class="col-4 row flex justify-content-end">
          <a href="alphabet.php" class="col-auto btn btn<?= isset($_GET['s']) ? '-outline' : '' ?>-purple me-2">
            A-Zで並べ替え
          </a>
          <a href="?s" class="col-auto btn btn<?= isset($_GET['s']) ? '' : '-outline' ?>-purple">
            Z-Aで並べ替え
          </a>
        </div>
      </div>

      <?php
      echo '<div class="row d-flex row-cols-3 column-gap-5 justify-content-center">';
      for ($i = 0; $i < 29; $i++) {
        echo '
          <div class="col-5 text-decoration-none">
            <div class="row border border-dark-subtle rounded-1 my-2 px-3 py-2">
              <div class="col-auto"><img src="../../assets/images/alphabet/' . $images[$i] . '" width="200" height="200"></div>
              <div class="col-auto pt-4 ms-2">
                <div class="fw-bold fs-3">' . $chars[$i] . '</div>
                <div class="fs-4">' . $words[$i] . '</div>
                <a class="text-decoration-none icon-link link-secondary fs-3 mt-5 fa-solid fa-volume-high play-sound" audio-path="alphabet/' . $sounds[$i] . '"></a>
              </div>
            </div>
          </div>';
      }
      echo '</div>';
      ?>
    </main>
  </body>
</html>