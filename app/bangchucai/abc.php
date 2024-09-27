<?php
include '../helpers/helper.php';
include '../helpers/ui.php';

if (!Helper::is_user_logged_in()) {
    header('Location: ..\account\signin.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?= Helper::import_styles() ?>
</head>

<body>
    <?= UI::navbar() ?>
    < class="container mt-7 mb-4">
    <div>
        <P></P>
    </div>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="form-floating position-relative">
                    <input type="text" class="form-control rounded-5 border-dark-subtle" id="search" name="search" placeholder="検索" required>
                    <label for="search">検索</label>
                    <i class="position-absolute end-5 bottom-30 fa-solid fa-search text-grey"></i>
                </div>
            </div>
        </div>
</body>

</html>