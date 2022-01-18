<?php
$host = 'localhost';
$database = 'a0622996_ibragimov_student';
$user = 'a0622996_ibragimov_student';
$password = '1111';
//require_once 'connect.php';
$link = mysqli_connect($host, $user, $password, $database)
or die("ошибка" . mysqli_error($link));
?>
