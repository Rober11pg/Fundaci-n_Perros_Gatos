<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta</title>
    <script>
        function habilitarEdicion(btn) {
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
                // Verificar correo electrónico solo en el segundo clic
                if (btn.dataset.editable === "secondClick") {
                    if (!validarCorreo(fila) || !validarTelefono(fila)) {
                        return; // Si alguna validación falla, detener el proceso
                    }
                    enviarDatos(fila);
                } else {
                    // Habilitar edición de campos
                    for (var i = 0; i < inputs.length; i++) {
                        inputs[i].readOnly = false;
                    }
                    for (var i = 0; i < selects.length; i++) {
                        selects[i].disabled = false;
                    }
                    btn.dataset.editable = "secondClick";
                    btn.innerText = "Guardar";
                }
            }
        }

        function validarCorreo(fila) {
            var correoInput = fila.querySelector('input[name="correo"]');
            var correo = correoInput.value.trim();
            var correoPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!correoPattern.test(correo)) {
                alert("Por favor, ingrese un correo electrónico válido.");
                correoInput.focus();
                return false;
            }
            return true;
        }

        function validarTelefono(fila) {
            var telefonoInput = fila.querySelector('input[name="telf"]');
            var telefono = telefonoInput.value.trim();
            var telefonoPattern = /^09\d{8}$/;
            if (!telefonoPattern.test(telefono)) {
                alert("Por favor, ingrese un número de teléfono válido.");
                telefonoInput.focus();
                return false;
            }
            return true;
        }

        function enviarDatos(fila) {
            var formData = new FormData();
            var inputs = fila.querySelectorAll('input');
            var selects = fila.querySelectorAll('select');

            for (var i = 0; i < inputs.length; i++) {
                formData.append(inputs[i].name, inputs[i].value);
            }

            for (var i = 0; i < selects.length; i++) {
                formData.append(selects[i].name, selects[i].value);
            }

            var idUsuario = fila.querySelector('input[name="id"]').value;
            var correoActual = fila.querySelector('input[name="correo"]').value;
            formData.append('id_usuario', idUsuario);
            formData.append('correo_actual', correoActual);

            var xhr = new XMLHttpRequest();
            xhr.open("POST", "../Model/Actualizar/MUpdateCliente.php?id", true);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    console.log(xhr.responseText);
                    var mensaje = xhr.responseText; // Obtener la respuesta del servidor

                    // Mostrar el mensaje en el elemento correspondiente


                    // Si el mensaje indica que el usuario se actualizó correctamente, cambiar el texto del enlace
                    if (mensaje == "Usuario Actualizado correctamente.") {
                        var btn = fila.querySelector('a[data-editable="secondClick"]');
                        btn.innerText = "Actualizar";
                        btn.dataset.editable = "true";
                        for (var i = 0; i < inputs.length; i++) {
                            inputs[i].readOnly = true;
                        }
                        for (var i = 0; i < selects.length; i++) {
                            selects[i].disabled = true;
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
        <h1>Consulta de cliente</h1>
    </center>
    <br>
    <center>
        <table border="1">
            <tr>
                <th>Usuario ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Sexo</th>
                <th>Correo Eléctronico</th>
                <th>Clave</th>
                <th>Tipo de usuario</th>
                <th>Número de télefono</th>
            </tr>
            <?php
            include_once(__DIR__ . '/../ClassConsultasBD.php');
            include_once(__DIR__ . '/../../View/Script/Func/ClassRotulosFKs.php');
            $obd = new ClassConsultasBD();
            $li_usuario = $obd->ConsultarUsuarios();
            $orotulo = new ClassRotulosFKs();
            foreach ($li_usuario as $x) {
            ?>
                <tr>
                    <td><input type="text" size="6" name="id" value="<?php echo $x->getUsuarioID() ?>" readonly /></td>
                    <td><input type="text" size="8" name="nombre" value="<?php echo $x->getNombre() ?>" readonly /></td>
                    <td><input type="text" size="8" name="apellido" value="<?php echo $x->getApellido() ?>" readonly /></td>

                    <td>
                        <select name="sexo" id="" disabled>
                            <option value="<?php echo $x->getSexo() ?>" selected>
                                <?php echo $orotulo->RotuloFK_SexoUsuario($x->getUsuarioID()) ?>
                            </option>
                            <option value="M">Masculino</option>
                            <option value="F">Femenino</option>
                        </select>
                    </td>

                    <td><input type="email" size="" name="correo" value="<?php echo $x->getCorreoElectronico() ?>" readonly /></td>
                    <td><input type="text" size="8" name="psw" value="<?php echo $x->getClave() ?>" readonly /></td>
                    </td>
                    <td>
                        <select name="t_usuario" id="" disabled>
                            <option value="<?php echo $x->getTipoUsuario() ?>" selected>
                                <?php echo $x->getTipoUsuario() ?>
                            </option>
                            <option value="cliente">Cliente</option>
                            <option value="administrador">Administrador</option>
                        </select>
                    </td>
                    <td><input type="text" name="telf" value="<?php echo $x->getNumeroTelefono() ?>" readonly /></td>
                    <td><a href="../Model/Eliminar/MDeleteCliente.php?id=<?php echo $x->getUsuarioID() ?>">Eliminar</a></td>
                    <td><a href="javascript:void(0)" onclick="habilitarEdicion(this)" data-editable="true">Actualizar</a></td>
                </tr>
            <?php
            }
            ?>
        </table>
    </center>
</body>

</html>