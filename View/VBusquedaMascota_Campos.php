<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar mascota</title>
    <link rel="stylesheet" href="../View/Style/estilobusqueda.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800&display=swap" rel="stylesheet"> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Búsqueda</title>
</head>

<body>
    <div class="container">
        <center> 
            <br>
                <h1 style="color: #fff;">Buscar Mascota por campos</h1>
            <br>
            <form action="../Model/Consultas/MBusquedaMascota_Campos.php" method="post">
                <label for="">Ingrese Especie</label>
                <select name="especie_ID" id="">
                    <option value="null" selected>Selecciona</option>
                    <?php 
                    include_once(__DIR__ . '/../Model/ClassConsultasBD.php');
                    
                    $oBD = new ClassConsultasBD();

                    $ListaEspecies = $oBD->ConsultarEspecies();

                    foreach ($ListaEspecies as $x) 
                    {
                    ?>
                        <option value="<?php echo $x->getEspecieID() ?>"><?php echo $x->getNombreEspecie() ?></option>
                    <?php
                    }
                    ?>
                </select>
                <label for="">Ingrese el sexo</label>
                <select name="sexo" id="">
                    <option value="null" selected>Selecciona</option>
                    <option value="M">Macho</option>
                    <option value="F">Hembra</option>
                </select>
                <label for="">Ingrese la edad relativa</label>
                <select name="edad" id="">
                    <option value="null" selected>Selecciona</option>
                    <option value="cachorro">Cachorro</option>
                    <option value="adulto">Adulto</option>
                </select>
                <input type="submit" value="Buscar">
            </form>
        </center>
    </div>    
</body>

</html>