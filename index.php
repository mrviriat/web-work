<?php
require_once 'header.php';
echo "<br><span class='main'>Welcome to $appname,";
// Добро пожаловать в ...
if ($loggedin) {
    echo " $user, you are logged in.</span>";
    echo '<br><span class="main"> Please <a href="mywebsite.php">click here</a> to continue.';
}
// вы вошли на сайт
else
    echo ' please sign up and/or log in to join in.';
// Пожалуйста, зарегистрируйтесь и (или) войдите на сайт
?>
</span><br><br>
</body>

</html>