<?php
require_once 'functions.php';
if (isset($_POST['user'])) {
    $user = sanitizeString($_POST['user']);
    $result = queryMysql("SELECT * FROM members WHERE
user='$user'");
    if ($result->num_rows)
        echo "<span class='taken'>&nbsp;&#x2718; " .
            "Sorry, this username is taken</span>";
    // К сожалению, имя занято
    else
        echo "<span class='available'>&nbsp;&#x2714; " .
            "This username is available</span>";
    // Это имя доступно
}
?>