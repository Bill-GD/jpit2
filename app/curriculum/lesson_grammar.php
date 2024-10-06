<?php
include_once '../helpers/helper.php';
include_once '../helpers/ui.php';

if (!Helper::is_user_logged_in()) {
  header('Location: ..\account\signin.php');
  exit();
}

if (!isset($_GET['i'])) {
  header('Location: lesson_list.php?e=選択したレッスンは無効でした');
  exit();
}
$lesson_id = $_GET['i'];

include_once '../helpers/database_manager.php';
$dm = DatabaseManager::instance();

$lesson_name = $dm->query(
  'SELECT lesson_name from lesson where lesson_id = :lesson_id',
  ['lesson_id' => $lesson_id]
)->fetch(PDO::FETCH_COLUMN);

$vocabs = $dm->query(
  'SELECT * from vocab where lesson_id = :lesson_id',
  ['lesson_id' => $lesson_id]
)->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?= Helper::import_styles() ?>
    <title>第<?= $lesson_id ?>課: 文法 - Probeto</title>
  </head>
  <body>
    <?= UI::navbar() ?>

    <main class="container w-50 mb-5">
      <div class="row mt-7">
        <p class="col-4 fs-5 mt-3 w-100">
          <a class="text-decoration-none link-secondary" href="lesson_list.php">&lArr;</a>
          <?= "第{$lesson_id}課: {$lesson_name}" ?> > 文法
        </p>
      </div>

      <h3 class="text-purple mb-5"><span class="fst-italic">Ngữ pháp</span> - 文法</h3>

      <div class="d-flex mb-5">
        <img src="../../assets/images/lesson/1.png" class="me-3" width="50" height="50">
        <div class="bg-secondary-subtle fs-4 fw-medium rounded px-3 py-2 w-100">
          <span class="fw-bold">Chào</span>
          - ～さん、こんにちは
        </div>
      </div>

      <span class="fs-4">
        Khi bạn muốn chào một người nào đó, bạn dùng từ "chào" và một đại từ nhân xưng ngôi thứ 2 hoặc tên người đó.
      </span>
      <br>
      <span class="fs-5 text-info-emphasis">誰かに挨拶したいときは、「Chào」という言葉と二人称代名詞またはその人の名前を使います。</span>

      <div class="d-flex flex-column align-items-center">
        <div class="text-center border border-3 rounded mt-4 w-75 px-3 py-2">
          <h3 class="text-purple">Chào + đại từ nhân xưng ngôi thứ 2</h3>
          <span>Chào + 二人称代名詞</span>
        </div>
        <span class="fs-4">Ví dụ: Chào anh</span>
        <div class="text-center border border-3 rounded mt-4 w-75 px-3 py-2">
          <h3 class="text-purple">Chào + tên</h3>
          <span>Chào + 名前</span>
        </div>
        <span class="fs-4">Ví dụ: Chào Mai</span>
      </div>

      <span class="fs-4">"Chào" có thể dùng bất kỳ thời gian nào, cả khi tạm biệt.</span>
      <br>
      <span class="fs-5 text-info-emphasis">「Chào」はいつでも、たとえ別れのときでも使えます。</span>
      <br>

      <span class="fs-4">Nếu muốn lịch sự hoặc tôn trọng, thêm "ạ" ở cuối câu.</span>
      <br>
      <span class="fs-5 text-info-emphasis">丁寧または敬意を表したい場合は、文の最後に「ạ」を追加します。</span>
      <h3 class="d-flex justify-content-center text-purple mt-2">(Xin) chào + 人称代名詞 + (ạ)</h3>

      <div class="d-flex mt-6 mb-5">
        <img src="../../assets/images/lesson/2.png" class="me-3" width="50" height="50">
        <div class="bg-secondary-subtle fs-4 fw-medium rounded px-3 py-2 w-100">
          <span class="fw-bold">Đại từ nhân xưng cơ bản</span>
          - 基本的な人称代名詞
        </div>
      </div>

      <div class="border border-3 rounded-4 text-center">
        <table class="table overflow-hidden rounded-4 align-middle">
          <thead>
            <tr>
              <th class="bg-yellow-subtle">
                <span class="fs-4">Ngôi thứ 1</span>
                <br>
                <span class="fw-normal">1人称代名詞</span>
              </th>
              <th class="bg-yellow-subtle">
                <span class="fs-4">Ngôi thứ 2</span>
                <br>
                <span class="fw-normal">2人称代名詞</span>
              </th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th rowspan="6">1</th>
              <td>Mark</td>
            </tr>
            <tr>
              <td>Jacob</td>
            </tr>
            <tr>
              <td>@twitter</td>
            </tr>
          </tbody>
        </table>
      </div>
    </main>
  </body>
</html>