CREATE DATABASE dbasistencia;
USE dbasistencia;

CREATE TABLE personas 
(
	idpersona 		INT AUTO_INCREMENT PRIMARY KEY,
    apellidos		VARCHAR(40) 	NOT NULL,
    nombres 		VARCHAR(40)		NOT NULL,
    dni 			CHAR(8) 		NOT NULL,
    telefono 		CHAR(9) 		NULL,
    direccion		VARCHAR(70)		NULL,
    email 			VARCHAR(70) 	NULL,
    create_at 		DATETIME 		NOT NULL DEFAULT NOW(),
    CONSTRAINT uk_dni_per UNIQUE (dni)
) ENGINE = INNODB;

INSERT INTO personas (apellidos, nombres, dni) VALUES
	('Francia Minaya', 'Jhon', '11223344'),
    ('Ochoa Prada', 'Karina', '11112222'),
    ('Castilla Morales', 'Carlos', '33334444');

CREATE TABLE perfiles
(
	idperfil 		INT AUTO_INCREMENT PRIMARY KEY,
	perfil 			VARCHAR(30) 	NOT NULL,
    nombrecorto		CHAR(3)			NOT NULL,
    descripcion		VARCHAR(200) 	NULL,
    create_at 		DATETIME 		NOT NULL DEFAULT NOW(),
    CONSTRAINT uk_perfil_per UNIQUE (perfil),
    CONSTRAINT uk_nombrecorto_per UNIQUE (nombrecorto)
)ENGINE = INNODB;

INSERT INTO perfiles (perfil, nombrecorto) VALUES
	('Administrador', 'ADM'),
    ('Supervisor', 'SPV'),
    ('Invitado', 'INV');

CREATE TABLE usuarios
(
	idusuario 		INT AUTO_INCREMENT PRIMARY KEY,
    idpersona 		INT 			NOT NULL,
    idperfil 		INT				NOT NULL,
    nomuser 		VARCHAR(20) 	NOT NULL,
    passuser 		VARCHAR(70) 	NOT NULL,
    create_at 		DATETIME 		NOT NULL DEFAULT NOW(),
    update_at 		DATETIME 		NULL,
    inactive_at		DATETIME 		NULL,
    CONSTRAINT fk_idpersona_usu FOREIGN KEY (idpersona) REFERENCES personas (idpersona), 
    CONSTRAINT uk_idpersona_usu UNIQUE (idpersona), -- Uno a Uno
    CONSTRAINT fk_idperfil_usu FOREIGN KEY (idperfil) REFERENCES perfiles (idperfil),
    CONSTRAINT uk_nomuser_usu UNIQUE (nomuser)
)ENGINE = INNODB;

-- La contraseña debe encriptarse
INSERT INTO usuarios (idpersona, idperfil, nomuser, passuser) 
	VALUES 
		(1, 1, 'Jhon', '123'),
        (2, 2, 'Karina', '123'),
        (3, 3, 'Carlos', '123');

-- clave: nomuser+123
UPDATE usuarios SET passuser = '$2y$10$2bLM5P3czoCxOgUzUiczb.I9v7zCrNCTHHypgQqxI7dS7fPzy6jXm' WHERE idusuario = 1;
UPDATE usuarios SET passuser = '$2y$10$mN17BrRISm3N0Yo/DjF8YebEudo7rMKdHRdCa/yfatEbD3zPHOS9S' WHERE idusuario = 2;
UPDATE usuarios SET passuser = '$2y$10$zLZfCqnbfLatck7P7uCzBOyRFTFYK437m2m05H7k3uYz1Zzx8Va/.' WHERE idusuario = 3;

/* ACTUALIZACIÓN */

CREATE TABLE modulos
(
	idmodulo 			INT AUTO_INCREMENT PRIMARY KEY,
    modulo 				VARCHAR(100) 	NOT NULL,
    create_at 			DATETIME 		NOT NULL DEFAULT NOW(),
    CONSTRAINT uk_modulo_mod UNIQUE (modulo)
)ENGINE = INNODB;

CREATE TABLE rutas
(
	idruta 				INT AUTO_INCREMENT PRIMARY KEY,
    idmodulo 			INT 			NOT NULL,
    ruta 				VARCHAR(100)	NOT NULL,
    isvisible 			CHAR(1) 		NOT NULL,
    texto 				VARCHAR(30) 	NULL,
    icono 				VARCHAR(30) 	NULL,
    CONSTRAINT fk_idmodulo_rta FOREIGN KEY (idmodulo) REFERENCES modulos (idmodulo),
    CONSTRAINT uk_ruta_rta UNIQUE (ruta),
    CONSTRAINT ck_isvisible_rta CHECK (isvisible IN ('S','N'))
)ENGINE = INNODB;

CREATE TABLE permisos
(
	idpermiso 			INT AUTO_INCREMENT PRIMARY KEY,
    idperfil 			INT 			NOT NULL,
    idruta 				INT 			NOT NULL,
    create_at 			DATETIME NOT NULL DEFAULT NOW(),
    CONSTRAINT fk_idperfil_per FOREIGN KEY (idperfil) REFERENCES perfiles (idperfil),
    CONSTRAINT fk_idruta_per FOREIGN KEY (idruta) REFERENCES rutas (idruta),
    CONSTRAINT uk_idruta_per UNIQUE (idperfil, idruta)
)ENGINE = INNODB;

