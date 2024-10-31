<?php
session_start(); //Crea o hereda la sesión

require_once "../models/Usuario.php";
$usuario = new Usuario();

//Arreglo para manejo de perfiles
//Módulo    : cada carpeta en views/
//ruta      : cada vista (UNIQUE) omitir la extensión
//visible   : se renderizará en el sidebar
//texto     : info a mostrar en el sidebar (solo si visible es true)
//icono     : info a mostrar en el sidebar (solo si visible es true)
$accesos = [
  "ADM" => [
    ["modulo" => "home", "ruta" => "welcome", "visible" => false, "texto" => "", "icono" => ""],

    ["modulo" => "colaboradores", "ruta" => "actualiza-colaborador", "visible" => false, "texto" => "", "icono" => ""],
    ["modulo" => "colaboradores", "ruta" => "lista-colaborador", "visible" => true, "texto" => "Colaborador", "icono" => "nav-icon fas fa-th"],
    ["modulo" => "colaboradores", "ruta" => "registra-colaborador", "visible" => false, "texto" => "", "icono" => ""],

    ["modulo" => "horarios", "ruta" => "lista-horario", "visible" => true, "texto" => "Horarios", "icono" => "nav-icon fas fa-th"],
    ["modulo" => "horarios", "ruta" => "registra-horario", "visible" => false, "texto" => "", "icono" => ""],

    ["modulo" => "permisos", "ruta" => "lista-permiso", "visible" => true, "texto" => "Permisos", "icono" => "nav-icon fas fa-th"],
    ["modulo" => "permisos", "ruta" => "registra-permiso", "visible" => false, "texto" => "", "icono" => ""],

    ["modulo" => "reportes", "ruta" => "lista-reporte", "visible" => true, "texto" => "Reportes", "icono" => "nav-icon fas fa-th"]
  ],
  "SPV" => [
    ["modulo" => "home", "ruta" => "welcome", "visible" => false, "texto" => "", "icono" => ""],
    ["modulo" => "colaboradores", "ruta" => "lista-colaborador", "visible" => true, "texto" => "Colaborador", "icono" => "nav-icon fas fa-th"],
    ["modulo" => "horarios", "ruta" => "lista-horario", "visible" => true, "texto" => "Horarios", "icono" => "nav-icon fas fa-th"],
    ["modulo" => "horarios", "ruta" => "registra-horario", "visible" => false, "texto" => "", "icono" => ""],
    ["modulo" => "permisos", "ruta" => "lista-permiso", "visible" => true, "texto" => "Permisos", "icono" => "nav-icon fas fa-th"]
  ],
  "INV" => [
    ["modulo" => "home", "ruta" => "welcome", "visible" => false, "texto" => "", "icono" => ""],
    ["modulo" => "horarios", "ruta" => "lista-horario", "visible" => true, "texto" => "Horarios", "icono" => "nav-icon fas fa-th"],
    ["modulo" => "permisos", "ruta" => "lista-permiso", "visible" => true, "texto" => "Permisos", "icono" => "nav-icon fas fa-th"]
  ]
];
//Fin de arreglo de perfiles

//Variable/arreglo de sesión que guarde información de acceso
if (!isset($_SESSION['login']) || $_SESSION['login']['status'] == false){
  $_SESSION['login'] = [
    "status"      => false,
    "idusuario"   => -1,
    "apellidos"   => "",
    "nombres"     => "",
    "perfil"      => "",
    "nomuser"     => "",
    "permisos"    => []
  ];
}

//Comunicación E/S JSON -- Salidas: XML, PDF, TXT, XLS
header('Content-Type: application/json; charset=utf-8');

//GET = Buscadores, listas, filtros, consultas...
//POST = Mayor nivel de protección
if ($_SERVER["REQUEST_METHOD"] == "POST"){

  if ($_POST['operation'] == 'login'){
    //Obteniendo datos del origen (VISTA)
    $nomuser = $usuario->limpiarCadena($_POST['nomuser']); //Form login
    $passuser = $usuario->limpiarCadena($_POST['passuser']); //Form login
    $claveEncriptada = ""; //BD

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
        $statusLogin["mensaje"] = "Bienvenido a SENATI";

        //Actualizar los datos de la variable de sesión
        $_SESSION["login"]["status"] = true;
        $_SESSION["login"]["idusuario"] =  $registro[0]['idusuario'];
        $_SESSION["login"]["apellidos"] =  $registro[0]['apellidos'];
        $_SESSION["login"]["nombres"] =  $registro[0]['nombres'];
        $_SESSION["login"]["perfil"] =  $registro[0]['perfil'];
        $_SESSION["login"]["nomuser"] =  $registro[0]['nomuser'];
        //Enviamos todos los accesos en función del perfil...
        $_SESSION["login"]["permisos"] = $accesos[$registro[0]['nombrecorto']];

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