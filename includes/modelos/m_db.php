<?php

class Conexion{
	
	/*
		El método find() selecciona UN usuario
		de la bbdd y me devuelve los datos como un array.
	*/
	//private $db_name = 'dbUsuarios';
	//Conecto con la bbdd apropiada.
	private $dbh;
	
	//Cargo el nombre y password ... 
	function __construct($db){
		$this->dbname = $db;
		
		}
	
	//inicio ddbb ...
	function initdb(){
		$this->db_host  = 'localhost';
        $this->username = 'adminjose';
        $this->pwd  	= 'Adm1nj0s3';
      //  $this->dbname  	= 'dbUsuarios';
   
        try{
			$conn=new MongoClient("mongodb://{$this->username}:{$this->pwd}@{$this->db_host}");
			$this->db = $conn->selectDB($this->dbname  );
			//$firephp->log("Conectado a $this->db ...");
		}catch (MongoCursorException $e){
			error_log($e->getMessage());
			//$firephp->log('ERROR $db_name ...');
			die("Error al conectar con la base de datos ".$e.getMessage());
		}
    }
	
	//Si existe el usuario, devolver sus datos. 
	public function find(){
		$this->initdb();
		$qry =  array( 'nombre' => $this->pass,'password' => $this->usu);
		$db = $this->db;
		$st = $db->cPersonal->findOne($qry);
		//devuelvo el array
		return $st;
	}
	

}
?>
