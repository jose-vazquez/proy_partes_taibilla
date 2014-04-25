<?php

//require_once('m_conexion.php');

class Usuario{
	
	/*
		El método find() selecciona UN usuario
		de la bbdd y me devuelve los datos como un array.
	*/
	
	private $dbh;
	private $usu;
	private $pass;
	private $dbname='dbUsuarios';
	
	//Cargo el nombre y password ... 
	function __construct($n,$p){
		$this->usu = $n;
		$this->pass = $p;
		$this->dbh = new Conexion($this->dbname);
		$firephp = FirePHP::getInstance(true);
		$firephp->log("initdb");
		}
	
	//Si existe el usuario, devolver sus datos. 
	public function find(){
		$firephp = FirePHP::getInstance(true);
		//$this->initdb();
		$qry =  array( 'nombre' => $this->pass,'password' => $this->usu);
		$firephp->log($qry);
		$db = $this->dbh;
		$firephp->log($db);
		$st = $db->cPersonal->findOne($qry);
		$firephp->log($st);
		//devuelvo el array
		return $st;
	}
	

}
?>
