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
        <label for="">Ingrese el apodo de la mascota</label>
        <input type="text" name="apodo" id="">
        <label for="">Ingrese el sexo</label>
        <select name="sexo" id="">
            <option value="null" selected>Selecciona</option>
            <option value="M">Macho</option>
            <option value="F">Hembra</option>
        </select>
        <label for="">Ingrese el estado de adopción</label>
        <select name="estado" id="">
            <option value="null" selected>Selecciona</option>
            <option value="disponible">Diponible</option>
            <option value="adoptado">Adoptado</option>
            <option value="vendido">Vendido</option>
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