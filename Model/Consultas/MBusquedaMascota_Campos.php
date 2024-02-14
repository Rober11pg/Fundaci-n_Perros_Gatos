<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta</title>
</head>

<body>
    <center>
        <h1>Búsqueda mascota por campos</h1>
    </center>
    <br>
    <center>
        <table border="1">
            <tr>
                <th>Mascota ID</th>
                <th>Apodo</th>
                <th>Sexo</th>
                <th>Raza ID</th>
                <th>Edad relativa</th>
                <th>Foto</th>
                <th>Fecha de ingreso</th>
            </tr>
            <?php
            include(__DIR__ .'/../ClassConsultasBD.php');
            include_once(__DIR__ . '/../../View/Script/Func/ClassRotulosFKs.php');

            $EspecieID = ($_POST['especie_ID'] == "null")? null : $_POST['especie_ID'];
            $sexo =  ($_POST['sexo'] == "null")? null : $_POST['sexo'];
            $edad = ($_POST['edad'] == "null")? null : $_POST['edad'];

            $obd = new ClassConsultasBD();
            $li_mascota = $obd->BuscarMascotaEspecieRaza($EspecieID,null,$sexo,"disponible",$edad);

            $oRotulo = new ClassRotulosFKs();
            foreach ($li_mascota as $x)
            {
            ?>
                <tr>
                    <td><?php echo $x->getMascotaID() ?></td>
                    <td><?php echo $x->getApodo() ?></td>
                    <td><?php echo $x->getSexo() ?></td>
                    <td><?php echo $oRotulo->RotuloFK_Raza($x->getRazaID()) ?></td>
                    <td><?php echo $x->getEdadRelativa() ?></td>
                    <td><?php echo $x->getFotoMascota() ?></td>
                    <td><?php echo $x->getFechaIngreso() ?></td>
                    <td><a href="../Adquisiciones/MAdopcion.php?Id=<?php echo $x->getMascotaID() ?>">Adoptar</a></td>
                    <td><a href="../Adquisiciones/MCompra.php?Id=<?php echo $x->getMascotaID() ?>">Comprar</a></td>
                </tr>
            <?php
            }
            ?>
        </table>
    </center>

</body>

</html>