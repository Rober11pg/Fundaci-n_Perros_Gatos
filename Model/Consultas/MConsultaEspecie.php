<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta</title>
</head>

<body>
    <center>
        <h1>Consulta Especie</h1>
    </center>
    <br>
    <center>
        <table border="1">
            <tr>
                <th>Especie ID</th>
                <th>Nombre Especie</th>
            </tr>

    </center>
    <?php
    include_once(__DIR__ . '/../ClassConsultasBD.php');
    $obd = new ClassConsultasBD();
    $li_especie = $obd->ConsultarEspecies();

    foreach ($li_especie as $x) {
    ?>

        <tr>
            <td><?php echo $x->getEspecieID() ?></td>
            <td><?php echo $x->getNombreEspecie() ?></td>
            <td><a href="../Model/Eliminar/MDeleteEspecie.php?id=<?php echo $x->getEspecieID() ?>">Eliminar</a></td>
            <td><a href="../">Actualizar</a></td>\
        </tr>
    <?php
    }
    ?>
    </table>

</body>

</html>