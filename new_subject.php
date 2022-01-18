<html>
<h1>Ибрагимов Айдар</h1>
<head><title> Добавление нового Предмета </title></head>
<body>
<H2>Добавление нового Предмета:</H2>
<?php include("checks.php"); ?>
<form action="save_new_subject.php" method="get">
    Предмет: <input name="name_subject" size="50" type="text">
    <br>ФИО преподавателя: <input name="fio_subject" size="50" type="text">
    <p><input name="add" type="submit" value="Добавить">
        <input name="b2" type="reset" value="Очистить"></p>
</form>
<?php
if ($_SESSION['type'] == 1)
    echo "<p><a href=subject.php> Вернуться к списку Предметов </a>";
elseif ($_SESSION['type'] == 2)
    echo "<p><a href=subjectAdm.php> Вернуться к списку Предметов </a>";
?>
</body>
</html>
