<?php

include_once(__DIR__.'/../../View/VPlantillaHorizontal.php');
include_once(__DIR__."/../ClassConsultasBD.php");

$obd = new ClassConsultasBD();
$ListaMascota = $obd->ConsultarMascotas();

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->setHorizontalLandscape();

$cellWidthMascotaID = 35;
$cellWidthApodo = 35;
$cellWidthSexo = 35;
$cellWidthRazaID= 35;
$cellWidthEdadRelativa= 35;
$cellWidthEstadoAdopcion= 40;
$cellWidthFotoMascota= 50;
$cellWidthFechaIngreso= 35;

// 2. Set cell padding:
$cellPadding = 3;

// 3. Add spacing between cells (optional):
$cellSpacing = 2;


$ancho_total = $pdf->GetPageWidth();
$ancho_celda = 95; // Ancho de cada celda
$espacio_celdas = $ancho_celda * 4; // Espacio ocupado por las celdas
$posicion_x = ($ancho_total - $espacio_celdas) / 2;

$pdf->Ln(20);
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell($posicion_x);
$pdf->Cell($cellWidthMascotaID + $cellSpacing, 6, 'MascotaID ', 1, 0, 'C');
$pdf->Cell($cellWidthApodo + $cellSpacing, 6, 'Apodo', 1, 0, 'C');
$pdf->Cell($cellWidthSexo + $cellSpacing, 6, 'Sexo', 1, 0, 'C');
$pdf->Cell($cellWidthRazaID + $cellSpacing, 6, 'RazaID', 1, 0, 'C');
$pdf->Cell($cellWidthEdadRelativa + $cellSpacing, 6, 'EdadRelativa', 1, 0, 'C');
$pdf->Cell($cellWidthEstadoAdopcion + $cellSpacing, 6, 'EstadoAdopcion', 1, 0, 'C');
$pdf->Cell($cellWidthFotoMascota + $cellSpacing, 6, 'FotoMascota', 1, 0, 'C');
$pdf->Cell($cellWidthFechaIngreso + $cellSpacing, 6, 'FechaIngreso', 1, 0, 'C');


foreach ($ListaMascota as $x)
{
    $pdf->Ln();
    $pdf->Cell($posicion_x);
    $pdf->Cell($cellWidthMascotaID + $cellSpacing, 6, $x->getMascotaID(), 1, 0, 'C');
    $pdf->Cell($cellWidthApodo + $cellSpacing, 6, $x->getApodo(), 1, 0, 'C');
    $pdf->Cell($cellWidthSexo + $cellSpacing, 6, $x->getSexo(), 1, 0, 'C');
    $pdf->Cell($cellWidthRazaID + $cellSpacing, 6, $x->getRazaID(), 1, 0, 'C');
    $pdf->Cell($cellWidthEdadRelativa + $cellSpacing, 6, $x->getEdadRelativa(), 1, 0, 'C');
    $pdf->Cell($cellWidthEstadoAdopcion + $cellSpacing, 6, $x->getEstadoAdopcion(), 1, 0, 'C');
    $pdf->Cell($cellWidthFotoMascota + $cellSpacing, 6, $x->getFotoMascota(), 1, 0, 'C');
    $pdf->Cell($cellWidthFechaIngreso + $cellSpacing, 6, $x->getFechaIngreso(), 1, 0, 'C');
    
}
$pdf -> Output('I');
?>