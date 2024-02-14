<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adquisición de mascota</title>
    <link rel="stylesheet" href="../View/Style/estiloAdquiere.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800&display=swap" rel="stylesheet"> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
    <center>
        <h2 class="titulo">Adquisición de mascota</h2>
    </center>

    <section>
        <form action="../Model/Inserciones/MAddAdquiere.php" method="post">
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Ingrese ID del usuario:</label>
                    <input type="text" name="id_usuario" id="" placeholder="Ingrese ID del usuario">
            </div>

            <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label">Ingrese ID de la mascota</label>
                <input type="text" name="id_mascota" id="" placeholder="Ingrese ID de la mascota">
            </div>

            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Ingrese la fecha de la compra:</label>
                <input type="date" name="fecha_compra" id="">
            </div>

            <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label">Ingrese cantidad:</label>
                <input type="number" name="cantidad" id="" placeholder="Cantidad en números">
            </div>



    </section>


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



<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Adquisición de mascota</title>
        <link rel="stylesheet" href="../View/Style/estiloAdquiere.css">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800&display=swap" rel="stylesheet"> 
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script src="./View/Script/Event/navegar.js"></script>
    </head>

    <body>
        <div class="container">

            <nav>
                <a href="../index-admi.html">Inicio</a>
            </nav>
            <center>
                <h2 class="titulo">Adquisición de mascota</h2>
            </center>

            <section>
                    <form action="../Model/Inserciones/MAddAdquiere.php" method="post">
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Ingrese ID del usuario:</label>
                            <input type="text" name="id_usuario" id="" placeholder="Ingrese ID del usuario">
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput2" class="form-label">Ingrese ID de la mascota</label>
                            <input type="text" name="id_mascota" id="" placeholder="Ingrese ID de la mascota">
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Ingrese la fecha de la compra:</label>
                            <input type="date" name="fecha_compra" id="">
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput2" class="form-label">Ingrese cantidad:</label>
                            <input type="number" name="cantidad" id="" placeholder="Cantidad en números">
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput2" class="form-label">Ingrese el monto pagado:</label>
                            <input type="text" name="monto_p" id="" placeholder="Ejemplo: 15.00">
                        </div>
                        <input type="submit" value="Guardar" onclick="agregarproducto()">
                    </form>
            </section>
        </div>
    </body>
</html>