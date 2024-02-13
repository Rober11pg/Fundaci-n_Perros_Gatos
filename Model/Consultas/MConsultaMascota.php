<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta</title>
</head>

<body>
    <center>
        <h1>Consulta Mascota</h1>
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
                <th>Estado de adopción</th>
                <th>Foto</th>
                <th>Fecha de ingreso</th>
            </tr>

    </center>
    <?php
    include_once(__DIR__ . '/../ClassConsultasBD.php');
    $obd = new ClassConsultasBD();
    $li_mascota = $obd->ConsultarMascotas();

    foreach ($li_mascota as $x) {
    ?>

        <tr>
            <td><?php echo $x->getMascotaID() ?></td>
            <td><?php echo $x->getApodo() ?></td>
            <td><?php echo $x->getSexo() ?></td>
            <td><?php echo $x->getRazaID() ?></td>
            <td><?php echo $x->getEdadRelativa() ?></td>
            <td><?php echo $x->getEstadoAdopcion() ?></td>
            <td><?php echo $x->getFotoMascota() ?></td>
            <td><?php echo $x->getFechaIngreso() ?></td>
            <td><a href="../Model/Eliminar/MDeleteMascota.php?id=<?php echo $x->getMascotaID() ?>">Eliminar</a></td>
            <td><a href="../">Actualizar</a></td>\
        </tr>
    <?php
    }
    ?>
    </table>

</body>

</html>