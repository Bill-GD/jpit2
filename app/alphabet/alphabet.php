<?php
include '../helpers/helper.php';
include '../helpers/ui.php';

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
if (isset($_GET['s'])) {
  $images = array_reverse($images);
  $chars = array_reverse($chars);
  $words = array_reverse($words);
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
    <div class="container">
      <div class="row flex align-items-center justify-content-between mt-7 mb-4">
        <p class="col-4 fs-4">アルファベット</p>
        <div class="col-4">
          <div class="form-floating position-relative">
            <input type="text" class="form-control rounded-4 border-dark-subtle" id="search" name="search"
              placeholder="" required>
            <label for="search">検索</label>
            <i class="position-absolute end-5 bottom-35 fa-solid fa-search text-grey"></i>
          </div>
        </div>
        <div class="col-4 row flex justify-content-end">
          <a href="alphabet.php" class="col-auto btn btn-primary me-2">a->z</a>
          <a href="?s" class="col-auto btn btn-primary">z->a</a>
        </div>
      </div>
    </div>

    <div class="container w-75 mb-5">
      <?php
      for ($i = 0; $i < 29; $i++) {
        if ($i == 0 || ($i > 1 && $i % 2 == 0)) {
          echo '<div class="row column-gap-5 ' . ($i == 28 ? 'justify-content-center' : '') . ' ">';
        }

        echo '
          <div class="col' . ($i == 28 ? '-6' : '') . ' text-decoration-none text-center">
            <div class="row border border-dark-subtle rounded-1 my-2 px-3">
              <div class="col-auto"><img src="../../assets/images/alphabet/' . $images[$i] . '" width="200" height="200"></div>
              <div class="col-2 pt-4">
                <p class="fw-bold fs-4">' . $chars[$i] . '</p>
                <p>'. $words[$i] . '</p>
                <a class="text-decoration-none icon-link link-secondary fs-3 mt-4 fa-solid fa-volume-high" id="play_sound"></a>
              </div>
            </div>
          </div>';

        if ($i % 2 != 0 && $i > 0) {
          echo '</div>';
        }
      }
      ?>
    </div>
    <script>
      document.getElementById('play_sound').addEventListener('click', function () {
        const audio = new Audio('../../assets/sounds/subfortopic1/a chao.m4a');
        audio.play();
      });
    </script>
  </body>
</html>