<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingreso de datos</title>
</head>

<body>
    <h1>Ingreso de datos</h1>
    <form action="../Model/Inserciones/MAddMascota.php" method="post">

        <label for="">Ingrese su ID de la mascota: </label>
        <input type="text" name="id" id="" placeholder="ID Mascota">
        <br>
        <label for="">Apodo: </label>
        <input type="text" name="apodo" id="" placeholder="Apodo de la mascota">
        <br>
        <label for="">Sexo: </label>
        <select name="sexo" id="">
            <option value="M">Macho</option>
            <option value="F">Hembra</option>
        </select>
        <br>
        <label for="correo">Ingrese el ID de la raza</label>
        <input type="text" name="id_raza" placeholder="ID de la raza"/>
        <br>
        <label for="">Ingrese la edad de perro</label>
        <select name="edad" id="">
            <option value="cachorro">Cachorro</option>
            <option value="adulto">Adulto</option>
        </select>
        <br>
        <label for="">Estado adopción </label>
        <select name="estado" id="">
            <option value="disponible">Disponible</option>
            <option value="adoptado">Adoptado</option>
            <option value="vendido">Vendido</option>

        </select>
        <br>
        <label for="">Ingrese una imagen </label>
        <input type="file" name="foto" id="">
        <br>
        <label for="">Ingrese la fecha de ingreso</label>
        <input type="date" name="fecha_i" id="" min="2023-01-01">
        <br>
        <input type="submit" value="Guardar datos" name="ingresar">
    </form>
</body>

</html>