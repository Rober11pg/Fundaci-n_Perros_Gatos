<?php
include_once(__DIR__."/../ClassConsultasBD.php");
$obd = new ClassConsultasBD();
$obd->EliminarRazaPorID($_GET['id']);
header("Location: ../../Controller/controlador.php?var=17");

?>