<html>
<body>
<?php
include("checks.php");
require_once 'connect1.php';
$link = mysqli_connect($host, $user, $password, $database);

/* проверка соединения */
if (mysqli_connect_errno()) {
    printf("Не удалось подключиться: %s\n", mysqli_connect_error());
    exit();
}
if ($_SESSION['type'] == 2) {
    mysqli_query($link, "UPDATE users SET username='" . $_GET['username'] . "', password='" . md5($_GET['password']) . "', `type`='" . $_GET['type'] . "' WHERE id_u=" . $_GET['id_u']);
    if (mysqli_affected_rows($link) > 0) {
        print "<p>Все сохранено.";
        print "<p><a href=\"usersAdm.php\"> Вернуться к списку пользователей </a>";
    } else {
        print "<p>Ошибка сохранения.";
        print "<p><a href=\"usersAdm.php\">Вернуться к списку пользователей</a> ";
    }
}
elseif ($_SESSION['type'] == 1) {
    mysqli_query($link, "UPDATE users SET username='" . $_GET['username'] . "', password='" . md5($_GET['password']) . "' WHERE id_u=" . $_GET['id_u']);
    if (mysqli_affected_rows($link) > 0) {
        print "<p>Все сохранено.";
        print "<p><a href=\"students.php\"> На главную </a>";
    } else {
        print "<p>Ошибка сохранения.";
        print "<p><a href=\"students.php\">На главную</a> ";
    }
}


mysqli_close($link);
?>
</body>
</html>