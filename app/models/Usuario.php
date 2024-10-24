<?php

require_once "Conexion.php";

/**
 * Contiene toda la lógica (CRUD) de acceso a datos
 */
class Usuario extends Conexion{

  //Objeto a nivel de clase, que almacena la conexión
  private $pdo;

  /**
   * Al momento de instanciar esta clase, el objeto "pdo" recibe la conexión
   */
  public function __CONSTRUCT() { $this->pdo = parent::getConexion(); }

  /**
   * Validará el acceso en 2 pasos (primero usuario, segundo contraseña)
   * @param array $params Arreglo que contiene el nombre de usuario
   * @return array Retornará una colección
   */
  public function login($params = []):array{
    try{
      //Variables de entrada:
      //Forma 1    : ?,?,? (comodines|índice de datos)
      //Forma 2    : @valor1, @valor2, @valorN (explícita)
      $cmd = $this->pdo->prepare("call spu_usuarios_login(?)");
      
      //Forma 1
      $cmd->execute(array($params['nomuser']));
      //Forma 2
      //$cmd->bindParam(@variable, $valor);

      //Se retorna la colección como arreglo asociativo (JSON)
      return $cmd->fetchAll(PDO::FETCH_ASSOC);
    }
    catch(Exception $e){
      error_log("Error login: " . $e->getMessage());
      return [];
    }
  }

  public function add(){}
  public function update(){}
  public function delete(){}

} //Fin clase