<?php

include_once('controllers/control.php');

//OPCIONALES
include_once('config/Conexion.php');
include_once('models/formulario.php');


$controller = new Control();

if(!isset($_REQUEST['c'])){
   // echo 'tamos aca';
   require_once("views/home.php");
} else {                  
   $peticion = $_REQUEST['c'];
   call_user_func(array($controller , $peticion));
}

