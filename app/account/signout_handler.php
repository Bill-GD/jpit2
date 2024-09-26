<?php
include '../helpers/helper.php';

Helper::set_cookies([
  'is_logged_in' => false,
  'user_id' => '',
  'username' => '',
  'email' => '',
]);

header('Location: ../homepage/guest.php');
