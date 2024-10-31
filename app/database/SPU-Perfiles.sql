USE dbasistencia;

DROP PROCEDURE IF EXISTS `spu_perfiles_obtener_permisos`;
DELIMITER //
CREATE PROCEDURE spu_perfiles_obtener_permisos(IN _nombrecorto CHAR(3))
BEGIN
	SELECT * FROM perfiles;
END //