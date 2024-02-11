<?php
include(__DIR__."/../ClassConsultasBD.php");
$usuario = new ClassUsuario();
$usuario->setNombre($_POST['nombre']);
$usuario->setApellido($_POST['apellido']);
$usuario->setSexo($_POST['sexo']);
$usuario->setCorreoElectronico($_POST['correo']);
$usuario->setClave($_POST['psw']);
$usuario->setTipoUsuario($_POST['t_usuario']);
$usuario->setNumeroTelefono($_POST['telf']);
$obd = new ClassConsultasBD();
$obd->InsertarUsuario($usuario);
?>