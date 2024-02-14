<?php
include_once(__DIR__."/../Model/ClassConsultasBD.php");
session_start(); // Iniciar la sesión si no está iniciada

if (!isset($_SESSION['usuario'])) {
    include_once(__DIR__."/VLogin.php");
    exit();
}

$usuario = $_SESSION['usuario'];    
echo "Bienvenido, " . $usuario->getNombre() . " " . $usuario->getApellido();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
</head>
<body>
    <form method="post" action="./../index.html">
        <button type="submit" name="cerrarsesion">Cerrar sesión</button>
    </form>

    <main>
        <ul> 
        <li><a href="./../Controller/controlador.php?var=7">Adoptar/Comprar Mascota</a></li>
        </ul>
    </main>
</body>
</html>
