<html>
<h1>Ибрагимов Айдар</h1>
<head><title> Сведения о Студентах </title></head>
<body>
<h2>Сведения о Студентах:</h2>
<table border="1">
    <tr>
        <th>ID</th>
        <th>ФИО</th>
        <th>Факультет</th>
        <th>Группа</th>
        <th>Номер зачетки</th>
        <th>Телефон</th>
        <th>Редактировать</th>
        <th>Уничтожить</th>
    </tr>
    </tr>
    <?php
    include("checks.php");
    require_once 'connect1.php';
    $link = mysqli_connect($host, $user, $password, $database) or die ("Невозможно
подключиться к серверу" . mysqli_error($link));
    $result = mysqli_query($link, "SELECT id_students, fio_stud, fac_stud, group_stud, num_stud, tel_stud
FROM students");
    mysqli_select_db($link, "students");

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $row['id_students'] . "</td>";
        echo "<td>" . $row['fio_stud'] . "</td>";
        echo "<td>" . $row['fac_stud'] . "</td>";
        echo "<td>" . $row['group_stud'] . "</td>";
        echo "<td>" . $row['num_stud'] . "</td>";
        echo "<td>" . $row['tel_stud'] . "</td>";
        echo "<td><a href='edit_students.php?id_students=" . $row['id_students']
            . "'>Редактировать</a></td>"; // запуск скрипта для редактирования
        echo "<td><a href='delete_students.php?id_students=" . $row['id_students']
            . "'>Удалить</a></td>"; // запуск скрипта для удаления записи
        echo "</tr>";
    }
    print "</table>";
    $num_rows = mysqli_num_rows($result); // число записей в таблице БД
    print("<P>Всего Студентов: $num_rows </p>");
    if ($_SESSION['type'] == 1) {
        echo "<p><a href=new_students.php> Добавить Студента</a>";
        echo "<p><a href=vedomost.php>Зачетная ведомость</a>";
        echo "<p><a href=subject.php>Предмет</a>";
        echo "<p><a href=edit_users.php?id_u=" . $_SESSION['id_u'] . "> Изменить данные Оператора</a>";
    } elseif ($_SESSION['type'] == 2) {
        echo "<p><a href=new_students.php> Добавить Студента</a>";
        echo "<p><a href=vedomostAdm.php>Зачетная ведомость</a>";
        echo "<p><a href=subjectAdm.php>Предмет</a>";
        echo "<p><a href=usersAdm.php>Изменить данные Пользователей</a>";
    }
    echo "<p><a href=gen_pdf.php>Скачать pdf-файл</a>";
    echo "<p><a href=gen_xls.php>Скачать xls-файл</a>";
    include("checkSession.php");
    ?>
</body>
</html>