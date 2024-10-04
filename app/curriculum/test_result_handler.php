<?php
// window.location.href = `test_result_handler?i=${<?= $lesson_id }&s=${score}`;

if (!isset($_GET['i']) || !isset($_GET['s'])) {
  header('Location: lesson_list.php?e=選択したテストは無効でした');
  exit();
}

include_once '../helpers/database_manager.php';

$dm = DatabaseManager::instance();

$res = $dm->query(
  'SELECT test_result from test_result where lesson_id = :lesson_id and user_id = :user_id',
  [
    'lesson_id' => $_GET['i'],
    'user_id' => $_COOKIE['user_id']
  ]
)->fetchAll(PDO::FETCH_COLUMN);

if (count($res) > 0) {
  $old = $res[0];
  if ($_GET['s'] > $old) {
    $dm->query(
      'UPDATE test_result set test_result = :test_result where lesson_id = :lesson_id and user_id = :user_id',
      [
        'test_result' => $_GET['s'],
        'lesson_id' => $_GET['i'],
        'user_id' => $_COOKIE['user_id']
      ]
    );
  }
} else {
  $dm->query('call reset_test_result_id()');
  $dm->query(
    'INSERT INTO test_result (user_id, lesson_id, test_result) VALUES (:user_id, :lesson_id, :test_result)',
    [
      'user_id' => $_COOKIE['user_id'],
      'lesson_id' => $_GET['i'],
      'test_result' => $_GET['s']
    ]
  );
}

// header('Location: lesson_test.php?i=' . $_GET['i'] . '&s=' . $_GET['s']);
header('Location: lesson_list.php');