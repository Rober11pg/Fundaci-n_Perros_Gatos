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
            <h1>Búsqueda mascota por campos</h1>
        </center>
        <br>

        <div class="contenido-tabla">
            <center>
                <table border="5" class="table table-success table-striped" >
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
        </div>
    </div>
</body>

</html>