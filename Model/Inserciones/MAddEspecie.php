<?php

include("../ClassConsultasBD.php");

$oEspecie = new ClassEspecie();

$oEspecie->setEspecieID($_POST['id']);
$oEspecie->setNombreEspecie($_POST['nombre']);

$oBD = new ClassConsultasBD();

$oBD->InsertarEspecie($oEspecie);