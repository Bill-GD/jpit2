<?php
include '../helpers/database_manager.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?= Helper::import_styles() ?>
    <title>Sign Up</title>
  </head>
  <body>
    <?= DatabaseManager::instance()->get_version() ?>
  </body>
</html>