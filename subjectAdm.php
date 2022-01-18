<html>
<h1>Ибрагимов Айдар</h1>
<head><title> Сведения о Предметах </title></head>
<body>
<h2>Сведения о Предметах:</h2>
<table border="1">
    <tr>
        <th>id Предмета</th>
        <th>Название</th>
        <th>Преподаватель</th>
        <th>Редактировать</th>
        <th>Уничтожить</th>
    </tr>
</tr>
<?php
include("checks.php");
require_once 'connect1.php';
$link = mysqli_connect($host, $user, $password, $database) or die ("Невозможно
подключиться к серверу" . mysqli_error($link));
$result = mysqli_query($link, "SELECT id_subject, name_subject, fio_subject FROM subject"); // запрос на выборку сведений о пользователях
mysqli_select_db($link, "subj");

while ($row = mysqli_fetch_array($result)) {// для каждой строки из запроса
    echo "<tr>";
    echo "<td>" . $row['id_subject'] . "</td>";
    echo "<td>" . $row['name_subject'] . "</td>";
    echo "<td>" . $row['fio_subject'] . "</td>";
    echo "<td><a href='edit_subject.php?id_subject=" . $row['id_subject']
        . "'>Редактировать</a></td>"; // запуск скрипта для редактирования
    echo "<td><a href='delete_subject.php?id_subject=" . $row['id_subject']
        . "'>Удалить</a></td>"; // запуск скрипта для удаления записи
    echo "</tr>";
}
print "</table>";
$num_rows = mysqli_num_rows($result); // число записей в таблице БД
print("<P>Всего Предметов: $num_rows </p>");
echo "<p><a href=new_subject.php> Добавить Предмет </a>";
if ($_SESSION['type'] == 1)
    echo "<p><a href=students.php> Вернуться назад </a>";
elseif ($_SESSION['type'] == 2)
    echo "<p><a href=studentsAdm.php> Вернуться назад </a>";
include("checkSession.php");
?>
</body>
</html>