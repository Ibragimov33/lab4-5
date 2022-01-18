<html>
<h1>Ибрагимов Айдар</h1>
<head><title>Зачетная ведомость</title></head>
<body>
<h2>Зачетная ведомость:</h2>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Дата сдачи</th>
        <th>Студент</th>
        <th>Предмет</th>
        <th>Оценка</th>
        <th>Редактировать</th>
    </tr>
    </tr>
    <?php
    include("checks.php");
    require_once 'connect1.php';
    $mysqli = new mysqli($host, $user, $password, $database);
    if ($mysqli->connect_errno) {
        echo "Невозможно подключиться к серверу";
    }
    $result = $mysqli->query("SELECT vedomost.id, vedomost.date_vedom, students.fio_stud as students, subject.name_subject as subject, vedomost.value
FROM vedomost 
LEFT JOIN students ON vedomost.id_students=students.id_students
LEFT JOIN subject ON vedomost.id_subject=subject.id_subject");

    $counter = 0;
    if ($result) {
        while ($row = $result->fetch_array()) {
            $id = $row['id'];
            $date_vedom = $row['date_vedom'];
            $students = $row['students'];
            $subject = $row['subject'];
            $value = $row['value'];
            $date_vedom = date('d-m-Y', strtotime($date_vedom));
            echo "<tr>";
            echo "<td>$id</td><td>$date_vedom</td><td>$students</td><td>$subject</td><td>$value</td>";

            echo "<td><a href='edit_vedomost.php?id=" . $row['id']
                . "'>Редактировать</a></td>"; //Запуск редактирования
            echo "</tr>";
            $counter++;
        }
    }
    print "</table>";
    print("<p>Всего Зачетов: $counter </p>");
    echo "<p><a href=new_vedomost.php> Добавить Зачет </a>";
    if ($_SESSION['type'] == 1)
        echo "<p><a href=students.php> Вернуться назад </a>";
    elseif ($_SESSION['type'] == 2)
        echo "<p><a href=studentsAdm.php> Вернуться назад </a>";
    include("checkSession.php");
    ?>
</body>
</html>
