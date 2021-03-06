<?php

use mvc\routing\routingClass as routing;

class PDf extends FPDF {

    function Footer() {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }

}

$pdf = new PDF('P', 'mm', 'letter');
$pdf->AliasNbPages();
$pdf->AddPage();
//$image = $pdf->Image(routing::getInstance()->getUrlImg('reporte.jpg'), 0, 0, 218, 300 );


$pdf->Ln(100);
$pdf->SetFont('Arial', 'B', 25);
$pdf->Cell(30);
$pdf->Cell(130, 10, $mensajeDetalle, 0, 0, 'C');


$pdf->Ln(20);
$pdf->SetFont('Arial', 'B', 15);
$pdf->Cell(45);
$pdf->Cell(20, 10, utf8_encode('N.'), 1, 0, 'C');
$pdf->Cell(60, 10, utf8_encode('Fecha'), 1, 0, 'C');
$pdf->Cell(30, 10, utf8_encode('Usuario'), 1, 0, 'C');
$pdf->Ln();
foreach ($objVacunacion as $key) {
$pdf->Cell(45);
$pdf->Cell(20, 10, utf8_encode($key->id), 1,0,'C');
    $pdf->Cell(60, 10, utf8_encode($key->fecha), 1,0,'C');
    $pdf->Cell(30, 10, utf8_encode(empleadoTableClass::getNameEmpleado($key->usuario_id)), 1,0,'C');
    $pdf->Ln();
}
$pdf->Ln(20);
$pdf->SetFont('Arial', 'B', 15);
$pdf->Cell(02);
$pdf->Cell(20, 10, utf8_encode('N.'), 1, 0, 'C');
$pdf->Cell(60, 10, utf8_encode('Id Documento'), 1, 0, 'C');
$pdf->Cell(30, 10, utf8_encode('Porcino'), 1, 0, 'C');
$pdf->Cell(60, 10, utf8_encode('Insumo'), 1, 0, 'C');
$pdf->Cell(30, 10, utf8_encode('Cantidad'), 1, 0, 'C');
$pdf->Ln();
foreach ($objDetalleVacunacion as $key) {
    $pdf->Cell(02);
    $pdf->Cell(20, 10, utf8_encode($key->id), 1,0,'C');
    $pdf->Cell(60, 10, utf8_encode($key->id_doc), 1,0,'C');
    $pdf->Cell(30, 10, utf8_encode($key->id_porcino), 1,0,'C');
    $pdf->Cell(60, 10, insumoTableClass::getNameInsumo($key->id_insumo), 1, 0, 'C');
    $pdf->Cell(30, 10, utf8_encode($key->cantidad), 1,0,'C');
    $pdf->Ln();
}


$pdf->Output();


