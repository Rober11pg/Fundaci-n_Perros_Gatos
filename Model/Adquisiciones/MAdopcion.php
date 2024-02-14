<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adopción Mascota</title>
</head>
<body>
    <main>
        <fieldset>
            <legend><h1>Adopción Mascota</h1></legend>
            <h2>Felicidades Por Su Adopción</h2>
            <?php 
            include_once(__DIR__."/../ClassConsultasBD.php");
            include_once(__DIR__ . '/../../View/Script/Func/ClassRotulosFKs.php');

            $oBD = new ClassConsultasBD();
            $oRotulo = new ClassRotulosFKs();

            $oMascota = $oBD->BuscarMascotaPorID($_REQUEST['Id']);

            $Apodo = "";
            $Raza = "";
            $Especie = "";
            $Precio = "Adoptado";

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
                // $Precio = $x->getPrecio();
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
            <p><b>Precio:</b> <?php echo $Precio ?></p>
        </fieldset>
    </main>
</body>
</html>