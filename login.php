<?php
require_once 'header.php';
// Обработка отправленной формы
$error = $user = $pass = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = sanitizeString($_POST['user']);
    $pass = sanitizeString($_POST['pass']);
    if ($user == "" || $pass == "") {
        echo "<p style='margin-left: 40px; color: red;'>Данные введены не во все поля</p>";
        // Данные введены не во все поля
    } else {
        $result = queryMySQL("SELECT user,pass FROM members WHERE user='$user' AND pass='$pass'");
        if ($result->num_rows == 0) {
            echo "<p style='margin-left: 40px; color: red;'>Неправильный логин или пароль</p>";
            // Ошибка при вводе пары "имя пользователя — пароль"
        } else {
            $_SESSION['user'] = $user;
            $_SESSION['pass'] = $pass;
            header("Location: mywebsite.php");
            exit();
            // Вы уже вошли на сайт. Пожалуйста, щелкните на этой ссылке
        }
    }
}
?>

<div class='main'>
    <h3>Please enter your details to log in</h3>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <span class='fieldname'>Username</span>
        <input type="text" id="user" name="user" required><br>

        <span class='fieldname'>Password</span>
        <input type="password" id="pass" name="pass" required><br>

        <span class='fieldname'>&nbsp;</span>
        <input type="submit" value="Войти">
    </form>
</div><br>
</body>

</html>