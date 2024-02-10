<?php
include(__DIR__."../ClassConsultasBD.php");
$Fecha = new DateTime($_POST['fecha_i']);
$mascota = new ClassMascota();
$mascota->setMascotaID($_POST['id']);
$mascota->setApodo($_POST['apodo']);
$mascota->setSexo($_POST['sexo']);
$mascota->setRazaID($_POST['id_raza']);
$mascota->setEdadRelativa($_POST['edad']);
$mascota->setEstadoAdopcion($_POST['estado']);
$mascota->setFotoMascota($_POST['foto']);
$mascota->setFechaIngreso($Fecha->format('Y-m-d'));
$obd = new ClassConsultasBD();
$obd-> InsertarMascota($mascota);
?>