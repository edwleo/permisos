<?php

const SERVER = "localhost";
const DB = "dbasistencia";
const USER = "root";
const PASS = "";
//Cadena de conexión
const SGBD = "mysql:host=" . SERVER . ";portname=3306;dbname=" . DB . ";charset=UTF8";

class Conexion{

  /**
   * Retorna la conexión al servidor y BD utilizando patrón SINGLETON y de acceso RESTRINGIDO
   */
  protected static function getConexion(){
    try{
      //Instancia de la clase PDO (Integrada en PHP)
      $pdo = new PDO(SGBD, USER, PASS);
      //Gestionará los errores/excepciones
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      //Retornamos conexión activa
      return $pdo;
    }
    catch(Exception $e){
      //error_log("Error conexión: " . $e->getCode());
      die($e->getMessage());
    }
  }

  /**
   * Método obtiene datos a través del SPU y los retorna en forma de arreglo
   */
  public static function getData($storeProcedure):array{
    return [];
  }

  /**
   * Evita SQLInjection
   */
  public static function limpiarCadena($cadena):string{
    $cadena = trim($cadena);
    $cadena = stripslashes($cadena); //Eliminar el backslash

    //Javascript
    $cadena = str_ireplace("<script>", "", $cadena);
    $cadena = str_ireplace("</script>", "", $cadena);
    $cadena = str_ireplace("<script src=", "", $cadena);
    $cadena = str_ireplace("<script type=", "", $cadena);
    $cadena = str_ireplace("'>", "", $cadena);

    //SQL
    $cadena = str_ireplace("SELECT * FROM", "", $cadena);
    $cadena = str_ireplace("DELETE FROM", "", $cadena);
    $cadena = str_ireplace("INSERT INTO", "", $cadena);
    $cadena = str_ireplace("DROP TABLE", "", $cadena);
    $cadena = str_ireplace("TRUNCATE TABLE", "", $cadena);
    $cadena = str_ireplace("SHOW TABLES", "", $cadena);
    $cadena = str_ireplace("SHOW DATABASE", "", $cadena);

    //Etiquetas
    $cadena = str_ireplace("<?php", "", $cadena);
    $cadena = str_ireplace("?>", "", $cadena);
    $cadena = str_ireplace("--", "", $cadena);
    $cadena = str_ireplace(">", "", $cadena);
    $cadena = str_ireplace("<", "", $cadena);
    $cadena = str_ireplace("[", "", $cadena);
    $cadena = str_ireplace("]", "", $cadena);
    $cadena = str_ireplace("{", "", $cadena);
    $cadena = str_ireplace("}", "", $cadena);
    $cadena = str_ireplace("==", "", $cadena);
    $cadena = str_ireplace("===", "", $cadena);
    $cadena = str_ireplace("^", "", $cadena); //ALT + 94
    $cadena = str_ireplace(";", "", $cadena);
    $cadena = str_ireplace("::", "", $cadena);

    $cadena = trim($cadena);
    return $cadena;
  }

} //Fin clase