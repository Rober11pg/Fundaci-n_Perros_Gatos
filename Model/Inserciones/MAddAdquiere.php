<<?php
include_once(__DIR__."/../ClassConsultasBD.php");
$Fecha = new DateTime($_POST['fecha_compra']);
$adquiere = new ClassAdquiere();
$adquiere->setUsuarioID($_POST['id_usuario']);
$adquiere->setMascotaID($_POST['id_mascota']);
$adquiere->setFechaCompra($Fecha->format('Y-m-d'));
$adquiere->setCantidad($_POST['cantidad']);
$adquiere->setMontoPagado($_POST['monot_p']);
$obd = new ClassConsultasBD();
$obd->InsertarAdquiere($adquiere);
?>