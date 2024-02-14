<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Consulta</title>
    <style>
        .contenido-tabla{
            margin: 0 auto;
            width: 50%; 
        }
        .contenido{
            text-align: center;
        }
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
    <div class="difuminado">
        <br>
        <center>
            <h1>Búsqueda Cliente por campos</h1>
        </center>
        <br>
        
        <div class="contenido-tabla">
            <table border="5" class="table table-success table-striped" >
                <tr>
                    <center> 
                        <th>Usuario ID</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Sexo</th>
                        <th>Correo Eléctronico</th>
                        <th>Clave</th>
                        <th>Tipo de usuario</th>
                        <th>Número de télefono</th>
                    </center>
                </tr>
                    <?php
                    $sexo =  ($_POST['sexo'] == "null")? null : $_POST['sexo'];
                    $usuario = ($_POST['t_usuario'] == "null")? null : $_POST['t_usuario'];
                    include_once(__DIR__ . '/../ClassConsultasBD.php');
                    $obd = new ClassConsultasBD();
                    $li_usuario = $obd->BuscarUsuarioPorCampos($sexo, $usuario);

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
                        </tr>
                    <?php
                    }
                    ?>
            </table>
        </div>
    </div>
</body>
</html>