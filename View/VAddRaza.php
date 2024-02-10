<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingreso de datos de la especie</title>
</head>
<body>
    <form action="../Model/Inserciones/MAddRaza.php" method="post">
        <label for="">Ingrese la ID de la raza</label>
        <input type="text" name="id_raza" id="">
        <br>
        <label for="">Ingrese el nombre de la raza</label>
        <input type="text" name="nombre" id="">
        <br>
        <label for="">Ingrese el precio de la raza</label>
        <input type="text" name="precio" id="">
        <br>
        <label for="">Ingrese el ID de la especie</label>
        <input type="text" name="id_especie" id="">
        <br>
        <input type="submit" value="Guardar">
    </form>
</body>
</html>