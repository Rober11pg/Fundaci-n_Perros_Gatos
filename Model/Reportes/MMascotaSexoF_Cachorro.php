<?php

include_once(__DIR__.'/../../View/VPlantillaHorizontal.php');
include_once(__DIR__."/../ClassConsultasBD.php");
include_once(__DIR__ . '/../../View/Script/Func/ClassRotulosFKs.php');

$obd = new ClassConsultasBD();
$ListaMascota =  $obd->BuscarMascotaPorCampos(null, 'F', null, 'cachorro');

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

$ancho_total = $pdf->GetPageWidth();
$ancho_celda = 90; // Ancho de cada celda
$espacio_celdas = $ancho_celda * 4; // Espacio ocupado por las celdas
$posicion_x = ($ancho_total - $espacio_celdas) / 2;


$pdf->Ln(15); // Saltar a la posición Y definida
$pdf->SetFont('Arial', 'B', 14);
// Título de la tabla
$pdf->Cell(0, 10, 'Lista de Mascotas hembras cachorras', 0, 1, 'C');

// Encabezados de columna
$pdf->Cell($posicion_x);
$pdf->Cell($cellWidthMascotaID, 7, 'MascotaID ', 1, 0, 'C');
$pdf->Cell($cellWidthApodo, 7, 'Apodo', 1, 0, 'C');
$pdf->Cell($cellWidthSexo, 7, 'Sexo', 1, 0, 'C');
$pdf->Cell($cellWidthRazaID, 7, 'Raza', 1, 0, 'C');
$pdf->Cell($cellWidthEdadRelativa, 7, 'Edad Relativa', 1, 0, 'C');
$pdf->Cell($cellWidthEstadoAdopcion, 7, 'Estado Adopcion', 1, 0, 'C');
$pdf->Cell($cellWidthFotoMascota, 7, 'Foto Mascota', 1, 0, 'C');
$pdf->Cell($cellWidthFechaIngreso, 7, 'Fecha Ingreso', 1, 1, 'C');

// Cambia el id por el nombre del rotulo 
$orotulo = new ClassRotulosFKs();
// Datos de la tabla
foreach ($ListaMascota as $x)
{
    $pdf->Cell($posicion_x);
    $pdf->Cell($cellWidthMascotaID, 7, $x->getMascotaID(), 1, 0, 'C');
    $pdf->Cell($cellWidthApodo, 7, $x->getApodo(), 1, 0, 'C');
    $pdf->Cell($cellWidthSexo, 7, $orotulo->RotuloFK_SexoMascota($x->getMascotaID()), 1, 0, 'C');
    $pdf->Cell($cellWidthRazaID, 7, $orotulo->RotuloFK_Raza($x->getRazaID()), 1, 0, 'C');
    $pdf->Cell($cellWidthEdadRelativa, 7, $x->getEdadRelativa(), 1, 0, 'C');
    $pdf->Cell($cellWidthEstadoAdopcion, 7, $x->getEstadoAdopcion(), 1, 0, 'C');
    $pdf->Cell($cellWidthFotoMascota, 7, $x->getFotoMascota(), 1, 0, 'C');
    $pdf->Cell($cellWidthFechaIngreso, 7, $x->getFechaIngreso(), 1, 1, 'C');
}

$pdf -> Output('I');
?>
