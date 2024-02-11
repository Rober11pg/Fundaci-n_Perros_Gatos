
****************************** ADQUIERE *******************************

DELIMITER //
CREATE PROCEDURE InsertarAdquiere(
    IN p_UsuarioID INT,
    IN p_MascotaID INT,
    IN p_FechaCompra DATETIME,
    IN p_Cantidad INT,
    IN p_MontoPagado DECIMAL(10, 2)
)
BEGIN
    INSERT INTO ADQUIERE (UsuarioID, MascotaID, FechaCompra, Cantidad, MontoPagado)
    VALUES (p_UsuarioID, p_MascotaID, p_FechaCompra, p_Cantidad, p_MontoPagado);
END //
DELIMITER ;


DELIMITER //

CREATE PROCEDURE ConsultarAdquiere()
BEGIN
    SELECT * FROM ADQUIERE;
END //

DELIMITER ;

DELIMITER //

CREATE PROCEDURE EliminarAdquierePorID(
    IN p_CompraID INT
)
BEGIN
    DELETE FROM ADQUIERE WHERE CompraID = p_CompraID;
END //

DELIMITER ;

DELIMITER //
CREATE PROCEDURE ActualizarAdquierePorID(
    IN p_CompraID INT,
    IN p_UsuarioID INT,
    IN p_MascotaID INT,
    IN p_FechaCompra DATETIME,
    IN p_Cantidad INT,
    IN p_MontoPagado DECIMAL(10,2)
)
BEGIN
    UPDATE ADQUIERE 
    SET 
        UsuarioID = p_UsuarioID,
        MascotaID = p_MascotaID,
        FechaCompra = p_FechaCompra,
        Cantidad = p_Cantidad,
        MontoPagado = p_MontoPagado
    WHERE 
        CompraID = p_CompraID;
END //
DELIMITER ;



******************************* ESPECIE *******************************

DELIMITER //

CREATE PROCEDURE InsertarEspecie(
    IN p_NombreEspecie VARCHAR(20)
)
BEGIN
    INSERT INTO ESPECIE (NombreEspecie)
    VALUES (p_NombreEspecie);
END //

DELIMITER ;

DELIMITER //

CREATE PROCEDURE ConsultarEspecie()
BEGIN
    SELECT * FROM ESPECIE;
END //

DELIMITER ;

DELIMITER //

CREATE PROCEDURE EliminarEspeciePorID(
    IN p_EspecieID INT
)
BEGIN
    DELETE FROM ESPECIE WHERE EspecieID = p_EspecieID;
END //

DELIMITER ;

DELIMITER //

CREATE PROCEDURE ActualizarEspeciePorID(
    IN p_EspecieID INT,
    IN p_NombreEspecie VARCHAR(20)
)
BEGIN
    UPDATE ESPECIE 
    SET 
        NombreEspecie = p_NombreEspecie
    WHERE 
        EspecieID = p_EspecieID;
END //

DELIMITER ;


****************************** MASCOTA *******************************

DELIMITER //

CREATE PROCEDURE InsertarMascota(
    IN p_Apodo VARCHAR(50),
    IN p_Sexo CHAR(1),
    IN p_RazaID INT,
    IN p_EdadRelativa VARCHAR(15),
    IN p_EstadoAdopcion VARCHAR(20),
    IN p_FotoMascota LONGBLOB,
    IN p_FechaIngreso DATE
)
BEGIN
    INSERT INTO MASCOTA (Apodo, Sexo, RazaID, EdadRelativa, EstadoAdopcion, FotoMascota, FechaIngreso)
    VALUES (p_Apodo, p_Sexo, p_RazaID, p_EdadRelativa, p_EstadoAdopcion, p_FotoMascota, p_FechaIngreso);
END //

DELIMITER ;

DELIMITER //

CREATE PROCEDURE ConsultarMascota()
BEGIN
    SELECT * FROM MASCOTA;
END //

DELIMITER ;

DELIMITER //

CREATE PROCEDURE EliminarMascotaPorID(
    IN p_MascotaID INT
)
BEGIN
    DELETE FROM MASCOTA WHERE MascotaID = p_MascotaID;
END //

DELIMITER ;

DELIMITER //

CREATE PROCEDURE ActualizarMascotaPorID(
    IN p_MascotaID INT,
    IN p_Apodo VARCHAR(50),
    IN p_Sexo CHAR(1),
    IN p_RazaID INT,
    IN p_EdadRelativa VARCHAR(15),
    IN p_EstadoAdopcion VARCHAR(20),
    IN p_FotoMascota LONGBLOB,
    IN p_FechaIngreso DATE
)
BEGIN
    UPDATE MASCOTA 
    SET 
        Apodo = p_Apodo,
        Sexo = p_Sexo,
        RazaID = p_RazaID,
        EdadRelativa = p_EdadRelativa,
        EstadoAdopcion = p_EstadoAdopcion,
        FotoMascota = p_FotoMascota,
        FechaIngreso = p_FechaIngreso
    WHERE 
        MascotaID = p_MascotaID;
END //

DELIMITER ;



****************************** RAZA *******************************

DELIMITER //

CREATE PROCEDURE InsertarRaza(
    IN p_NombreRaza VARCHAR(50),
    IN p_Precio DECIMAL(10, 2),
    IN p_EspecieID INT
)
BEGIN
    INSERT INTO RAZA (NombreRaza, Precio, EspecieID)
    VALUES (p_NombreRaza, p_Precio, p_EspecieID);
END //

DELIMITER ;

DELIMITER //

CREATE PROCEDURE ConsultarRaza()
BEGIN
    SELECT * FROM RAZA;
END //

DELIMITER ;

DELIMITER //

CREATE PROCEDURE EliminarRazaPorID(
    IN p_RazaID INT
)
BEGIN
    DELETE FROM RAZA WHERE RazaID = p_RazaID;
END //

DELIMITER //

CREATE PROCEDURE ActualizarRazaPorID(
    IN p_RazaID INT,
    IN p_NombreRaza VARCHAR(50),
    IN p_Precio DECIMAL(10, 2)
)
BEGIN
    UPDATE RAZA 
    SET 
        NombreRaza = p_NombreRaza,
        Precio = p_Precio
    WHERE 
        RazaID = p_RazaID;
END //

DELIMITER ;



DELIMITER ;


****************************** USUARIO *******************************

DELIMITER //

CREATE PROCEDURE InsertarUsuario(
    IN p_Nombre VARCHAR(50),
    IN p_Apellido VARCHAR(50),
    IN p_Sexo CHAR(1),
    IN p_CorreoElectronico VARCHAR(50),
    IN p_Clave VARCHAR(50),
    IN p_TipoUsuario VARCHAR(13),
    IN p_NumeroTelefono VARCHAR(15)
)
BEGIN
    INSERT INTO USUARIO (Nombre, Apellido, Sexo, CorreoElectronico, Clave, TipoUsuario, NumeroTelefono)
    VALUES (p_Nombre, p_Apellido, p_Sexo, p_CorreoElectronico, p_Clave, p_TipoUsuario, p_NumeroTelefono);
END //

DELIMITER ;

DELIMITER ;

DELIMITER //

CREATE PROCEDURE ConsultarUsuario()
BEGIN
    SELECT * FROM USUARIO;
END //

DELIMITER ;

DELIMITER //

CREATE PROCEDURE EliminarUsuarioPorID(
    IN p_UsuarioID INT
)
BEGIN
    DELETE FROM USUARIO WHERE UsuarioID = p_UsuarioID;
END //

DELIMITER ;


DELIMITER //

CREATE PROCEDURE ActualizarUsuarioPorID(
    IN p_UsuarioID INT,
    IN p_Nombre VARCHAR(50),
    IN p_Apellido VARCHAR(50),
    IN p_Sexo CHAR(1),
    IN p_CorreoElectronico VARCHAR(50),
    IN p_Clave VARCHAR(50),
    IN p_TipoUsuario VARCHAR(13),
    IN p_NumeroTelefono VARCHAR(15)
)
BEGIN
    UPDATE USUARIO 
    SET 
        Nombre = p_Nombre,
        Apellido = p_Apellido,
        Sexo = p_Sexo,
        CorreoElectronico = p_CorreoElectronico,
        Clave = p_Clave,
        TipoUsuario = p_TipoUsuario,
        NumeroTelefono = p_NumeroTelefono
    WHERE 
        UsuarioID = p_UsuarioID;
END //

DELIMITER ;


****************************** Otros Procedimientos Almacenados *******************************

DELIMITER //

CREATE PROCEDURE BuscarMascotaPorCampos(
    IN p_Apodo VARCHAR(50),
    IN p_Sexo CHAR(1),
    IN p_EstadoAdopcion VARCHAR(20),
    IN p_EdadRelativa VARCHAR(15)
)
BEGIN
    SELECT * FROM MASCOTA
    WHERE
        (p_Apodo IS NULL OR LOWER(Apodo) LIKE CONCAT('%', LOWER(p_Apodo), '%'))
        AND (p_Sexo IS NULL OR Sexo = p_Sexo)
        AND (p_EstadoAdopcion IS NULL OR EstadoAdopcion = p_EstadoAdopcion)
        AND (p_EdadRelativa IS NULL OR EdadRelativa = p_EdadRelativa);
END //

DELIMITER ;


DELIMITER //

CREATE PROCEDURE ValidarUsuario(IN p_CorreoElectronico VARCHAR(50), IN p_Clave VARCHAR(50))
BEGIN
    SELECT *
    FROM USUARIO
    WHERE CorreoElectronico = p_CorreoElectronico AND Clave = p_Clave;
END //

DELIMITER ;


DELIMITER //

CREATE PROCEDURE BuscarUsuarioPorCampos(
    IN p_Sexo CHAR(1),
    IN p_TipoUsuario VARCHAR(13)
)
BEGIN
    SELECT * FROM USUARIO
    WHERE (p_Sexo IS NULL OR Sexo = p_Sexo)
    AND (p_TipoUsuario IS NULL OR TipoUsuario = p_TipoUsuario);
END //

DELIMITER ;