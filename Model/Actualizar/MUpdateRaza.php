<?php
include_once(__DIR__."/../ClassConsultasBD.php");


    $razaID = $_POST['id'];
    $nombreRaza = $_POST['nombre'];
    $precio = $_POST['precio'];
    $especieID = $_POST['id_especie'];

    $obd = new ClassConsultasBD();

    // Verificar si la raza ya existe con el mismo nombre
    $razas = $obd->BuscarRazaPorID($razaID);
    $razaExistente = false;

    foreach ($razas as $raza) {
        if ($raza->getNombreRaza() === $nombreRaza && $raza->getRazaID() != $razaID) {
            $razaExistente = true;
            break;
        }
    }

    if ($razaExistente) {
        $mensaje = "Ya existe una raza con el mismo nombre.";
    } else {
        // Si la raza no existe con el mismo nombre, proceder con la actualización
        $oraza = new ClassRaza();
        $oraza->setRazaID($razaID);
        $oraza->setNombreRaza($nombreRaza);
        $oraza->setPrecio($precio);
        $oraza->setEspecieID($_POST['id_especie']);
       
        $obd->ActualizarRazaPorID($oraza);
        $mensaje = "Raza Actualizada correctamente.";
    }

    // Devolver el mensaje como respuesta
    echo $mensaje;
?>