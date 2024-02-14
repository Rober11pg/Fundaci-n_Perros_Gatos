<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- MATERIAL DESIGN ICONIC FONT -->
	<link rel="stylesheet" href="../fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
	<!-- STYLE CSS -->
	<link rel="stylesheet" href="../View/Style/estiloregistro.css">
    <title>Ingreso de datos de la especie</title>
</head>
<body>

    <div class="wrapper" style="background-image: url('../View/img/bg-registration-form-1.jpg');">

		<div class="inner">
			<div class="image-holder">
				<img src="../View/img/especie.jpg" alt="" width="400" height="250">
			</div>

            <form action="../Model/Inserciones/MAddEspecie.php" method="post">
                <h3>Ingrese especie de mascota</h3>
                <!-- <label for="">Ingrese la ID de la especie</label>
                <input type="text" name="id" id="">
                <label for="">Ingrese el nombre de la especie</label>
                <input type="text" name="nombre" id=""> -->
                <div class="form-wrapper">
                    <input type="text" name="nombre" id="" placeholder="Ingrese el nombre de la especie" class="form-control">
                </div>
                <input type="submit" value="Guardar">
            </form>
        </div>
    </div> 
</body>
</html>

