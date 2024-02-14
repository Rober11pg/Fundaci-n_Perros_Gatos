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
    <title>Adopción Mascota</title>
    <style>
        body {
            background-image: url("bg-loging.jpg"); 
            color: #fff;
            background-size: 100% auto; /* Cambiado a 100% de ancho y auto de alto */
            background-position: center;
            background-repeat: no-repeat;
            font-size: large;
            height: 100vh; 
        }
        .difuminado {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(1.5, 0, 0, 0.4); /* Color negro con transparencia */
        }
    </style>
</head>
<body>
    <main>
        <div class="difuminado">
        <fieldset>
                <legend><h1>Certificado de Adopción</h1></legend>
                <center>
                <h2>Felicidades Por Su Adopción</h2>
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
                $Precio = "Adoptado";

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
                    $oUpdateMascota->setEstadoAdopcion("adoptado");
                    $oUpdateMascota->setFotoMascota($x->getFotoMascota());
                    $oUpdateMascota->setFechaIngreso($x->getFechaIngreso());
                }
                $oBD->ActualizarMascotaPorID($oUpdateMascota);

                $oRaza = $oBD->BuscarRazaPorID($IdRaza);

                foreach ($oRaza as $x) 
                {
                    $Raza = $x->getNombreRaza();
                    // $Precio = $x->getPrecio();
                    $IdEspecie = $x->getEspecieID();
                }

                $oEspecie = $oBD->BuscarEspeciePorID($IdEspecie);

                foreach ($oEspecie as $x) 
                {
                    $Especie = $x->getNombreEspecie();
                }

                $oAdquiere = new ClassAdquiere();

                $oAdquiere->setCantidad(1);
                $oAdquiere->setMontoPagado(0);
                $oAdquiere->setMascotaID($IdMascota);
                $oAdquiere->setUsuarioID($IdUsuario);
                $oAdquiere->setFechaCompra(date('Y-m-d H:i:s'));
                
                $oBD->InsertarAdquiere($oAdquiere);

                ?>
                <h3>Mascota "<?php echo $Apodo ?>"</h3>
                <p><b>Raza:</b> <?php echo $Raza ?></p>
                <p><b>Especie:</b> <?php echo $Especie ?></p>
                <p><b>Precio:</b> <?php echo $Precio ?></p>
            </center>
        </fieldset>
        </div>
    </main>
</body>
</html>