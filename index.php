<?php
echo 'Nothing to see here';
if (!$_COOKIE['is_logged_in'])
  // should be guest page
  header('Location: app/account/signup.php');
else
  // add home page here
  return;