<?php
session_start();

require_once "../models/Usuario.php";
$usuario = new Usuario();

//Variable/arreglo de sesión que guarde información de acceso
if (!isset($_SESSION['login']) || $_SESSION['login']['status'] == false){
  $_SESSION['login'] = [
    "status"      => false,
    "idusuario"   => -1,
    "apellidos"   => "",
    "nombres"     => "",
    "perfil"      => "",
    "nomuser"     => ""
  ];
}

//Comunicación E/S JSON
header('Content-Type: application/json; charset=utf-8');

//GET = Buscadores, listas, filtros, consultas...
//POST = Mayor nivel de protección
if ($_SERVER["REQUEST_METHOD"] == "POST"){

  if ($_POST['operation'] == 'login'){
    //Obteniendo datos del origen (VISTA)
    $nomuser = $usuario->limpiarCadena($_POST['nomuser']);
    $passuser = $usuario->limpiarCadena($_POST['passuser']);
    $claveEncriptada = "";

    //Arreglo que sirve para comunicarse con el usuario
    $statusLogin = [
      "esCorrecto"  => false,
      "mensaje"     => ""
    ];

    $registro = $usuario->login(['nomuser' => $nomuser]);
    
    //Comprobar si existe el usuario
    if (count($registro) == 0){
      //No existe el usuario
      $statusLogin["mensaje"] = "Usuario no existe";
    }else{
      //El usuario existe, verificar la contraseña
      $claveEncriptada = $registro[0]['passuser'];
      
      if (password_verify($passuser, $claveEncriptada)){
        //La contraseña es correcta
        $statusLogin["esCorrecto"] = true;
        $statusLogin["mensaje"] = "Bienvenido";

        //Actualizar los datos de la variable de sesión
        $_SESSION["login"]["status"] = true;
        $_SESSION["login"]["idusuario"] =  $registro[0]['idusuario'];
        $_SESSION["login"]["apellidos"] =  $registro[0]['apellidos'];
        $_SESSION["login"]["nombres"] =  $registro[0]['nombres'];
        $_SESSION["login"]["perfil"] =  $registro[0]['perfil'];
        $_SESSION["login"]["nomuser"] =  $registro[0]['nomuser'];

      }else{
        //La contraseña es INcorrecta
        $statusLogin["mensaje"] = "Contraseña incorrecta";
      }
    }

    //Enviando datos a la vista
    echo json_encode($statusLogin);

  } //Operation = Login
}// REQUEST_METHOD

//GET en la URL
if ($_SERVER["REQUEST_METHOD"] == "GET"){
  if ($_GET["operation"] == "destroy"){
    session_destroy();
    session_unset();
    header("Location: ../../");
  }
}