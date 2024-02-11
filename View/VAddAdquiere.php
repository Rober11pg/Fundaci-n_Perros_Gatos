<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingreso de datos de la especie</title>
</head>
<body>
    <form action="../Model/Inserciones/MAddAdquiere.php" method="post">
        <!-- <label for="">Ingrese el ID de la compra</label>
        <input type="text" name="id_compra" id=""> -->
        <label for="">Ingrese el ID del usuario</label>
        <input type="text" name="id_usuario" id="">
        <br>
        <label for="">Ingrese el ID de la mascota</label>
        <input type="text" name="id_mascota" id="">
        <br>
        <label for="">Ingrese la fecha de la compra</label>
        <input type="date" name="fecha_compra" id="">
        <br>
        <label for="">Ingrese la cantidad</label>
        <input type="text" name="cantidad" id="">
        <br>
        <label for="">Ingrese el monto pagado</label>
        <input type="text" name="monto_p" id="">
        <br>
        <input type="submit" value="Guardar">
    </form>
</body>
</html>