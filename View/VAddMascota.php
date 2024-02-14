<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingreso de datos</title>
</head>

<body>
    <h1>Ingreso de datos</h1>
    <form action="../Model/Inserciones/MAddMascota.php" method="post" enctype="multipart/form-data">

        <!-- <label for="">Ingrese su ID de la mascota: </label>
        <input type="text" name="id" id="" placeholder="ID Mascota"> -->
        <label for="">Apodo: </label>
        <input type="text" name="apodo" id="" placeholder="Apodo de la mascota">
        <br>
        <label for="">Sexo: </label>
        <select name="sexo" id="">
            <option value="" selected>Selecciona</option>
            <option value="M">Macho</option>
            <option value="F">Hembra</option>
        </select>
        <br>
        <label for="correo">Ingrese la raza</label>
        <select name="id_raza" id="">
            <option value="" selected>Selecciona</option>
            <?php
            include_once(__DIR__ . '/../Model/ClassConsultasBD.php');
            
            $oBD = new ClassConsultasBD();

            $ListaRazas = $oBD->ConsultarRazas();

            foreach ($ListaRazas as $x) 
            {
            ?>
                <option value="<?php echo $x->getRazaID() ?>"><?php echo $x->getNombreRaza() ?></option>
            <?php
            }
            ?>
        </select>
        <br>
        <label for="">Ingrese la edad de perro</label>
        <select name="edad" id="">
            <option value="" selected>Selecciona</option>
            <option value="cachorro">Cachorro</option>
            <option value="adulto">Adulto</option>
        </select>
        <br>
        <label for="">Ingrese una imagen </label>
        <input type="file" name="foto" id="foto">
        <br>
        <label for="">Ingrese la fecha de ingreso</label>
        <input type="date" name="fecha_i" id="" min="2023-01-01">
        <br>
        <input type="submit" value="Guardar datos" name="ingresar">
    </form>
</body>

</html>