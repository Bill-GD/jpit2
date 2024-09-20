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
      <?php
      if (isset($_GET['e'])) {
        echo Helper::alert_danger($_GET['e']);
      }
      ?>
      <div class="bg-white rounded-2 p-4">
        <h3 class="text-center pt-4 pb-4">登録</h3>
        <form action="signup_handler.php" method="post">
          <div class="form-floating pb-2 position-relative">
            <input type="text" class="form-control rounded-0 border-0 border-bottom border-dark-subtle" id="username" name="username" placeholder="" required>
            <label for="username">ウーザーネーム</label>
            <i class="position-absolute end-5 bottom-40 fa-solid fa-user text-grey"></i>
          </div>
          <div class="form-floating pb-2 position-relative">
            <input type="email" class="form-control rounded-0 border-0 border-bottom border-dark-subtle" id="email" name="email" placeholder="" required>
            <label for="email">メールアドレス</label>
            <i class="position-absolute end-5 bottom-40 fa-solid fa-envelope text-grey"></i>
          </div>
          <div class="form-floating pb-2 position-relative">
            <input type="password" class="form-control rounded-0 border-0 border-bottom border-dark-subtle" id="password" name="password" placeholder="" required>
            <label for="password">パスワード</label>
            <i class="position-absolute end-5 bottom-40 fa-solid fa-eye text-grey" id="password_toggle"></i>
          </div>
          <button type="submit" class="btn btn-dark rounded-5 w-100 my-4">登録</button>
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