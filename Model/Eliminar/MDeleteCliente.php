<?php
include_once(__DIR__."/../ClassConsultasBD.php");
$obd = new ClassConsultasBD();
$obd->EliminarUsuarioPorID($_GET['id']);
// Redireccionar a la misma página
header("Location: ../../Controller/controlador.php?var=8");
?>

