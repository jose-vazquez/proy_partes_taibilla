<?php

/*
	Este es el index de mi website.
*/


require_once "includes/main.php";
require_once('FirePHPCore/FirePHP.class.php');

$firephp = FirePHP::getInstance(true);
$firephp->log('Inicio ...');

try {
	$n=$_POST['nom_usuario'];
	$p=$_POST['clave'];

	//Si introduce nombre y pass ...
	if($p && $n){
		$c = new Usuario($n,$p);
		//$firephp->log("Usuario ...$p - $n");
		$usuario = $c->find();
		
		//si no existe el usuario enviar mensaje ...
		if (empty($usuario)){
			$firephp->log("No existe tal usuario");
			header("Location:./includes/vistas/m.php");
		}else{
			//si existe el usuario, comenzar sesion ..
			$firephp->log("Session ...");
			$u = new Session($usuario);
			$firephp->log($usuario);
			//header("Location:./includes/vistas/m.php");
		}
	}//si no se introducen datos ...
	else if(empty($_POST)){
		//$c = new HomeController();
		$firephp->log('No Hay Datos ...');
	}
	else throw new Exception('! Página errónea ¡');
	
}
catch(Exception $e) {
	//Muestra la página de error usando la función render de helper.php:
}

?>
