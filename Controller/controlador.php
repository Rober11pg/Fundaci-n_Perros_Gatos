<?php
$value = $_REQUEST['var'];

switch ($value) {
    case 1: include("../View/VAddCliente.html"); break;
    case 2: include("../View/VAddMascota.php"); break;
    case 3: include("../View/VAddRaza.php"); break;
    case 4: include("../View/VAddEspecie.php"); break;
    case 5: include("../View/VAddAdquiere.php"); break;
    
    default:
        echo "Ningua opción";
        break;
}
    
?>