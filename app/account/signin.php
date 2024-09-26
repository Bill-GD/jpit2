<?php
include '../helpers/database_manager.php';
include '../helpers/ui.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?= Helper::import_styles() ?>
    <title>Login</title>
  </head>
  <body>
    <img class="w-100 h-auto fixed-top z-n1" src="../../assets/images/login_signup_background.png" alt="">
    <div class="container w-20 flex vh-100 align-content-center">
      <?php
      if (isset($_GET['e'])) {
        echo UI::alert_danger($_GET['e']);
      }
      if (isset($_GET['s'])) {
        echo UI::alert_success($_GET['s']);
      }
      ?>
      <div class="bg-white rounded-2 p-4">
        <h3 class="text-center pt-4 pb-4">ログイン</h3>
        <form action="signin_handler.php" method="post">
          <div class="form-floating pb-2 position-relative">
            <input type="email" class="form-control rounded-0 rounded-top-3 border-0 border-bottom border-dark-subtle" id="email"
              name="email" placeholder="" required>
            <label for="email">メールアドレス</label>
            <i class="position-absolute end-5 bottom-40 fa-solid fa-envelope text-grey"></i>
          </div>
          <div class="form-floating pb-2 position-relative">
            <input type="password" class="form-control rounded-0 border-0 border-bottom border-dark-subtle"
              id="password" name="password" placeholder="" required>
            <label for="password">パスワード</label>
            <i class="position-absolute end-5 bottom-40 fa-solid fa-eye text-grey" id="password_toggle"></i>
          </div>
          <button type="submit" class="btn btn-dark rounded-5 w-100 my-4">ログイン</button>
        </form>

        <p class="text-center mt-1 mb-4">アカウントをお持ちない場合　
          <a href="signup.php" class="text-decoration-none">登録</a>
        </p>

        <hr>
        <div class="position-relative pt-4">
          <pre class="position-absolute start-40 bottom-50 bg-white fs-6"> 他の方 </pre>
        </div>

        <div class="d-flex justify-content-center">
          <a href="" class="btn btn-light fs-4 mx-2">
            <i class="fa-brands fa-google"></i>
          </a>
          <a href="" class="btn btn-light fs-4 mx-2">
            <i class="fa-brands fa-facebook"></i>
          </a>
          <a href="" class="btn btn-light fs-4 mx-2">
            <i class="fa-brands fa-x-twitter"></i>
          </a>
        </div>
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