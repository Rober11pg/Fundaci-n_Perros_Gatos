<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta Especie</title>
    <script>
        function habilitarEdicionEspecie(btn) {
            var fila = btn.parentNode.parentNode;
            var inputs = fila.querySelectorAll('input:not([name="id"])');

            if (btn.dataset.editable === "true") {
                // Habilitar edición de campos
                for (var i = 0; i < inputs.length; i++) {
                    inputs[i].readOnly = true;
                }
                btn.dataset.editable = "false";
                btn.innerText = "Actualizar";
            } else {
                if (btn.dataset.editable === "secondClick") {
                    var nombreEspecieInput = fila.querySelector('input[name="nombre"]');
                    var nombreEspecie = nombreEspecieInput.value.trim();
                    if (!validarNombreEspecie(nombreEspecie)) {
                        return; // Si la validación del nombre de especie falla, detener el proceso
                    }
                    actualizarEspecie(fila);
                } else {
                    // Habilitar edición de campos
                    for (var i = 0; i < inputs.length; i++) {
                        inputs[i].readOnly = false;
                    }
                    btn.dataset.editable = "secondClick";
                    btn.innerText = "Guardar";
                }

            }
        }

        function validarNombreEspecie(nombre) {
            // Elimina los espacios en blanco al principio y al final del nombre
            nombre = nombre.trim();

            // Verifica si el nombre está vacío
            if (nombre === "") {
                return false; // El nombre está vacío, retorna falso
            }

            // Verifica si el nombre contiene solo letras y espacios
            var nombrePattern = /^[a-zA-Z\s]+$/;
            if (!nombrePattern.test(nombre)) {
                return false; // El nombre contiene caracteres no permitidos, retorna falso
            }

            // Si pasa todas las validaciones, retorna true
            return true;
        }


        function actualizarEspecie(fila) {
            var formData = new FormData();
            // econde el input
            var inputs = fila.querySelectorAll('input');
            
            for (var i = 0; i < inputs.length; i++) {
                formData.append(inputs[i].name, inputs[i].value);
            }

            var xhr = new XMLHttpRequest();
            xhr.open("POST", "../Model/Actualizar/MUpdateEspecie.php?id", true);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    console.log(xhr.responseText);
                    var mensaje = xhr.responseText; // Obtener la respuesta del servidor

                    // Mostrar el mensaje en el elemento correspondiente


                    // Si el mensaje indica que el usuario se actualizó correctamente, cambiar el texto del enlace
                    if (mensaje == "Especie Actualizado correctamente.") {
                        var btn = fila.querySelector('a[data-editable="secondClick"]');
                        btn.innerText = "Actualizar";
                        btn.dataset.editable = "true";
                        for (var i = 0; i < inputs.length; i++) {
                            inputs[i].readOnly = true;
                        }
                    }

                }
            };


            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        var mensaje = xhr.responseText; // Obtener la respuesta del servidor

                        // Mostrar el mensaje en el elemento correspondiente
                        alert(mensaje);

                    } else {
                        console.error('Hubo un problema al realizar la solicitud.');
                    }
                }
            };
            xhr.send(formData);
        }
    </script>
</head>

<body>
    <center>
        <h1>Consulta Especie</h1>
    </center>
    <br>
    <center>
        <table border="1">
            <tr>
                <th>Especie ID</th>
                <th>Nombre Especie</th>
                <th>Acciones</th>
            </tr>
            <?php
            include_once(__DIR__ . '/../ClassConsultasBD.php');
            $obd = new ClassConsultasBD();
            $li_especie = $obd->ConsultarEspecies();

            foreach ($li_especie as $x) {
            ?>
                <tr>
                    <td><input type="text" size="12" name="id" value="<?php echo $x->getEspecieID() ?>" readonly /></td>
                    <td><input type="text" size="12" name="nombre" value="<?php echo $x->getNombreEspecie() ?>" readonly /></td>
                    <td><a href="../Model/Eliminar/MDeleteEspecie.php?id=<?php echo $x->getEspecieID() ?>">Eliminar</a></td>
                    <td><a href="javascript:void(0)" onclick="habilitarEdicionEspecie(this)" data-editable="true">Actualizar</a< /td>
                </tr>
            <?php
            }
            ?>
        </table>
    </center>
</body>

</html>