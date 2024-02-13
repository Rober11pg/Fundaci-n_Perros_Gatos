<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta</title>
</head>

<body>
    <center>
        <h1>Consulta Raza</h1>
    </center>
    <br>
    <center>
        <table border="1">
            <tr>
                <th>Raza ID</th>
                <th>Nombre Raza</th>
                <th>Precio</th>
                <th>Especie ID</th>
            </tr>

    </center>
    <?php
    include_once(__DIR__ . '/../ClassConsultasBD.php');
    $obd = new ClassConsultasBD();
    $li_raza = $obd->ConsultarRazas();

    foreach ($li_raza as $x) {
    ?>

        <tr>
            <td><?php echo $x->getRazaID() ?></td>
            <td><?php echo $x->getNombreRaza() ?></td>
            <td><?php echo $x->getPrecio() ?></td>
            <td><?php echo $x->getEspecieID() ?></td>
            <td><a href="../Model/Eliminar/MDeleteRaza.php?id=<?php echo $x->getRazaID() ?>">Eliminar</a></td>
            <td><a href="../">Actualizar</a></td>\
        </tr>
    <?php
    }
    ?>
    </table>
</body>

</html>