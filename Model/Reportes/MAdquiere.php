<?php
include_once(__DIR__.'/../../View/VPlantillaHorizontal.php');
include_once(__DIR__."/../ClassConsultasBD.php");

$obd = new ClassConsultasBD();
$ListaAdquire = $obd->ConsultarAdquieres();

$pdf = new PDF();
$pdf -> AliasNbPages();
$pdf->AliasNbPages();
$pdf->setHorizontalLandscape();

$ancho_total = $pdf->GetPageWidth();
$ancho_celda = 80; // Ancho de cada celda
$espacio_celdas = $ancho_celda * 4; // Espacio ocupado por las celdas
$posicion_x = ($ancho_total - $espacio_celdas) / 2;

$pdf->Ln(10);
$pdf->SetFont('Arial', 'B', 14);
// Título de la tabla
$pdf->Cell(0, 10, 'Lista de Adquisicion', 0, 1, 'C');
$pdf->Cell($posicion_x);
$pdf->Cell(45, 6, 'Compra ID', 1, 0, 'C');
$pdf->Cell(45, 6, 'Usuario ID', 1, 0, 'C');
$pdf->Cell(45, 6, 'Mascota ID', 1, 0, 'C');
$pdf->Cell(45, 6, 'Fecha Compra', 1, 0, 'C');
$pdf->Cell(45, 6, 'Cantidad', 1, 0, 'C');
$pdf->Cell(45, 6, 'Monto Pagado', 1, 0, 'C');

foreach ($ListaAdquire as $x)
{
    $pdf->Ln();
    $pdf->Cell($posicion_x);
    $pdf->Cell(45, 6, $x->getCompraID(), 1, 0, 'C');
    $pdf->Cell(45, 6, $x->getUsuarioID(), 1, 0, 'C');
    $pdf->Cell(45, 6, $x->getMascotaID(), 1, 0, 'C');
    $pdf->Cell(45, 6, $x->getFechaCompra(), 1, 0, 'C');
    $pdf->Cell(45, 6, $x->getCantidad(), 1, 0, 'C');
    $pdf->Cell(45, 6, $x->getMontoPagado(), 1, 0, 'C');
}

$pdf -> Output('I');
?>