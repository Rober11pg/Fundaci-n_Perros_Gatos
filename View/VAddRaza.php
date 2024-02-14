
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- MATERIAL DESIGN ICONIC FONT -->
	<link rel="stylesheet" href="../fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
	<!-- STYLE CSS -->
	<link rel="stylesheet" href="../View/Style/estiloregistro.css">
    <title>Ingreso de datos de la raza</title>
</head>
<body>

    <div class="wrapper" style="background-image: url('../View/img/bg-registration-form-1.jpg');">

		<div class="inner">
			<div class="image-holder">
				<img src="../View/img/raza.jpg" alt="" width="400" height="250">
			</div>

            <form action="../Model/Inserciones/MAddRaza.php" method="post">

                <!-- <label for="">Ingrese la ID de la raza</label>
                <input type="text" name="id_raza" id=""> 
                <label for="">Ingrese el nombre de la raza</label>
                <input type="text" name="nombre" id="">
                <br>
                <label for="">Ingrese el precio de la raza</label>
                <input type="text" name="precio" id="">
                <br>
                <label for="">Ingrese el ID de la especie</label>
                <input type="text" name="id_especie" id="">
                <br>
                <input type="submit" value="Guardar">-->

                <h3>Ingrese raza de mascota</h3>

                <div class="form-wrapper">
                    <input type="text" name="nombre" id="" placeholder="Ingrese el nombre de la raza" class="form-control">
                </div>

                <div class="form-wrapper">
                    <input type="text" name="precio" id="" placeholder="Ingrese el precio de la raza" class="form-control">
                </div>

                <div class="form-wrapper">
                    <input type="text" name="id_especie" id="" placeholder="Ingrese ID precio de la especie" class="form-control">
                </div>

                <input type="submit" value="Guardar">
            </form>
        </div>
    </div> 
</body>
</html>
