<?php
include_once 'app/helpers/globals.php';
if (empty(Globals::$aiven_username)) {
  Globals::init('.env');
  assert(Globals::$aiven_username !== '', 'Aiven username is empty');
}

if ($_COOKIE['is_logged_in'])
  header('Location: app/homepage/dashboard.php');
else
  header('Location: app/homepage/guest.php');
return;