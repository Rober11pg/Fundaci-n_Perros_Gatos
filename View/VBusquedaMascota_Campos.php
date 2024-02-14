<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Búsqueda</title>
</head>

<body>
    <center>
        <h1>Búsqueda mascota por campos</h1>
    </center>
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
</body>

</html>