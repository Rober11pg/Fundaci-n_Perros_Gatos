<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- MATERIAL DESIGN ICONIC FONT -->
	<link rel="stylesheet" href="../fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
	<!-- STYLE CSS -->
	<link rel="stylesheet" href="../View/Style/estiloregistro.css">
    <title>Ingreso de datos Mascota</title>
    <script src="./Script/Event/Eventos.js"></script>
</head>

<body>
    <div class="wrapper" style="background-image: url('../View/img/bg-registration-form-1.jpg');">
		<div class="inner">
			<div class="image-holder">
				<img src="../View/img/ingresomascota.jpg" alt="" width="400" height="625">
			</div>
            <form action="../Model/Inserciones/MAddMascota.php" method="post" enctype="multipart/form-data">
                <h3>Ingreso de Mascota</h3>
                <div class="form-wrapper">
                    <input type="text" name="apodo" id="" placeholder="Ingrese Apodo" class="form-control">
				</div>

                <div class="form-wrapper">
					<select name="sexo" id="" class="form-control">
						<option value="" disabled selected>Género</option>
						<option value="M">Macho</option>
						<option value="F">Hembra</option>
					</select>
				</div>

                <div class="form-wrapper">
                    <input type="text" name="id_raza" id="" placeholder="ID de la raza" class="form-control">
				</div>

                <div class="form-wrapper">
					<select name="edad" id="" class="form-control">
						<option value="" disabled selected>Edad Relativa</option>
						<option value="cachorro">Cachorro</option>
						<option value="adulto">Adulto</option>
					</select>
				</div>

                <div class="form-wrapper">
                    <label for="">Ingrese una imagen </label>
                    <input type="file" name="foto" id=" foto">
				</div>

                <div class="form-wrapper">
                    <br>
                    <input type="date" name="fecha_i" id="" min="2023-01-01" class="form-control">
				</div>

                <input type="submit" value="Guardar datos" name="ingresar">
            </form>
		</div>
	</div>
</body>

</html>


