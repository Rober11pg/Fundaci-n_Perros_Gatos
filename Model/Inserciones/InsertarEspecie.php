<?php

include("../ClassConsultasBD.php");

$oEspecie = new ClassEspecie();

$oEspecie->setEspecieID($_POST['InEspecieID']);
$oEspecie->setNombreEspecie($_POST['InNombreEspecie']);

$oBD = new ClassConsultasBD();

$oBD->InsertarEspecie($oEspecie);