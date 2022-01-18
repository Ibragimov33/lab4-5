<html>
<h1>Ибрагимов Айдар</h1>
<head><title> Добавление нового пользователя </title></head>
<body>
<H2>Регистрация на сайте:</H2>
<?php include("checks.php");
echo "
<form action=save_new_users.php metod=get>
    <br>Логин: <input name=username size=50 type=text>
    <br>Пароль: <input name=password size=50 type=password>
    <br>Тип: <input name=type size=1 type=int>
    <p><input name=add type=submit value=Добавить>
        <input name=b2 type=reset value=Очистить></p>
</form>";
?>
<?php
if ($_SESSION['type'] == 1)
    echo "Недостаточно прав . <p><a href=students.php> Вернуться к списку Студентов </a>";
elseif ($_SESSION['type'] == 2)
    echo "<p><a href=studentsAdm.php> Вернуться к списку Студентов </a>";
?>
</body>
</html>