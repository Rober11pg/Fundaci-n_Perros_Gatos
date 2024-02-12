<?php
include_once(__DIR__."/../ClassConsultasBD.php");
$raza = new ClassRaza();
$raza->setNombreRaza($_POST['nombre']);
$raza->setPrecio($_POST['precio']);
$raza->setEspecieID($_POST['id_especie']);


$obd = new ClassConsultasBD();
$obd->InsertarRaza($raza);
?>