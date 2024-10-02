<?php
include_once '../helpers/helper.php';
include_once '../helpers/ui.php';

if (!Helper::is_user_logged_in()) {
  header('Location: ..\account\signin.php');
  exit();
}

$titles = ['第1課: Bảng chữ cái', '第3課: Tên tôi là Yamada', '第4課: Tôi là giáo viên', '第5課: Anh bao nhiêu tuổi'];
$thumbnails = ['lesson_1/study_alphabet.png', 'lesson_1/greeting.png', 'lesson_1/jikosyoukai_man.png', 'personalized/weird_a.jpg'];
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?= Helper::import_styles() ?>
    <title>カリキュラム - Probeto</title>
  </head>
  <body>
    <?= UI::navbar() ?>

    <main class="container w-60 mt-7">
      <div class="row d-flex justify-content-center mt-7 mb-5">
        <div class="col-5">
          <div class="form-floating position-relative">
            <input type="text" class="form-control rounded-4 border-dark-subtle" id="search" name="search"
              placeholder="" required>
            <label for="search">検索</label>
            <i class="position-absolute end-5 bottom-35 fa-solid fa-search text-grey"></i>
          </div>
        </div>
      </div>

      <!-- <p class="col-4 fs-5">&larr; コースー覧</p> -->

      <!-- .row>.thumbnail+.col>p.fs-4+.row>.col-auto*5 -->
      <?php
      for ($i = 0; $i < count($titles); $i++) {
        echo '
          <div class="row mb-4">
            <img class="col-3 me-3 object-fit-contain" height="150" src="../../assets/images/' . $thumbnails[$i] . '">
            <div class="col d-flex flex-column justify-content-between border border-4 rounded-2 px-4 py-3">
              <p class="fs-4 fw-semibold mb-4">' . $titles[$i] . '</p>
              <div class="row justify-content-around">
                <a class="col-2 btn btn-purple disabled rounded-5 px-3 py-2">学校に行く</a>
                <a class="col-2 btn btn-purple disabled rounded-5 px-3 py-2">単語</a>
                <a class="col-2 btn btn-purple disabled rounded-5 px-3 py-2">文法</a>
                <a class="col-2 btn btn-purple disabled rounded-5 px-3 py-2">会話</a>
                <a class="col-2 btn btn-purple disabled rounded-5 px-3 py-2">練習問題</a>
              </div>
            </div>
          </div>';
      }
      ?>
    </main>
  </body>
</html>