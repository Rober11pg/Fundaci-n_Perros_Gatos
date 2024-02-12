<?php

include_once(__DIR__ . '/../../View/VPlantillaReporte.php');
include_once(__DIR__ . "/../ClassConsultasBD.php");

$obd = new ClassConsultasBD();
$ListaEspecie = $obd->ConsultarEspecies();
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

$cellWidthEspecieID = 40;
$cellWidthNombreEspecie = 40;

// 2. Set cell padding:
$cellPadding = 3;

// 3. Add spacing between cells (optional):
$cellSpacing = 2;

$ancho_total = $pdf->GetPageWidth();
$ancho_celda = 25; // Ancho de cada celda
$espacio_celdas = $ancho_celda * 4; // Espacio ocupado por las celdas
$posicion_x = ($ancho_total - $espacio_celdas) / 2;

$pdf->Ln(10);
$pdf->SetFont('Arial', 'B', 14);

// Título de la tabla
$pdf->Cell(0, 10, 'Lista de especie', 0, 1, 'C');

// Centrar la primera fila de celdas
$pdf->Cell($posicion_x);
$pdf->Cell($cellWidthEspecieID + $cellSpacing, 6, 'Especie ID', 1, 0, 'C');
$pdf->Cell($cellWidthNombreEspecie + $cellSpacing, 6, 'Nombre Especie', 1, 0, 'C');

$pdf->Ln();

foreach ($ListaEspecie as $x) {
    $pdf->Cell($posicion_x);
    $pdf->Cell($cellWidthEspecieID + $cellSpacing, 6, $x->getEspecieID(), 1, 0, 'C');
    $pdf->Cell($cellWidthNombreEspecie + $cellSpacing, 6, $x->getNombreEspecie(), 1, 0, 'C');
    $pdf->Ln();
}

$pdf->Output('I');
