<html>
<h1>Ибрагимов Айдар</h1>
<head>
    <title> Редактирование данных о Предмете </title>
</head>
<body>
<?php
include("checks.php");
require_once 'connect1.php';
$mysqli = new mysqli($host, $user, $password, $database);
if ($mysqli->connect_errno) {
    echo "Невозможно подключиться к серверу";
}// установление соединения с сервером
$id_subject = $_GET['id_subject'];

$result = $mysqli->query("SELECT name_subject, fio_subject FROM subject WHERE id_subject='$id_subject'");
if ($result) {
    while ($gm = $result->fetch_array()) {
        $name_subject = $gm['name_subject'];
        $fio_subject = $gm['fio_subject'];
    }
}

print "<form action='save_edit_subject.php' method='get'>";
print "Предмет: <input name='name_subject' size='50' type='text'
value='$name_subject'>";
print "<br>ФИО преродавателя: <input name='fio_subject' size='50' type='text'
value='$fio_subject'>";
print "<input type='hidden' name='id_subject' size='11' type='int'
value='$id_subject'>";
print "<input type='submit' name='save' value='Сохранить'>";
print "</form>";
if ($_SESSION['type'] == 1)
    echo "<p><a href=subject.php> Вернуться назад </a>";
elseif ($_SESSION['type'] == 2)
    echo "<p><a href=subjectAdm.php> Вернуться назад </a>";
?>
</body>
</html>