<?php
session_start();
include_once(__DIR__."/../Model/ClassConsultasBD.php");
$obd = new ClassConsultasBD();

if(isset($_POST['correo']) && isset($_POST['psw'])) {
    $correoElectronico = $_POST['correo'];
    $clave = $_POST['psw'];

    $usuarioValidado = $obd->ValidarUsuario($correoElectronico, $clave);

    if ($usuarioValidado) {
        $_SESSION['usuario'] = $usuarioValidado; // Guardar información del usuario en la sesión
        $tipoUsuario = $usuarioValidado->getTipoUsuario();
        if ($tipoUsuario === "cliente") {
            header("Location: ../View/VMenuCliente.php");
            exit();
        } elseif ($tipoUsuario === "administrador") {
            header("Location: ../View/VMenuAdministrador.php");
            exit();
        } else {
            echo "Usuario o contraseña incorrectos.";
        }
    } else {
        echo "Usuario o contraseña incorrectos.";
    }
} else {
    echo "Correo electrónico o contraseña no proporcionados.";
}
?>
