<?php
include '../helpers/database_manager.php';
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
    <img class="w-100 h-auto fixed-top z-n1" src="../../assets/login_signup_background.png" alt="">
    <div class="container w-20 flex vh-100 align-content-center">
      <?php
      if (isset($_GET['e'])) {
        echo Helper::alert_danger($_GET['e']);
      }
      ?>
      <div class="bg-white rounded-2 p-4">
        <h3 class="text-center pt-4 pb-4">ログイン</h3>
        <form action="signin_handler.php" method="post">
          <div class="form-floating pb-2 position-relative">
            <input type="text" class="form-control rounded-0 border-0 border-bottom border-dark-subtle" id="username"
              name="username" placeholder="" required>
            <label for="username">ウーザーネーム</label>
            <i class="position-absolute end-5 bottom-40 fa-solid fa-user text-grey"></i>
          </div>
          <div class="form-floating pb-2 position-relative">
            <input type="password" class="form-control rounded-0 border-0 border-bottom border-dark-subtle"
              id="password" name="password" placeholder="" required>
            <label for="password">パスワード</label>
            <i class="position-absolute end-5 bottom-40 fa-solid fa-eye text-grey" id="password_toggle"></i>
          </div>
          <button type="submit" class="btn btn-dark rounded-5 w-100 my-4">ログイン</button>
        </form>

    

        <!-- Các nút biểu tượng đăng nhập -->
        <div class="d-flex justify-content-center">
          <a href="" class="btn btn-light mx-2">
            <i class="fa-brands fa-google"></i>
          </a>
          <a href="" class="btn btn-light mx-2">
            <i class="fa-brands fa-facebook"></i>
          </a>
          <a href="" class="btn btn-light mx-2">
            <i class="fa-brands fa-x-twitter"></i>
          </a>
        </div>

        <p class="text-center mt-3"><a href="signup.php">登録はこちら</a></p>
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