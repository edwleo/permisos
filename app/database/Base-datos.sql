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
    CONSTRAINT uk_idpersona_usu UNIQUE (idpersona),
    CONSTRAINT fk_idperfil_usu FOREIGN KEY (idperfil) REFERENCES perfiles (idperfil),
    CONSTRAINT uk_nomuser_usu UNIQUE (nomuser)
)ENGINE = INNODB;

-- La contraseña debe encriptarse
INSERT INTO usuarios (idpersona, idperfil, nomuser, passuser) 
	VALUES 
		(1, 1, 'Jhon', '123'),
        (2, 2, 'Karina', '123'),
        (3, 3, 'Carlos', '123');

-- SELECT * FROM usuarios;


