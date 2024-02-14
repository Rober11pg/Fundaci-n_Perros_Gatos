<?php
include_once(__DIR__."/../ClassConsultasBD.php");

$correo = $_POST['correo'];
$idUsuario = $_POST['id_usuario']; // Obtener el ID del usuario actual
$correoActual = $_POST['correo_actual']; // Obtener el correo electrónico actual
$obd = new ClassConsultasBD();
$usuarios = $obd->ConsultarUsuarios();
$correoExistente = false;

foreach ($usuarios as $usuario) {
    if ($usuario->getCorreoElectronico() === $correo && $usuario->getUsuarioID() != $idUsuario) {
        $correoExistente = true;
        break;
    }
}

if ($correoExistente) {
    $mensaje = "El correo electrónico ingresado ya está registrado para otro usuario. Por favor, ingrese otro correo.";
} else {
    // Si el correo no existe para otro usuario, proceder con la actualización del usuario
    $usuario = new ClassUsuario();
    $usuario->setUsuarioID($_POST['id']);
    $usuario->setNombre($_POST['nombre']);
    $usuario->setApellido($_POST['apellido']);
    $usuario->setSexo($_POST['sexo']);
    $usuario->setCorreoElectronico($_POST['correo']);
    $usuario->setClave($_POST['psw']);
    $usuario->setTipoUsuario($_POST['t_usuario']);
    $usuario->setNumeroTelefono($_POST['telf']);
    $obd->ActualizarUsuarioPorID($usuario);
    $mensaje = "Usuario Actualizado correctamente.";
}

// Devolver el mensaje como respuesta
echo $mensaje;
?>