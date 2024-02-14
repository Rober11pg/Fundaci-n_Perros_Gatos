<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingreso de datos de la especie</title>

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
    <form action="../Model/Inserciones/MAddRaza.php" method="post">
        <!-- <label for="">Ingrese la ID de la raza</label>
        <input type="text" name="id_raza" id=""> -->
        <label for="">Ingrese el nombre de la raza</label>
        <input type="text" name="nombre" id="">
        <br>
        <label for="">Ingrese el precio de la raza</label>
        <input type="text" name="precio" id="" onkeypress="return KeyPressRealesPositivos(event)" maxlength="5">
        <br>
        <label for="correo">Ingrese la Especie</label>
        <select name="id_especie" id="">
            <option value="" selected>Selecciona</option>
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
        <br>
        <input type="submit" value="Guardar">
    </form>
</body>
</html>