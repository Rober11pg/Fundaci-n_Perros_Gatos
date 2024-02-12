<?php
$value = $_REQUEST['var'];

switch ($value) {
    case 1: include_once("../View/VAddCliente.html"); break;
    case 2: include_once("../View/VAddMascota.php"); break;
    case 3: include_once("../View/VAddRaza.php"); break;
    case 4: include_once("../View/VAddEspecie.php"); break;
    case 5: include_once("../View/VAddAdquiere.php"); break;
    case 6: include_once("../View/VConsultaMascota.php"); break;
    case 7: include_once("../View/VBusquedaMascota_Campos.php"); break;
    case 8: include_once("../View/VConsultaCliente.php"); break;
    case 9: include_once("../View/VBusquedaCliente_Campos.php"); break;
    case 10: include_once("../Model/Reportes/MCliente.php"); break;
    case 11: include_once("../Model/Reportes/MMascota.php"); break;
    case 12: include_once("../Model/Reportes/MEspecie.php"); break;
    default:
        echo "Ningua opción";
        break;
}
    
?>