<?php
include("checks.php");
require_once 'connect1.php';
$mysqli = new mysqli($host, $user, $password, $database) or die ("Невозможно
подключиться к серверу");
$id_students = $_GET['id_students'];
if ($_SESSION['type'] == 2)
    $result = $mysqli->query("DELETE FROM students WHERE id_students ='$id_students'");
else
    echo "Недостаточно прав";
header("Location: studentsAdm.php");
exit;
?>
