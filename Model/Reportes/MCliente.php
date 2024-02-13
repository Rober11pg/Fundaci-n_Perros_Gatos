<?php

include_once(__DIR__.'/../../View/VPlantillaHorizontal.php');
include_once(__DIR__."/../ClassConsultasBD.php");
include_once(__DIR__ . '/../../View/Script/Func/ClassRotulosFKs.php');


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

$pdf->Ln(10);
$pdf->SetFont('Arial', 'B', 14);
// Título de la tabla
$pdf->Cell(0, 10, 'Lista de usuarios', 0, 1, 'C');
$pdf->Cell($cellWidthUsuarioID + $cellSpacing, 6, 'Usuario ID', 1, 0, 'C');
$pdf->Cell($cellWidthNombre + $cellSpacing, 6, 'Nombre', 1, 0, 'C');
$pdf->Cell($cellWidthApellido + $cellSpacing, 6, 'Apellido', 1, 0, 'C');
$pdf->Cell($cellWidthSexo + $cellSpacing, 6, 'Sexo', 1, 0, 'C');
$pdf->Cell($cellWidthCorreo + $cellSpacing, 6, 'Correo Electronico', 1, 0, 'C');
$pdf->Cell($cellWidthClave + $cellSpacing, 6, 'Clave', 1, 0, 'C');
$pdf->Cell($cellWidthTipoUsuario + $cellSpacing, 6, 'Tipo Usuario', 1, 0, 'C');
$pdf->Cell($cellWidthTelefono + $cellSpacing, 6, 'Numero Telefono', 1, 0, 'C');

$orotulo = new ClassRotulosFKs();
foreach ($ListaUsuario as $x) 
{
    $pdf->Ln(6);

    $pdf->Cell($cellWidthUsuarioID + $cellSpacing, 6, $x->getUsuarioID(), 1, 0, 'C');
    $pdf->Cell($cellWidthNombre + $cellSpacing, 6, $x->getNombre(), 1, 0, 'C');
    $pdf->Cell($cellWidthApellido + $cellSpacing, 6, $x->getApellido(), 1, 0, 'C');
    $pdf->Cell($cellWidthSexo + $cellSpacing, 6, $orotulo->RotuloFK_SexoUsuario($x->getUsuarioID()), 1, 0, 'C');
    $pdf->Cell($cellWidthCorreo + $cellSpacing, 6, $x->getCorreoElectronico(), 1, 0, 'C');
    $pdf->Cell($cellWidthClave + $cellSpacing, 6, $x->getClave(), 1, 0, 'C');
    $pdf->Cell($cellWidthTipoUsuario + $cellSpacing, 6, $x->getTipoUsuario(), 1, 0, 'C');
    $pdf->Cell($cellWidthTelefono + $cellSpacing, 6, $x->getNumeroTelefono(), 1, 0, 'C');
}

$pdf -> Output('I');