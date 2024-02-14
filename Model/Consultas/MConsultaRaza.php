<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Consulta</title>
    <style>
         .contenido-tabla{
            margin: 0 auto;
            width: 50%; 
        }
        .contenido{
            text-align: center;
        }
        body {
            background-image: url("bg-loging.jpg"); 
            color: #fff;
            background-size: 100% auto; /* Cambiado a 100% de ancho y auto de alto */
            background-position: center;
            background-repeat: no-repeat;
            font-size: large;
            height: 100vh; 
        }
        .difuminado {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(1.5, 0, 0, 0.4); /* Color negro con transparencia */
        }
    </style>

<script>
        function habilitarEdicionRaza(btn) {
            var fila = btn.parentNode.parentNode;
            var inputs = fila.querySelectorAll('input:not([name="id"])');
            var selects = fila.querySelectorAll('select');

            if (btn.dataset.editable === "true") {
                // Habilitar edición de campos
                for (var i = 0; i < inputs.length; i++) {
                    inputs[i].readOnly = true;
                }
                for (var i = 0; i < selects.length; i++) {
                    selects[i].disabled = true;
                }
                btn.dataset.editable = "false";
                btn.innerText = "Actualizar";
            } else {
                if (btn.dataset.editable === "secondClick") {
                    var nombreRazaInput = fila.querySelector('input[name="nombre"]');
                    var nombreRaza = nombreRazaInput.value.trim();
                    var precioInput = fila.querySelector('input[name="precio"]');
                    var precio = precioInput.value.trim();
                    if (!validarDatosRaza(nombreRaza, precio)) {
                        return; // Si la validación de los datos de raza falla, detener el proceso
                    }
                    actualizarRaza(fila, btn);
                } else {
                    // Habilitar edición de campos
                    for (var i = 0; i < inputs.length; i++) {
                        inputs[i].readOnly = false;
                    }
                    // Habilitar select
                    for (var i = 0; i < selects.length; i++) {
                        selects[i].disabled = false;
                    }
                    btn.dataset.editable = "secondClick";
                    btn.innerText = "Guardar";
                }

            }
        }

        function validarDatosRaza(nombre, precio) {
            // Elimina los espacios en blanco al principio y al final del nombre y el precio
            nombre = nombre.trim();
            precio = precio.trim();

            // Verifica si el nombre y el precio están vacíos
            if (nombre === "" || precio === "") {
                return false; // El nombre o el precio están vacíos, retorna falso
            }

            // Verifica si el precio es un número válido
            var precioNum = parseFloat(precio);
            if (isNaN(precioNum) || precioNum <= 0) {
                return false; // El precio no es un número válido o es menor o igual a cero, retorna falso
            }

            // Si pasa todas las validaciones, retorna true
            return true;
        }

        function actualizarRaza(fila, btn) {
            var formData = new FormData();
            var inputs = fila.querySelectorAll('input');
            var selects = fila.querySelectorAll('select');

            for (var i = 0; i < inputs.length; i++) {
                formData.append(inputs[i].name, inputs[i].value);
            }

            for (var i = 0; i < selects.length; i++) {
                formData.append(selects[i].name, selects[i].value);
            }


            var select = fila.querySelector('select[name="id_especie"]');
            var selectedOption = select.options[select.selectedIndex];
            formData.append(select.name, selectedOption.value);

            var xhr = new XMLHttpRequest();
            xhr.open("POST", "../Model/Actualizar/MUpdateRaza.php", true);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    console.log(xhr.responseText);
                    var mensaje = xhr.responseText; // Obtener la respuesta del servidor

                    // Si el mensaje indica que la raza se actualizó correctamente, cambiar el texto del enlace
                    if (mensaje === "Raza Actualizada correctamente.") {
                        btn.innerText = "Actualizar";
                        btn.dataset.editable = "true";
                        for (var i = 0; i < inputs.length; i++) {
                            inputs[i].readOnly = true;
                        }
                        // Deshabilitar select nuevamente después de actualizar
                        for (var i = 0; i < selects.length; i++) {
                            selects[i].disabled = true;
                        }
                    }

                    alert(mensaje); // Mostrar el mensaje en una ventana de alerta
                }
            };

            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status !== 200) {
                        console.error('Hubo un problema al realizar la solicitud.');
                    }
                }
            };
            xhr.send(formData);
        }
    </script>


</head>

<body>
    <div class="difuminado">
        <br>
        <center>
            <h1>Consulta Raza</h1>
        </center>
        <br>

        <div class="contenido-tabla">
            <center>
                <table border="5" class="table table-success table-striped" >
                    <tr>
                        <th>Raza ID</th>
                        <th>Nombre Raza</th>
                        <th>Precio</th>
                        <th>Especie ID</th>
                    </tr>
                    <?php
                        include_once(__DIR__ . '/../ClassConsultasBD.php');
                        include_once(__DIR__ . '/../../View/Script/Func/ClassRotulosFKs.php');
                        $obd = new ClassConsultasBD();
                        $orutulo = new ClassRotulosFKs();
                        $li_raza = $obd->ConsultarRazas();
                        foreach ($li_raza as $x) {
                        ?>
                            <tr>
                                <td><input type="text" size="12" name="id" value="<?php echo $x->getRazaID() ?>" readonly /></td>
                                <td><input type="text" size="12" name="nombre" value="<?php echo $x->getNombreRaza() ?>" readonly /></td>
                                <td><input type="text" size="12" name="precio" value="<?php echo $x->getPrecio() ?>" readonly /></td>
                                <td>
                                    <select name="id_especie" disabled>
                                        <option value="<?php echo $x->getEspecieID() ?>">
                                            <?php echo $orutulo->RotuloFK_Especie($x->getEspecieID()) ?>
                                        </option>
                                        <?php
                                        $lista_especie = $obd->ConsultarEspecies();
                                        foreach ($lista_especie as $y) {
                                        ?>
                                            <option value="<?php echo $y->getEspecieID() ?>"><?php echo $y->getNombreEspecie() ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </td>
                                <td>
                                    <a href="../Model/Eliminar/MDeleteRaza.php?id=<?php echo $x->getRazaID() ?>">Eliminar</a>
                                    <a href="javascript:void(0)" onclick="habilitarEdicionRaza(this)" data-editable="true">Actualizar</a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                </table>
            </center>
        </div>
    </div>
</body>

</html>




