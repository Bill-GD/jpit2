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

include_once '../helpers/database_manager.php';
$dm = DatabaseManager::instance();

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?= Helper::import_styles() ?>
    <title> - Probeto</title>
  </head>
  <body>
    <?= UI::navbar() ?>
  </body>
</html>