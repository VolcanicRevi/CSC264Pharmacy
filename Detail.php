<?php
require_once('tcpdf.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $age = isset($_POST['age']) ? $_POST['age'] : '';
    $height = isset($_POST['height']) ? $_POST['height'] . ' cm' : '';
    $weight = isset($_POST['weight']) ? $_POST['weight'] . ' kg' : '';
    $sickness = isset($_POST['sickness']) ? $_POST['sickness'] : '';

    $pdf = new TCPDF();
    $pdf->SetPrintHeader(false);
    $pdf->SetPrintFooter(false);
    $pdf->AddPage();

    // Set font
    $pdf->SetFont('helvetica', '', 12);

    // Header
    $pdf->SetFillColor(240, 240, 240);
    $pdf->Cell(0, 15, 'Clinical Record', 0, 1, 'C', 1);

    // Patient Information Section
    $pdf->Ln(5);
    $pdf->SetFont('helvetica', 'B', 14);
    $pdf->Cell(0, 10, 'Patient Information', 0, 1, 'L');
    $pdf->SetFont('helvetica', '', 12);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->Cell(0, 10, "Name: $name", 0, 1, 'L', 1);
    $pdf->Cell(0, 10, "Age: $age", 0, 1, 'L', 1);
    $pdf->Cell(0, 10, "Height: $height", 0, 1, 'L', 1);
    $pdf->Cell(0, 10, "Weight: $weight", 0, 1, 'L', 1);

    // Sickness Section
    $pdf->Ln(5);
    $pdf->SetFont('helvetica', 'B', 14);
    $pdf->Cell(0, 10, 'Sickness Details', 0, 1, 'L');
    $pdf->SetFont('helvetica', '', 12);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->MultiCell(0, 10, "Sickness: \n$sickness", 0, 'L', 1);

    $pdf->Output('clinical_record.pdf', 'D');
    exit;
}
?>