<?php

/*
	Este es el fichero main y solo es usado por index.php
	manteniendolo mucho mas claro.
*/
error_reporting(E_ALL);

require_once "includes/config.php";
require_once "includes/controladores/c_sesion.php";
//require_once "includes/modelos/m_conexion.php";
//require_once "includes/modelos/m_usuario.php";
require_once "includes/modelos/m_abstDB.php";
require_once "includes/modelos/m_usu.php";
require_once "includes/vistas/_header.php";
require_once "includes/vistas/_login.php";
require_once "recursos/respuesta_login.php";


?>
