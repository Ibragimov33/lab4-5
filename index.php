<!DOCTYPE html>
<html lang="en">
<body>
<form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
    <h2>Авторизация</h2>
    Введите Логин: <input type="text" name="user"> <br>
    Введите Пароль: <input type="password" name="pass"> <br>
    <input type="submit" name="come" value="Войти"> <br>
    <input type="reset" name="reset" value="Очистить"> <br>
</form>
<?php
require_once 'connect1.php';
if (isset($_POST["come"])) {
    $link = mysqli_connect($host, $user, $password, $database) or die ("Невозможно
подключиться к серверу" . mysqli_error($link));
    $user = $link->query("SELECT id_u, username, password, type FROM users");
    // Ввод
    $username = $_POST["user"];
    $password = $_POST["pass"];
    // Для индитификации входа
    $errFlag = false;
    // Проверка вводимых данных
    while ($data = mysqli_fetch_array($user)) {
        $usernameBD = $data['username'];
        $passwordBD = $data['password'];
        $typeBD = $data['type'];
        $idUserBD = $data['id_u'];

        if ($username === $usernameBD && md5($password) === $passwordBD) {
            $errFlag = true;
            session_start();
            $_SESSION['type'] = $typeBD;
            $_SESSION['id_u'] = $idUserBD;
            break;
        } else
            $errFlag = false;
    }

    if ($errFlag && $_SESSION['type'] == 1)
        header("Refresh:0; url=students.php");
    elseif ($errFlag && $_SESSION['type'] == 2)
        header("Refresh:0; url=studentsAdm.php");
    else
        echo "Логин или пароль введен не верно";

}
?>
<br>
</body>
</html>