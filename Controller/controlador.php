<?php
$value = $_REQUEST['var'];

switch ($value) {
    case 1: include("../View/VAddCliente.html"); break;
    case 2: include("../View/VAddMascota.php"); break;
    case 3: include("../View/VAddRaza.php"); break;
    case 4: include("../View/VAddEspecie.php"); break;
    case 5: include("../View/VAddAdquiere.php"); break;
    case 6: include("../View/VConsultaMascota.php"); break;
    case 7: include("../View/VBusquedaMascota_Campos.php"); break;
    case 8: include("../View/VConsultaCliente.php"); break;
    case 9: include("../View/VBusquedaCliente_Campos.php"); break;
    case 10: include("../Model/Reportes/MCliente.php"); break;
    case 11: include("../Model/Reportes/MMascota.php"); break;
    case 12: include("../Model/Reportes/MEspecie.php"); break;
    default:
        echo "Ningua opción";
        break;
}
    
?>