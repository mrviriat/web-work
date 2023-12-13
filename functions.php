<?php
$dbhost = 'localhost'; // Эта строка вряд ли нуждается в изменении
$dbname = 'robinsnest'; // А значения этих переменных
$dbuser = 'robinsnest'; // поменяйте на те, что соответствуют
$dbpass = 'rnpassword'; // вашим настройкам
$appname = "Robin's Nest"; // и предпочтениям
$connection = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
if ($connection->connect_error)
    die($connection->connect_error);
function createTable($name, $query)
{
    queryMysql("CREATE TABLE IF NOT EXISTS $name($query)");
    echo "Таблица '$name' создана или уже существовала<br>";
}

function getAmountOfMembers()
{
    global $connection;
    // SQL-запрос для получения количества записей в таблице members
    $sql = "SELECT COUNT(*) AS total_records FROM members";
    // Выполнение запроса
    $result = $connection->query($sql);
    // Проверка наличия результата
    if ($result->num_rows > 0) {
        // Получение данных из результата
        $row = $result->fetch_assoc();
        // Сохранение количества записей в переменную
        return $row["total_records"];
    } else {
        return 0;
    }
}
function queryMysql($query)
{
    global $connection;
    $result = $connection->query($query);
    if (!$result)
        die($connection->error);
    return $result;
}
function destroySession()
{
    $_SESSION = array();
    if (session_id() != "" || isset($_COOKIE[session_name()]))
        setcookie(session_name(), '', time() - 2592000, '/');
    session_destroy();
}
function sanitizeString($var)
{
    global $connection;
    $var = strip_tags($var);
    $var = htmlentities($var);
    $var = stripslashes($var);
    return $connection->real_escape_string($var);
}
function showProfile($user)
{
    if (file_exists("$user.jpg"))
        echo "<img src='$user.jpg' align='left'>";
    $result = queryMysql("SELECT * FROM profiles WHERE
user='$user'");
    if ($result->num_rows) {
        $row = $result->fetch_array(MYSQLI_ASSOC);
        echo stripslashes($row['text']) .
            "<br style='clear:left;'><br>";
    }
}
?>