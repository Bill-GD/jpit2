<?php
include '../helpers/helper.php';
include '../helpers/ui.php';

if (Helper::is_user_logged_in()) {
  header('Location: dashboard.php');
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Probeto - ベトナム語専門家</title>
    <?= Helper::import_styles() ?>
  </head>
  <body>
    <?= UI::navbar(
      other_items: <<<HTML
        <li class="nav-item ms-4 me-3">
          <a href="../account/signin.php" role="button" class="btn btn-outline-dark bg-dark-subtle nav-item">ログイン</a>
        </li>
        <li class="nav-item me-3">
          <a href="../account/signup.php" role="button" class="btn btn-dark nav-item">登録</a>
        </li>
      HTML
    ) ?>
    <div class="container">
      <div class="fs-2">
        <h1>Probeto - よく学び、よく理解し、外国人のためのベトナム語のナンバーワン専門家。</h1>
        <!-- https://depositphotos.com/model/112377272.html -->
        <div class="row flex justify-content-center align-items-center">
          <img class="col-auto" src="../../assets/images/senior-japanese-man-thumbs-up.jpg" width="240" height="160"
            alt="senior-jp-man">
          <p class="col-3">“この詳細なロードマップに従って、私はベトナム語を流暢に話せるようになりました”</p>
          <img class="col-auto" src="../../assets/images/japanese-woman-smiles.jpg" width="136" height="204"
            alt="jp-woman">
          <p class="col-3">“非常に良いルートで、初心者に適しています”</p>
        </div>
        <div class="row flex justify-content-center align-items-center">
          <img class="col-auto" src="../../assets/images/mazda-demio-woman-thumb-up.png" width="136" height="204"
            alt="jp-woman">
          <p class="col-6">“私たちと一緒に試みて成功しましたが、あなたはどうですか？”</p>
        </div>
      </div>

      <div class="row flex justify-content-around mt-5">
        <a class="btn btn-dark px-5 py-3 col-2">早く学ぶ</a>
        <a class="btn btn-dark px-5 py-3 col-2">個性化</a>
        <a class="btn btn-success px-5 py-3 col-2">勉強を続ける</a>
      </div>
    </div>
  </body>
</html>