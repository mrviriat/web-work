<?php
// session_start();
include('session.php');

$user = $_SESSION['user'];

require_once 'functions.php';

// Проверяем, проголосовал ли пользователь
$result_check_vote = $connection->query("SELECT choose FROM members WHERE user = '$user'");

$row = $result_check_vote->fetch_assoc();
$chosen_option = $row['choose'];

// function showPopup($message)
// {
//     echo <<<HTML
//     <script>
//         var userResponse = confirm('$message');
//     </script>
// HTML;
// }

// if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["logout"]) && isset($_SESSION['user'])) {
//     destroySession();
//     header("Location: /");
//     exit();
// }

// // echo "$chosen_option ";
// if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["back"])) {
//     $chosen_option = 0;
// }

// Обработка голосования, если форма отправлена
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["vote_option"])) {

    $chosen_option = $_POST["vote_option"];
    // showPopup("Ваш голос был записан");
    

    $sql_update_vote = "UPDATE members SET choose = '$chosen_option' WHERE user = '$user'";
    if ($connection->query($sql_update_vote) === TRUE) {
        $_SESSION['chosen_option'] = $chosen_option;
        header("Location: success_page.php");
    } else {
        echo "Ошибка при голосовании: " . $connection->error;
    }
}

// if ($result_check_vote->num_rows > 0 && $chosen_option != 0) {

//     echo <<<HTML
//     <!DOCTYPE html>
//     <html>
//     <head>
//         <meta charset="UTF-8">
//         <meta name="viewport" content="width=device-width, initial-scale=1.0">
//         <link rel='stylesheet' href='styles/stylesForMyWebPage.css' type='text/css'>
//         <title>Успех!</title>
//     </head>

//     <body>
//         <header>
//             <div class="container">
//                 <h1>Голосование</h1>
//             </div>
//         </header>
//         <div class="container">
//             <form method="post" action="">
//                 <div class="container">
//                     <h1>Супер! Вы выбрали $chosen_option</h1>
//                     <div class="super">
//                         <span>Вы всё ещё можете поменять свой выбор. Для этого вернитесь обратно и выберите другой вариант.</span><br>
//                     </div>
//                     <button type="submit" name="back" class="vote-button" >Вернуться назад</button>
//                     <button type="submit" name="logout" class="vote-button" >Выйти из аккаунта</button>
//                 </div>
//             </form>        
// HTML;
//     // require_once 'element.html';
//     require_once 'review.php';
//     echo <<<HTML
//         </div>
//         <footer>
//             <div class="container">
//                 <p>&copy; 2023 Ваша Компания</p>
//             </div>
//         </footer>
//     </body>

//     </html>
// HTML;

//     exit();
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Голосование</title>
    <link rel='stylesheet' href='styles/stylesForMyWebPage.css' type='text/css'>
</head>

<body>
    <header>
        <div class="container">
            <h1>Голосование</h1>
        </div>
    </header>
    <form method="post" action="">
        <div class="container">
            <div class="voting-form">
                <div class="option">
                    <input type="radio" class="checkbox" name="vote_option" value="1">
                    <p>Вариант 1</p>
                </div>
                <div class="option">
                    <input type="radio" class="checkbox" name="vote_option" value="2">
                    <p>Вариант 2</p>
                </div>
                <div class="option">
                    <input type="radio" class="checkbox" name="vote_option" value="3">
                    <p>Вариант 3</p>
                </div>
                <div class="option">
                    <input type="radio" class="checkbox" name="vote_option" value="4">
                    <p>Вариант 4</p>
                </div>
            </div>

            <button type="submit" class="vote-button">Проголосовать</button>
        </div>
    </form>

    <footer>
        <div class="container">
            <p>&copy; 2023 Ваша Компания</p>
        </div>
    </footer>
</body>

</html>