<?php
include(__DIR__. "/../ClassConsultasBD.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Fecha = new DateTime($_POST['fecha_i']);
    $mascota = new ClassMascota();
    $mascota->setApodo($_POST['apodo']);
    $mascota->setSexo($_POST['sexo']);
    $mascota->setRazaID($_POST['id_raza']);
    $mascota->setEdadRelativa($_POST['edad']);
    $mascota->setEstadoAdopcion("disponible");

    if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
        $nombreArchivo = $_FILES['foto']['name'];
        $rutaTemporal = $_FILES['foto']['tmp_name'];
        $rutaDestino =__DIR__. "/../../View/img/" . $nombreArchivo;

        // Mover el archivo cargado a la carpeta de destino
        if (move_uploaded_file($rutaTemporal, $rutaDestino)) {
            // Guardar el nombre del archivo en la base de datos
            $mascota->setFotoMascota($nombreArchivo);
        } else {
            echo "Error al mover el archivo.";
            exit;
        }
    } else {
        echo "No se ha proporcionado ninguna imagen o ha ocurrido un error al cargarla.";
        exit;
    }
   
    $mascota->setFechaIngreso($Fecha->format('Y-m-d'));
    $obd = new ClassConsultasBD();
    $obd->InsertarMascota($mascota);
} else {
    echo "No se ha enviado el formulario.";
}
?>