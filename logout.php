<?php
require_once 'header.php';
if (isset($_SESSION['user']))
{
destroySession();
echo "<div class='main'>You have been logged out. Please " .
"<a href='index.php'>click here</a> to refresh the screen.";
// Вы уже покинули сайт. Пожалуйста...
// ... щелкните здесь, чтобы обновить экран
}
else echo "<div class='main'><br>" .
"You cannot log out because you are not logged in";
// Вы не можете завершить сеанс работы,
// потому что не входили на сайт
?>