<?php
echo 'Nothing to see here';

if ($_COOKIE['is_logged_in'])
  header('Location: app/homepage/dashboard.php');
else
  header('Location: app/homepage/guest.php');
return;