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
    <form action="../Model/Consultas/MBusquedaCliente_Campos.php" method="post">
        <label for="">Ingrese el sexo</label>
        <select name="sexo" id="">
            <option value="null" selected>Selecciona</option>
            <option value="M">Masculino</option>
            <option value="F">Femenino</option>
        </select>
        <label for="">Tipo de usuario</label>
        <select name="t_usuario" id="">
            <option value="null" selected>Selecciona</option>
            <option value="cliente">Cliente</option>
            <option value="administrador">Administrador</option>
        </select>
        <input type="submit" value="Buscar">
    </form>
</body>

</html>