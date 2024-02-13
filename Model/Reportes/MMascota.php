<?php

include_once(__DIR__.'/../../View/VPlantillaHorizontal.php');
include_once(__DIR__."/../ClassConsultasBD.php");
include_once(__DIR__ . '/../../View/Script/Func/ClassRotulosFKs.php');
$obd = new ClassConsultasBD();
$ListaMascota = $obd->ConsultarMascotas();

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->setHorizontalLandscape();

$cellWidthMascotaID = 35;
$cellWidthApodo = 35;
$cellWidthSexo = 35;
$cellWidthRazaID= 35;
$cellWidthEdadRelativa= 40;
$cellWidthEstadoAdopcion= 50;
$cellWidthFotoMascota= 50;
$cellWidthFechaIngreso= 40;

// 2. Set cell padding:
$cellPadding = 3;

// 3. Add spacing between cells (optional):
$cellSpacing = 2;
$f_grande = 40;
// Posición de la tabla 
$ancho_total = $pdf->GetPageWidth();
$ancho_celda = 95; // Ancho de cada celda
$espacio_celdas = $ancho_celda * 4; // Espacio ocupado por las celdas
$posicion_x = ($ancho_total - $espacio_celdas) / 2;

$pdf->Ln(10);
$pdf->SetFont('Arial', 'B', 14);
// Título de la tabla
$pdf->Cell(0, 10, 'Lista de Mascotas', 0, 1, 'C');
$pdf->Cell($posicion_x);
$pdf->Cell($cellWidthMascotaID + $cellSpacing, 6, 'Mascota ID ', 1, 0, 'C');
$pdf->Cell($cellWidthApodo + $cellSpacing, 6, 'Apodo', 1, 0, 'C');
$pdf->Cell($cellWidthSexo + $cellSpacing, 6, 'Sexo', 1, 0, 'C');
$pdf->Cell($cellWidthRazaID + $cellSpacing, 6, 'Raza', 1, 0, 'C');
$pdf->Cell($cellWidthEdadRelativa + $cellSpacing, 6, 'Edad Relativa', 1, 0, 'C');
$pdf->Cell($cellWidthEstadoAdopcion + $cellSpacing, 6, 'Estado Adopcion', 1, 0, 'C');
$pdf->Cell($cellWidthFotoMascota + $cellSpacing, 6, 'Foto Mascota', 1, 0, 'C');
$pdf->Cell($cellWidthFechaIngreso + $cellSpacing, 6, 'Fecha Ingreso', 1, 0, 'C');

// cambia el id por el nombre
$orutolo = new ClassRotulosFKs();
foreach ($ListaMascota as $x)
{
    $pdf->Ln();
    $pdf->Cell($posicion_x);
    $pdf->Cell($cellWidthMascotaID + $cellSpacing, $f_grande, $x->getMascotaID(), 1, 0, 'C');
    $pdf->Cell($cellWidthApodo + $cellSpacing, $f_grande, $x->getApodo(), 1, 0, 'C');
    $pdf->Cell($cellWidthSexo + $cellSpacing, $f_grande, $orutolo->RotuloFK_SexoMascota($x->getMascotaID()), 1, 0, 'C');
    $pdf->Cell($cellWidthRazaID + $cellSpacing, $f_grande, $orutolo->RotuloFK_Raza($x->getRazaID()), 1, 0, 'C');
    $pdf->Cell($cellWidthEdadRelativa + $cellSpacing, $f_grande, $x->getEdadRelativa(), 1, 0, 'C');
    $pdf->Cell($cellWidthEstadoAdopcion + $cellSpacing, $f_grande, $x->getEstadoAdopcion(), 1, 0, 'C');
    $pdf->Cell($cellWidthFotoMascota + $cellSpacing, $f_grande, $x->getFotoMascota(), 1, 0, 'C');
    $pdf->Cell($cellWidthFechaIngreso + $cellSpacing, $f_grande, $x->getFechaIngreso(), 1, 0, 'C');
    
}
$pdf -> Output('I');
?>