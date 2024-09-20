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
    <img class="w-100 h-auto fixed-top z-n1" src="../../assets/login_signup_background.png" alt="">
    <div class="container w-20 flex vh-100 align-content-center">
      <div class="bg-white rounded-2 p-4">
        <h3 class="text-center py-4">登録</h3>
        <form action="" method="post">
          <div class="form-floating pb-2 position-relative">
            <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
            <label for="username">Username</label>
            <i class="position-absolute end-5 bottom-40 fa-solid fa-user text-grey"></i>
          </div>
          <div class="form-floating pb-2 position-relative">
            <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
            <label for="email">Email address</label>
            <i class="position-absolute end-5 bottom-40 fa-solid fa-envelope text-grey"></i>
          </div>
          <div class="form-floating pb-2 position-relative">
            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
            <label for="password">Password</label>
            <i class="position-absolute end-5 bottom-40 fa-solid fa-eye text-grey" id="password_toggle"></i>
          </div>
          <button type="submit" class="btn btn-dark rounded-5 w-100 mt-3">Sign up</button>
        </form>
      </div>
    </div>
  </body>
  <script>
    document.getElementById('password_toggle').addEventListener('click', function () {
      const password = document.getElementById('password');
      if (password.type === 'password') {
        password.type = 'text';
        this.classList.remove('fa-eye');
        this.classList.add('fa-eye-slash');
        return;
      }
      password.type = 'password';
      this.classList.remove('fa-eye-slash');
      this.classList.add('fa-eye');
    });
  </script>
</html>