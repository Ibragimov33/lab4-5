<html>
<h1>Ибрагимов Айдар</h1>
<head>
    <title> Редактирование данных о Студентах </title>
</head>
<body>
<?php
include("checks.php");
require_once 'connect1.php';
$mysqli = new mysqli($host, $user, $password, $database);
if ($mysqli->connect_errno) {
    echo "Невозможно подключиться к серверу";
}// установление соединения с сервером
$id_students = $_GET['id_students'];

$result = $mysqli->query("SELECT fio_stud, fac_stud, group_stud, num_stud, tel_stud FROM students WHERE id_students='$id_students'");
if ($result) {
    while ($gm = $result->fetch_array()) {
        $fio_stud = $gm['fio_stud'];
        $fac_stud = $gm['fac_stud'];
        $group_stud = $gm['group_stud'];
        $num_stud = $gm['num_stud'];
        $tel_stud = $gm['tel_stud'];
    }
}

print "<form action='save_edit_students.php' method='get'>";
print "ФИО: <input name='fio_stud' size='50' type='text'
value='$fio_stud'>";
print "<br>Факультет: <input name='fac_stud' size='30' type='text'
value='$fac_stud'>";
print "<br>Группа: <input name='group_stud' size='30' type='text'
value='$group_stud'>";
print "<br>Номер зачетки: <input name='num_stud' size='30' type='text'
value='$num_stud'>";
print "<br>Телефон: <input name='tel_stud' size='11' type='int'
value='$tel_stud'>";
print "<input type='hidden' name='id_students' size='11' type='int'
value='$id_students'>";
print "<input type='submit' name='save' value='Сохранить'>";
print "</form>";
if ($_SESSION['type'] == 1)
    echo "<p><a href=students.php> Вернуться назад </a>";
elseif ($_SESSION['type'] == 2)
    echo "<p><a href=studentsAdm.php> Вернуться назад </a>";
?>
</body>
</html>