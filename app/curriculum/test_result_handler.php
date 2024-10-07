<?php
include_once '../helpers/helper.php';

if (!Helper::is_user_logged_in()) {
  header('Location: guest.php');
  exit();
}

if (!isset($_POST['i']) || !isset($_POST['s'])) {
  header('Location: lesson_list.php?e=選択したテストは無効でした');
  exit();
}

if ($_POST['s'] == 'NaN' || intval($_POST['s']) < 0 || intval($_POST['s']) > 100) {
  header('Location: lesson_list.php?e=スコアは無効でした');
  exit();
}

include_once '../helpers/database_manager.php';

$dm = DatabaseManager::instance();

$res = $dm->query(
  'SELECT test_result from test_result where lesson_id = :lesson_id and user_id = :user_id',
  [
    'lesson_id' => $_POST['i'],
    'user_id' => $_COOKIE['user_id']
  ]
)->fetchAll(PDO::FETCH_COLUMN);

if (count($res) > 0) {
  $old = $res[0];
  if ($_POST['s'] > $old) {
    $dm->query(
      'UPDATE test_result set test_result = :test_result where lesson_id = :lesson_id and user_id = :user_id',
      [
        'test_result' => $_POST['s'],
        'lesson_id' => $_POST['i'],
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
      'lesson_id' => $_POST['i'],
      'test_result' => $_POST['s']
    ]
  );
}

// header('Location: lesson_test.php?i=' . $_POST['i'] . '&s=' . $_POST['s']);
header('Location: lesson_list.php?d=' . $_POST['i'] . '-' . $_POST['s']);