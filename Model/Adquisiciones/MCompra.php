<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comprar Mascota</title>
    <style>
        body {
            background-image: url("perrito.jpg"); 
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
            <legend><h1>Comprobante de Compra</h1></legend>
            <center>
                <h2>Felicidades Por Su Compra</h2>
                <?php 
                include_once(__DIR__."/../ClassConsultasBD.php");
                include_once(__DIR__ . '/../../View/Script/Func/ClassRotulosFKs.php');

                $oBD = new ClassConsultasBD();
                $oRotulo = new ClassRotulosFKs();

                $oMascota = $oBD->BuscarMascotaPorID($_REQUEST['Id']);

                $Apodo = "";
                $Raza = "";
                $Especie = "";
                $Precio = 0;

                $IdRaza = 0;
                $IdEspecie = 0;

                foreach ($oMascota as $x) 
                {
                    $Apodo = $x->getApodo();
                    $IdRaza = $x->getRazaID();
                }

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

                ?>
                <h3>Mascota "<?php echo $Apodo ?>"</h3>
                <p><b>Raza:</b> <?php echo $Raza ?></p>
                <p><b>Especie:</b> <?php echo $Especie ?></p>
                <p><b>Precio:</b> $<?php echo $Precio ?></p>
            </center>
        </fieldset>
        </div>
    </main>
</body>
</html>