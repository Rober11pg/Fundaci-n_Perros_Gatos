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

    <script>
        function KeyPressRealesPositivos(EventoTeclado){
			
            // code es la representación decimal ASCII de la tecla presionada.
            var code = (EventoTeclado.which) ? EventoTeclado.which : EventoTeclado.keyCode;
            
            // ASCII 08 : BackSpace
            // ASCII 48 a 57 : Digitos Númericos
            // ASCII 46 : Punto Decimal
        
            return ((code==8) || (code>=48 && code<=57) || code==46) ? true : false;
        }
    </script>
</head>
<body>
    <div class="wrapper" style="background-image: url('../View/img/bg-registration-form-1.jpg');">

    <div class="inner">
        <div class="image-holder">
            <img src="../View/img/raza.jpg" alt="" width="400" height="250">
        </div>
            <form action="../Model/Inserciones/MAddRaza.php" method="post">
                <h3>Ingrese raza de mascota</h3>
                <!-- <label for="">Ingrese la ID de la raza</label>
                <input type="text" name="id_raza" id=""> -->
                <div class="form-wrapper">
                    <input type="text" name="nombre" id="" placeholder="Ingrese el nombre de la raza" class="form-control">
                </div>

                <div class="form-wrapper">
                    <input type="text" name="precio" id="" onkeypress="return KeyPressRealesPositivos(event)" maxlength="5" placeholder="Ingrese el precio de la raza" class="form-control">
                </div>

                <div class="class="form-wrapper"">
                    <select name="id_especie" id="" class="form-control">
                        <option value="" selected>Selecciona especie</option>
                        <?php
                        include_once(__DIR__ . '/../Model/ClassConsultasBD.php');
                        
                        $oBD = new ClassConsultasBD();

                        $ListaRazas = $oBD->ConsultarEspecies();

                        foreach ($ListaRazas as $x) 
                        {
                        ?>
                            <option value="<?php echo $x->getEspecieID() ?>"><?php echo $x->getNombreEspecie() ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <br>
                <input type="submit" value="Guardar">
            </form>
        </div>
    </div>
</body>
</html>

