<?php
include_once '../helpers/helper.php';
include_once '../helpers/ui.php';

if (!Helper::is_user_logged_in()) {
  header('Location: ..\account\signin.php');
  exit();
}

if (!isset($_GET['l'])) {
  header('Location: mock_exam.php?e=選択した模擬試験は利用できません');
  exit();
}
$level = $_GET['l'];

include_once '../helpers/database_manager.php';
$dm = DatabaseManager::instance();

$questions = $dm->query(
  'SELECT * from mock_test_question where level = :level',
  ['level' => $level]
)->fetchAll();
shuffle($questions);

$answers = [];
foreach ($questions as $q) {
  $answers = array_merge($answers, $dm->query(
    'SELECT * from mock_test_choice where question_id = :question_id',
    ['question_id' => $q['question_id']]
  )->fetchAll());
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?= Helper::import_styles() ?>
    <title>模擬試験: Level <?= $level ?> - Probeto</title>
  </head>
  <body>
    <?= UI::navbar() ?>

    <main class="container mb-7">
      <div class="mt-7 mb-4">
        <p class="fs-5 mt-3">
          <a class="text-decoration-none link-secondary" href="mock_exam.php">&lArr;</a>
          <?= "Level {$level} > 試験" ?>
        </p>
      </div>

      <?php
      for ($i = 0; $i < count($questions); $i++) {
        $q = $questions[$i];
        $choices = array_values(array_filter(
          $answers,
          fn($a): bool => $a['question_id'] == $q['question_id']
        ));
        shuffle($choices);

        echo '
          <div class="border border-2 rounded-3 px-3 pt-2 mb-3 question-content">
            <p class="fs-5 fw-bold">質問 ' . ($i + 1) . ':</p>
            <p class="fs-5">' . $q['content'] . '</p>
          </div>
          ';

        echo '<div class="row column-gap-4 m-0 mb-5">';
        for ($j = 0; $j < count($choices); $j++): ?>
          <div
            class="answer-container q-<?= $i ?> a-<?= $j . ($choices[$j]['is_correct'] == 1 ? ' correct' : '') ?> col border border-2 rounded-3">
            <p class="pt-2 fs-5 fw-bold">答え <?= $j + 1 ?>:</p>
            <p class="fs-5"><?= $choices[$j]['content'] ?></p>
          </div>
        <?php endfor;
        echo '</div>';
      }
      ?>
    </main>

    <div class="container bg-white fixed-bottom px-3 py-3">
      <div class="row justify-content-around align-items-center">
        <div class="col-6 progress rounded-4 bg-secondary-subtle p-0">
          <div class="progress-bar rounded-4 bg-primary h-100" id="progress-bar" style="width: 0%"></div>
        </div>
        <a class="col-auto btn btn-purple rounded-5 ms-5 px-3 py-2 disabled" id="test-submit">提出</a>
      </div>
    </div>
  </body>

  <script>
    const s = document.getElementById('test-submit');
    const totalQuestionCount = document.getElementsByClassName('question-content').length;

    s.addEventListener('click', () => {
      if (!isAllAnswered()) return;

      let correctCount = 0;

      for (let i = 0; i < totalQuestionCount; i++) {
        const answers = document.getElementsByClassName(`q-${i}`),
          correct = Array.from(answers).filter(e => e.classList.contains('correct'))[0];
        if (correct.classList.contains('bg-success-subtle')) {
          correctCount++;
        }
      }

      const score = Math.round(correctCount / totalQuestionCount * 100);
      // alert(`あなたのスコアは ${score}/100 です。`);
      // window.location.href = `test_result_handler.php?i=${<?= $level ?>}&s=${score}`;
      window.location.href = `suggestion.php?l=<?= $level ?>&s=${score}`;
    });

    for (let e of document.getElementsByClassName('answer-container')) {
      e.addEventListener('click', function () {
        const q = e.classList[1].charAt(2), a = e.classList[2].charAt(2);
        const count = document.getElementsByClassName(e.classList[1]).length;

        const other = [];
        for (let i = 0; i < count; i++) {
          if (i == a) continue;
          other.push(document.getElementsByClassName(`q-${q} a-${i}`)[0]);
        }

        if (other.some(e => e.classList.contains('bg-success-subtle'))) {
          const chosen = other.filter(e => e.classList.contains('bg-success-subtle'))[0];
          chosen.classList.remove('bg-success-subtle');
        }

        e.classList.add('bg-success-subtle');

        if (isAllAnswered()) s.classList.remove('disabled');
      });
    }

    function isAllAnswered() {
      return Array.from(document.getElementsByClassName('bg-success-subtle')).length == totalQuestionCount;
    }
  </script>
</html>