<?php

//Administrador (100%), Asistente, Invitado, 
$permisos = [
  "Administrador" => [
    ["modulo" => "Colaboradores", "ruta" => "colaboradores/lista-colaborador", "icono" => "nav-icon fas fa-th"],
    ["modulo" => "Colaboradores", "ruta" => "colaboradores/registra-colaborador", "icono" => "nav-icon fas fa-th"],
    ["modulo" => "Permisos", "ruta" => "permisos/lista-permiso", "icono" => ""],
    ["modulo" => "Permisos", "ruta" => "permisos/registra-permiso", "icono" => ""]
  ],
  "Asistente"     => [],
  "Invitado"      => []
];