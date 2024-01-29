<?php

include("../ClassConsultasBD.php");

$oBD = new ClassConsultasBD();

$ArregloEspecies = $oBD->ConsultarEspecies();

foreach ($ArregloEspecies as $x) {
    echo $x->getNombreEspecie();
}

