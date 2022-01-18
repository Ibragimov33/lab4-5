<html>
<h1>Ибрагимов Айдар</h1>
<head><title> Добавление Ведомости </title></head>
<body>
<H2>Добавление Ведомости:</H2>
<form action="save_new_vedomost.php" method="get">
    <?php
    include ("checks.php");
    require_once 'connect1.php';
    $mysqli = new mysqli($host, $user, $password, $database);
    if ($mysqli->connect_errno) {
        echo "Невозможно подключиться к серверу";
    }

    $result = $mysqli->query("SELECT id_students, fio_stud FROM students");
    echo "<br>Студент: <select name='id_students'>";



    if ($result) {
        while ($row = $result->fetch_array()) {
            $id_students = $row['id_students'];
            $fio_stud = $row['fio_stud'];
            echo "<option value='$id_students'>$fio_stud</option>";
        }
    }
    echo "</select>";

    $result = $mysqli->query("SELECT id_subject, name_subject FROM subject");
    echo "<br>Предмет: <select name='id_subject'>";

    if ($result) {
        while ($row = $result->fetch_array()) {
            $id_subject = $row['id_subject'];
            $name_subject = $row['name_subject'];
            echo "<option value='$id_subject'>$name_subject</option>";
        }
    }
    echo "</select>";

    print "<br> Дата: <input name='date_vedom' placeholder='dd-mm-yyyy' type='date' value=$date_vedom>";
    print "<br> Оценка: <input name='value' size='11' type='int' value=$value>";
    echo "<p><input name='add' type='submit' value='Добавить'></p>";
    echo "<p><input name='b2' type='reset' value='Очистить'></p>";
    if ($_SESSION['type'] == 1)
        echo "<p><a href=vedomost.php> Вернуться к списку Зачетов </a></p>";
    elseif ($_SESSION['type'] == 2)
        echo "<p><a href=vedomostAdm.php> Вернуться к списку Зачетов </a></p>";
    ?>
</form>
</body>
</html>
