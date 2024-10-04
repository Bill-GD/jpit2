<?php
include_once '../helpers/helper.php';
include_once '../helpers/ui.php';

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
    <title>lotrinhhoc</title>
    <?= Helper::import_styles() ?>
</head>

<body>
    <?= UI::navbar() ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>lotrinhhoc</title>
        <?= Helper::import_styles() ?>
    </head>

    <body>
        <?= UI::navbar() ?>
        <<div class="container custom-container d-flex justify-content-center align-items-center vh-100">
        <div class="row g-4"> <!-- Sử dụng g-4 để tạo khoảng cách giữa các cột -->

            <!-- Div 1 with hover effect -->
            <div class="col-lg-4 col-md-4 col-sm-12 d-flex flex-column justify-content-center align-items-center card-hover">
                <a href="alphabet.php">
                    <img src="../../assets/images/lesson_1/study_alphabet.png" alt="Image 1" class="img-fluid fixed-size">
                </a>
                <p class="mt-3">アルファベット</p>
            </div>

            <!-- Div 2 with hover effect -->
            <div class="col-lg-4 col-md-4 col-sm-12 d-flex flex-column justify-content-center align-items-center card-hover">
                <a href="compound.php">
                    <img src="../../assets/images/compound/ch.jpg" alt="Centered Image" class="img-fluid fixed-size">
                </a>
                <p class="mt-3">拗音</p>
            </div>

            <!-- Div 3 with hover effect -->
            <div class="col-lg-4 col-md-4 col-sm-12 d-flex flex-column justify-content-center align-items-center card-hover">
                <a href="lesson_list.php">
                    <img src="../../assets/images/lesson_1/lesson.png" alt="Image 3" class="img-fluid fixed-size">
                </a>
                <p class="mt-3">Bài học</p>
            </div>

        </div>
    </div>


    </body>

    </html>

</body>

</html>