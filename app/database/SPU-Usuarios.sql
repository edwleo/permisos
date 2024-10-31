USE dbasistencia;

-- MECANISMOS / FORMAS / TIPOS
-- Instrucción SQL
-- Store Procedure
-- ORM

CALL spu_usuarios_login('karina');
SELECT * FROM perfiles;

DROP PROCEDURE IF EXISTS `spu_usuarios_login`;
DELIMITER //
CREATE PROCEDURE spu_usuarios_login(IN _nomuser VARCHAR(20))
BEGIN
	SELECT
		US.idusuario,
        PE.apellidos, PE.nombres,
        PR.perfil, PR.nombrecorto,
        US.nomuser, US.passuser
		FROM usuarios US
        INNER JOIN personas PE ON PE.idpersona = US.idpersona
        INNER JOIN perfiles PR ON PR.idperfil = US.idperfil
        WHERE US.nomuser = _nomuser AND US.inactive_at IS NULL;
END //
