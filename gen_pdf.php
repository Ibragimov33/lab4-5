<?php
include("checks.php");
require_once 'connect1.php';
require('tfpdf/tfpdf.php');

$mysqli = new mysqli($host, $user, $password, $database);
if ($mysqli->connect_errno) {
    echo "Не удалось подключиться к БД";
}

$pdf = new tFPDF();
$pdf->AddFont('PDFFont', '', 'cour.ttf');
$pdf->SetFont('PDFFont', '', 12);
$pdf->AddPage();

$pdf->Cell(80);
$pdf->Cell(30, 10, 'Ведомость', 1, 0, 'C');
$pdf->Ln(20);

$pdf->SetFillColor(200, 200, 200);
$pdf->SetFontSize(6);

$header = array("п/п", "Студент", "факультет", "Группа", "Номер зачетки", "Дата сдачи", "Предмет", "Оценка", "Преподватель");
$w = array(6, 33, 15, 20, 20, 20, 30, 20, 17);
$h = 20;
for ($c = 0; $c < 9; $c++) {
    $pdf->Cell($w[$c], $h, $header[$c], 'LRTB', '0', '', true);
}
$pdf->Ln();

// Запрос на выборку сведений о пользователях
$result = $mysqli->query("SELECT
        students.fio_stud as fio_stud,
        students.fac_stud as fac_stud,
        students.group_stud as group_stud,
        students.num_stud as num_stud,
        vedomost.date_vedom,
        subject.name_subject as name_subject,
        vedomost.value,
        subject.fio_subject as fio_subject
        FROM vedomost
        LEFT JOIN students ON vedomost.id_students=students.id_students
        LEFT JOIN subject ON vedomost.id_subject=subject.id_subject"
);

if ($result) {
    $counter = 1;
    // Для каждой строки из запроса
    while ($row = $result->fetch_row()) {
        $pdf->Cell($w[0], $h, $counter, 'LRBT', '0', 'C', true);
        $pdf->Cell($w[1], $h, $row[0], 'LRB');

        for ($c = 2; $c < 9; $c++) {
            if($c == 5) {
                $row[$c - 1] = date('d-m-Y', strtotime($row[$c - 1]));
            }
            $pdf->Cell($w[$c], $h, $row[$c - 1], 'RB');
        }
        $pdf->Ln();
        $counter++;
    }
}

$pdf->Output("I", 'stud.pdf', true);
?>