<?php

include("../ClassConsultasBD.php");

$oEspecie = new ClassEspecie();
$oEspecie->setNombreEspecie($_POST['nombre']);

$oBD = new ClassConsultasBD();

$oBD->InsertarEspecie($oEspecie);