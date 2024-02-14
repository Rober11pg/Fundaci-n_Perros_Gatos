<?php
include_once(__DIR__."/../ClassConsultasBD.php");

$especieID = $_POST['id'];
$nombreEspecie = $_POST['nombre'];
$obd = new ClassConsultasBD();

// Verificar si la especie ya existe con el mismo nombre
$especies = $obd->ConsultarEspecies();
$especieExistente = false;

foreach ($especies as $x) {
    if ($x->getNombreEspecie() === $nombreEspecie && $x->getEspecieID() !=$especieID) {
        $especieExistente = true;
        break;
    }
}

if ($especieExistente) {
    $mensaje = "Ya existe una especie con el mismo nombre.";
} else {

    // Si la especie no existe con el mismo nombre, proceder con la actualización
    $oespecie = new ClassEspecie();
    $oespecie->setEspecieID($especieID);
    $oespecie->setNombreEspecie($nombreEspecie);
    $obd->ActualizarEspeciePorID($oespecie);
    $mensaje = "Especie Actualizado correctamente.";
}

// Devolver el mensaje como respuesta
echo $mensaje;
?>