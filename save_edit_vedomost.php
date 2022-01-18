<html>
<body>
<?php
include("checks.php");
require_once 'connect1.php';
$mysqli = new mysqli($host, $user, $password, $database);
if ($mysqli->connect_errno) {
    echo "Невозможно подключиться к серверу";
} // установление соединения с сервером

$id = $_GET['id'];
$date_vedom =$_GET['date_vedom'];
$id_students = $_GET['id_students'];
$id_subject = $_GET['id_subject'];
$value = $_GET['value'];

$result = $mysqli->query("UPDATE vedomost SET date_vedom='$date_vedom', id_students='$id_students', id_subject='$id_subject', value='$value' WHERE id='$id'");
if ($result) {
    if ($_SESSION['type'] == 1)
        echo "Все сохранено.<p><a href=vedomost.php> Вернуться к списку Ведомостей </a>";
    elseif ($_SESSION['type'] == 2)
        echo "Все сохранено.<p><a href=vedomostAdm.php> Вернуться к списку Ведомостей </a>";
} else {
    if ($_SESSION['type'] == 1)
        echo "Ошибка сохранения. <p></p><a href=vedomost.php> Вернуться к списку Ведомостей </a>";
    elseif ($_SESSION['type'] == 2)
        echo "Ошибка сохранения. <p><a href=vedomostAdm.php> Вернуться к списку Ведомостей </a>";
}
?>
</body>
</html>