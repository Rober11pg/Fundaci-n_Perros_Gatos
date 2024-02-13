<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta</title>
</head>

<body>
    <center>
        <h1>Consulta de cliente</h1>
    </center>
    <br>
    <center>
        <table border="1">
            <tr>
                <th>Usuario ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Sexo</th>
                <th>Correo Eléctronico</th>
                <th>Clave</th>
                <th>Tipo de usuario</th>
                <th>Número de télefono</th>
            </tr>

    </center>
    <?php
    include_once(__DIR__ . '/../ClassConsultasBD.php');
    $obd = new ClassConsultasBD();
    $li_usuario = $obd->ConsultarUsuarios();

    foreach ($li_usuario as $x) {
    ?>
        <tr>
            <td><?php echo $x->getUsuarioID() ?></td>
            <td><?php echo $x->getNombre() ?></td>
            <td><?php echo $x->getApellido() ?></td>
            <td><?php echo $x->getSexo() ?></td>
            <td><?php echo $x->getCorreoElectronico() ?></td>
            <td><?php echo $x->getClave() ?></td>
            <td><?php echo $x->getTipoUsuario() ?></td>
            <td><?php echo $x->getNumeroTelefono() ?></td>
            <td><a href="../Model/Eliminar/MDeleteCliente.php?id=<?php echo $x->getUsuarioID() ?>">Eliminar</a></td>
            <td><a href="../">Actualizar</a></td>
        </tr>
    <?php
    }
    ?>
    </table>

</body>

</html>