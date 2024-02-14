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
            <h1>Consulta Raza</h1>
        </center>
        <br>

        <div class="contenido-tabla">
            <center>
                <table border="5" class="table table-success table-striped" >
                    <tr>
                        <th>Raza ID</th>
                        <th>Nombre Raza</th>
                        <th>Precio</th>
                        <th>Especie ID</th>
                    </tr>
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
                            <td><a href="../">Actualizar</a></td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
            </center>
        </div>
    </div>
</body>

</html>