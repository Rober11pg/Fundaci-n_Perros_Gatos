<?php
include_once(__DIR__.'/../../View/VPlantillaReporte.php');
include_once(__DIR__."/../ClassConsultasBD.php");
include_once(__DIR__ . '/../../View/Script/Func/ClassRotulosFKs.php');
$obd = new ClassConsultasBD();
$ListaRaza = $obd->ConsultarRazas();


$pdf = new PDF();
$pdf -> AliasNbPages();
$pdf -> AddPage();


$ancho_total = $pdf->GetPageWidth();
$ancho_celda = 35; // Ancho de cada celda
$espacio_celdas = $ancho_celda * 4; // Espacio ocupado por las celdas
$posicion_x = ($ancho_total - $espacio_celdas) / 2;

$pdf->Ln(10);
$pdf->SetFont('Arial', 'B', 14);

// Título de la tabla
$pdf->Cell(0, 10, 'Lista de raza', 0, 1, 'C');

$pdf->Cell($posicion_x);
$pdf->Cell(30, 6, 'Raza', 1, 0, 'C');
$pdf->Cell(40, 6, 'Nombre Raza', 1, 0, 'C');
$pdf->Cell(30, 6, 'Precio', 1, 0, 'C');
$pdf->Cell(30, 6, 'Especie', 1, 0, 'C');

// cambia el id por un rotulo
$orotulo = new ClassRotulosFKs();
foreach($ListaRaza as $x)
{
    $pdf->Ln(6);
    $pdf->Cell($posicion_x);
    $pdf->Cell(30, 6, $x->getRazaID(), 1, 0, 'C');
    $pdf->Cell(40, 6,  $x->getNombreRaza(), 1, 0, 'C');
    $pdf->Cell(30, 6,  $x->getPrecio(), 1, 0, 'C');
    $pdf->Cell(30, 6,  $orotulo->RotuloFK_Especie($x->getEspecieID()), 1, 0, 'C');
}

$pdf -> Output('I');
?>