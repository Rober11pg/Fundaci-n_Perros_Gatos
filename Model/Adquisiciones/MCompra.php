<?php
include_once(__DIR__ . "/../ClassConsultasBD.php");
session_start(); // Iniciar la sesión si no está iniciada

if (!isset($_SESSION['usuario'])) {
    include_once(__DIR__ . "/../../View/VLogin.php");
    exit();
}

$usuario = $_SESSION['usuario'];
// echo "Bienvenido, " . $usuario->getNombre() . " " . $usuario->getApellido();

$IdUsuario = $usuario->getUsuarioId();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comprar Mascota</title>
</head>
<body>
    <main>
        <fieldset>
            <legend><h1>Comprar Mascota</h1></legend>
            <h2>Felicidades Por Su Compra</h2>
            <?php 
            include_once(__DIR__."/../ClassConsultasBD.php");
            include_once(__DIR__ . '/../../View/Script/Func/ClassRotulosFKs.php');

            $oBD = new ClassConsultasBD();
            $oRotulo = new ClassRotulosFKs();

            $IdMascota = $_REQUEST['Id'];
            $oMascota = $oBD->BuscarMascotaPorID($IdMascota);

            $Apodo = "";
            $Raza = "";
            $Especie = "";
            $Precio = 0;

            $IdRaza = 0;
            $IdEspecie = 0;

            $oUpdateMascota = new ClassMascota();
            foreach ($oMascota as $x) 
            {
                $Apodo = $x->getApodo();
                $IdRaza = $x->getRazaID();

                $oUpdateMascota->setMascotaID($IdMascota);
                $oUpdateMascota->setApodo($Apodo);                
                $oUpdateMascota->setSexo($x->getSexo());
                $oUpdateMascota->setRazaID($IdRaza);
                $oUpdateMascota->setEdadRelativa($x->getEdadRelativa());
                $oUpdateMascota->setEstadoAdopcion("vendido");
                $oUpdateMascota->setFotoMascota($x->getFotoMascota());
                $oUpdateMascota->setFechaIngreso($x->getFechaIngreso());
            }
            $oBD->ActualizarMascotaPorID($oUpdateMascota);

            $oRaza = $oBD->BuscarRazaPorID($IdRaza);

            foreach ($oRaza as $x) 
            {
                $Raza = $x->getNombreRaza();
                $Precio = $x->getPrecio();
                $IdEspecie = $x->getEspecieID();
            }

            $oEspecie = $oBD->BuscarEspeciePorID($IdEspecie);

            foreach ($oEspecie as $x) 
            {
                $Especie = $x->getNombreEspecie();
            }

            $oAdquiere = new ClassAdquiere();

            $oAdquiere->setCantidad(1);
            $oAdquiere->setMontoPagado($Precio);
            $oAdquiere->setMascotaID($IdMascota);
            $oAdquiere->setUsuarioID($IdUsuario);
            $oAdquiere->setFechaCompra(date('Y-m-d H:i:s'));
            
            $oBD->InsertarAdquiere($oAdquiere);

            ?>
            <h3>Mascota "<?php echo $Apodo ?>"</h3>
            <p><b>Raza:</b> <?php echo $Raza ?></p>
            <p><b>Especie:</b> <?php echo $Especie ?></p>
            <p><b>Precio:</b> $<?php echo $Precio ?></p>
        </fieldset>
    </main>
</body>
</html>