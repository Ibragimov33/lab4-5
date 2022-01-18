<html>
<h1>Ибрагимов Айдар</h1>
<head>
    <title> Редактирование данных Зачетной ведомости </title>
</head>
<body>
<?php
include("checks.php");
require_once 'connect1.php';
$mysqli = new mysqli($host, $user, $password, $database);
if ($mysqli->connect_errno) {
    echo "Невозможно подключиться к серверу";
}// установление соединения с сервером

$id = $_GET['id'];
$prod = mysqli_query($mysqli, "SELECT
			vedomost.id,
			vedomost.date_vedom,
            vedomost.value,
       
			students.id_students as id_students,
			students.fio_stud as fio_stud,

			subject.id_subject as id_subject,
			subject.name_subject as name_subject

			FROM vedomost
			LEFT JOIN students ON vedomost.id_students=students.id_students
			LEFT JOIN subject ON vedomost.id_subject=subject.id_subject
			WHERE vedomost.id='$id'"
);

if ($prod) {
    $prod = $prod->fetch_array();

    $id = $prod['id'];
    $date_vedom = $prod['date_vedom'];
    $value = $prod['value'];

    $id_students = $prod['id_students'];
    $fio_stud = $prod['fio_stud'];

    $id_subject = $prod['id_subject'];
    $name_subject = $prod['name_subject'];

}


print "<form action='save_edit_vedomost.php' method='get'>";


$result = $mysqli->query("SELECT id_students, fio_stud FROM students WHERE id_students <> '$id_students' ");
echo "<br>ФИО:<select name='id_students'>";
echo "<option selected value='$id_students'>$fio_stud</option>";
if ($result) {
    while ($row = $result->fetch_array()) {
        $id_students = $row['id_students'];
        $fio_stud = $row['fio_stud'];
        echo "<option value='$id_students'>$fio_stud</option>";
    }
}
echo "</select>";


$result = $mysqli->query("SELECT id_subject, name_subject FROM subject WHERE id_subject <> '$id_subject' ");
echo "<br>Названия: <select name='id_subject'>";
echo "<option selected value='$id_subject'>$name_subject</option>";

if ($result) {
    while ($row = $result->fetch_array()) {
        $id_subject = $row['id_subject'];
        $name_subject = $row['name_subject'];
        echo "<option value='$id_subject'>$name_subject</option>";
    }
}
echo "</select>";


print "<br>Дата: <input name='date_vedom' placeholder='dd-mm-yyyy' type='date' value=$date_vedom>";
print "<br> Оценка: <input name='value' size='11' type='int' value=$value>";
print "<input type='hidden' name='id' size='11' value=$id>";
print "<input  name='save' type='submit' value='Сохранить'>";
print "</form>";
if ($_SESSION['type'] == 1)
    echo "<p><a href=vedomost.php> Вернуться к Зачетной ведомости </a>";
elseif ($_SESSION['type'] == 2)
    echo "<p><a href=vedomostAdm.php> Вернуться к Зачетной ведомости </a>";
?>
</body>
</html>