<?php
//require_once('FirePHPCore/FirePHP.class.php');
//ob_start();
$firephp = FirePHP::getInstance(true);
 
$ok="Hasta aqui bien";

/* Define los valores que seran evaluados, en este ejemplo son valores 
 * estaticos, en una verdadera aplicacion generalmente son dinamicos 
 * a partir de una base de datos */

try{
	$conn=new MongoClient("mongodb://{$db_user}:{$db_pass}@{$db_host}");
	$db=$conn->selectDB($db_name);
	$firephp->log("Conectado a $db_name ...");
	$col=$db->selectCollection('cPersonal');
}catch (MongoCursorException $e){
	$firephp->log($e.getMessage(), 'ERROR: ');
	die("Falló al conectar con la base de datos ".$e.getMessage());
}

/* Extraigo los valores enviados desde la aplicacion movil */
$usuarioEnviado = $_GET['usuario'];
$passwordEnviado = $_GET['password'];

#$usuarioValido = "Scada_MCT";
$usu=$guardas->findOne(array('nombre' => $usuarioEnviado));
$usuarioValido=$usu['nombre'];
$cursor=$col->find();

$firephp->log($cursor, 'CURSOR: ');
$i=1;

while ($cursor->hasNext()):
	$a=$cursor->getNext();
	$firephp->log($a['nombre'], 'GUARDA: ');
	$usu=$a['nombre'];
	$pass=$a['password'];
	$firephp->log($i, 'i: ');
	$i=$i+1;
endwhile;

/* crea un array con datos del guarda que seran enviados 
 * de vuelta a la aplicacion */
$resultados = array();
$resultados["hora"] = date("F j, Y, g:i a"); 
$resultados["generador"] = "Enviado desde SERVIDOR WEB JOSE" ;


/* verifica que el usuario y password concuerden correctamente */
if(  $usuarioEnviado == $usuarioValido  && $passwordEnviado == $passwordValido ){
	/*esta informacion se envia solo si la validacion es correcta */
	$resultados["mensaje"] = "Validacion Correcta";
	$resultados["validacion"] = "ok";

}else{
	/*esta informacion se envia si la validacion falla */
	$resultados["mensaje"] = "Usuario y password incorrectos";
	$resultados["validacion"] = "error";
}


/*convierte los resultados a formato json*/
$resultadosJson = json_encode($resultados);

/*muestra el resultado en un formato que no da problemas de seguridad en browsers */
echo $_GET['jsoncallback'] . '(' . $resultadosJson . ');';

?>
