<?php
include ("checks.php");
require_once 'connect1.php';
$link = mysqli_connect($host, $user, $password, $database);
if (mysqli_connect_errno()) {
    printf("Не удалось подключиться: %s\n", mysql_connect_error());
    exit();
}
mysqli_query($link, "INSERT INTO subject SET name_subject='" . $_GET['name_subject']
    . "', fio_subject='" . $_GET['fio_subject'] . "'");
if (mysqli_affected_rows($link) > 0) // если нет ошибок при выполнении запроса
{
    print "<p>Спасибо, Ваш Предмет добавлен в базу данных.";
    if ($_SESSION['type'] == 1)
        echo "<p><a href=subject.php> Вернуться к списку Предмет </a>";
    elseif ($_SESSION['type'] == 2)
        echo "<p><a href=subjectAdm.php> Вернуться к списку Предмет </a>";
} else {
    if ($_SESSION['type'] == 1)
        echo "Ошибка сохранения . <p><a href=subject.php> Вернуться к списку Предмет </a>";
    elseif ($_SESSION['type'] == 2)
        echo "Ошибка сохранения . <p><a href=subjectAdm.php> Вернуться к списку Предмет </a>";
}
?>
