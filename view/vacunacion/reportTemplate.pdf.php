<?php 

class PDf extends FPDF{
    function Footer() {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Page '. $this->PageNo() . '/{nb}', 0,0,'C' );
    }
}

$pdf = new PDF('P', 'mm', 'letter');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Ln(10);
$pdf->SetFont('Arial', 'B', 25);
$pdf->Cell(80);
$pdf->Cell(30, 10, $mensaje, 0,0, 'C');

$pdf->Ln(20);
$pdf->SetFont('Arial', 'B', 15);
$pdf->Cell(40);
$pdf->Cell(20, 10, utf8_encode('Id'), 1, 0, 'C');
$pdf->Cell(60, 10, utf8_encode('Fecha'), 1, 0, 'C');
$pdf->Cell(30, 10, utf8_encode('Empleado'), 1, 0, 'C');
$pdf->Ln();
foreach ($objVacunacion as $key){
    $pdf->Cell(40);
    $pdf->Cell(20, 10, utf8_encode($key->id), 1);
    $pdf->Cell(60, 10, utf8_encode($key->fecha), 1);
    $pdf->Cell(30, 10, utf8_encode($key->usuario_id), 1);
  $pdf->Ln();  
}

$pdf->Output();
