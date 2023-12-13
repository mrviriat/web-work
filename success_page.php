<?php
include('session.php');

$chosen_option = $_SESSION['chosen_option'];

// echo "$chosen_option ";
// if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["back"])) {
//     $chosen_option = 0;
// }

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["logout"])) {
    logOut();
    header("Location: /");
    exit();
}


echo <<<HTML
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel='stylesheet' href='styles/stylesForMyWebPage.css' type='text/css'>
        <title>Успех!</title>
    </head>

    <body>
        <header>
            <!-- <div class="container"> -->
                <h1>Голосование</h1>
                <form method="post" action="">
                    <div class="button-container">
                        <button type="submit" name="logout" class="logout-button" >Выйти из аккаунта</button>
                    </div>    
                </form>   
            <!-- </div> -->
        </header>
        <div class="container">
            <div class="container">
                <h1>Супер! Вы выбрали $chosen_option</h1>
                <div class="super">
                    <span>Вы всё ещё можете поменять свой выбор. Для этого вернитесь обратно и выберите другой вариант.</span><br>
                </div>
                <button type="submit" onclick="goBack()" name="back" class="vote-button" >Вернуться назад</button>
            </div>
        </div>     
HTML;
// require_once 'element.html';
require_once 'review.php';
echo <<<HTML
        
        <footer>
            <div class="container">
                <p>&copy; 2023 Ваша Компания</p>
            </div>
        </footer>
        <script>
            function goBack() {
                window.history.back();
            }
        </script>
    </body>

    </html>
HTML;

?>