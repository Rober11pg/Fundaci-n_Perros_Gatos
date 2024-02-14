<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Cliente</title>
    <link rel="stylesheet" href="../View/Style/estilobusqueda.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800&display=swap" rel="stylesheet"> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <center>
            <br>
            <h1 style="color: #fff;">Buscar Cliente</h1>
            <br>
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
        </center>
    </div>
</body>

</html>

