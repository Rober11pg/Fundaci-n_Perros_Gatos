<?php

include_once(__DIR__.'/../../View/VPlantillaHorizontal.php');
include_once(__DIR__."/../ClassConsultasBD.php");

$obd = new ClassConsultasBD();
$ListaUsuario = $obd->ConsultarUsuarios();

// PDF instance
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->setHorizontalLandscape();

$cellWidthUsuarioID = 40;
$cellWidthNombre = 50;
$cellWidthApellido = 50;
$cellWidthSexo = 30;
$cellWidthCorreo = 70;
$cellWidthClave = 35;
$cellWidthTipoUsuario = 35;
$cellWidthTelefono = 50;

// 2. Set cell padding:
$cellPadding = 3;

// 3. Add spacing between cells (optional):
$cellSpacing = 2;

$pdf->Ln(20);
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell($cellWidthUsuarioID + $cellSpacing, 6, 'UsuarioID', 1, 0, 'C');
$pdf->Cell($cellWidthNombre + $cellSpacing, 6, 'Nombre', 1, 0, 'C');
$pdf->Cell($cellWidthApellido + $cellSpacing, 6, 'Apellido', 1, 0, 'C');
$pdf->Cell($cellWidthSexo + $cellSpacing, 6, 'Sexo', 1, 0, 'C');
$pdf->Cell($cellWidthCorreo + $cellSpacing, 6, 'CorreoElectronico', 1, 0, 'C');
$pdf->Cell($cellWidthClave + $cellSpacing, 6, 'Clave', 1, 0, 'C');
$pdf->Cell($cellWidthTipoUsuario + $cellSpacing, 6, 'TipoUsuario', 1, 0, 'C');
$pdf->Cell($cellWidthTelefono + $cellSpacing, 6, 'NumeroTelefono', 1, 0, 'C');

foreach ($ListaUsuario as $x) 
{
    $pdf->Ln(6);

    $pdf->Cell($cellWidthUsuarioID + $cellSpacing, 6, $x->getUsuarioID(), 1, 0, 'C');
    $pdf->Cell($cellWidthNombre + $cellSpacing, 6, $x->getNombre(), 1, 0, 'C');
    $pdf->Cell($cellWidthApellido + $cellSpacing, 6, $x->getApellido(), 1, 0, 'C');
    $pdf->Cell($cellWidthSexo + $cellSpacing, 6, $x->getSexo(), 1, 0, 'C');
    $pdf->Cell($cellWidthCorreo + $cellSpacing, 6, $x->getCorreoElectronico(), 1, 0, 'C');
    $pdf->Cell($cellWidthClave + $cellSpacing, 6, $x->getClave(), 1, 0, 'C');
    $pdf->Cell($cellWidthTipoUsuario + $cellSpacing, 6, $x->getTipoUsuario(), 1, 0, 'C');
    $pdf->Cell($cellWidthTelefono + $cellSpacing, 6, $x->getNumeroTelefono(), 1, 0, 'C');
}

$pdf -> Output('I');