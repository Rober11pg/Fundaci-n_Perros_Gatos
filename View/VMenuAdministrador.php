<?php
include_once(__DIR__ . "/../Model/ClassConsultasBD.php");
session_start(); // Iniciar la sesión si no está iniciada

if (!isset($_SESSION['usuario'])) {
    include_once(__DIR__ . "/VLogin.php");
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
            <li><a href="./../Controller/controlador.php?var=1">Ingresar cliente</a></li>
            <li><a href="./../Controller/controlador.php?var=4">Ingresar especie</a></li>
            <li><a href="./../Controller/controlador.php?var=3">Ingresar raza</a></li>
            <li><a href="./../Controller/controlador.php?var=2">Ingresar mascota</a></li>
            <li><a href="./../Controller/controlador.php?var=8">Editar Eliminar cliente</a></li>
            <li><a href="./../Controller/controlador.php?var=16">Editar Eliminar especie</a></li>
            <li><a href="./../Controller/controlador.php?var=17">Editar Eliminar raza</a></li>
            <li><a href="./../Controller/controlador.php?var=6">Editar Eliminar mascota</a></li>
            <li><a href="./../Controller/controlador.php?var=9">Buscar cliente</a></li>

            <li><a href="./../Controller/controlador.php?var=10">Reporte Cliente</a></li>
            <li><a href="./../Controller/controlador.php?var=11">Reporte Mascota</a></li>
            <li><a href="./../Controller/controlador.php?var=12">Reporte Especie</a></li>
            <li><a href="./../Controller/controlador.php?var=13">Reporte Raza</a></li>
            <li><a href="./../Controller/controlador.php?var=14">Reporte Adquiere</a></li>
            <li><a href="./../Controller/controlador.php?var=15">Reporte Mascato (Campos)</a></li>
        </ul>
    </main>
</body>

</html>