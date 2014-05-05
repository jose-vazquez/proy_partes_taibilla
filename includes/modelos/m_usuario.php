<?php

require_once('m_conexion.php');

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
		$firephp->log($this->dbh->listDBs());

		//$firephp->log($this->conn->getConnections());
		$firephp->log("initdb");
		}
	
	//Si existe el usuario, devolver sus datos. 
	public function find(){
		$firephp = FirePHP::getInstance(true);
		$qry =  array( 'nombre' => $this->usu,'password' => $this->pass);
		$firephp->log($qry);
		$db = $this->dbh;
		$firephp->log($db);
		$firephp->log("find()");
//		$cursor = $db->cPersonal->find($qry);
//		$cursor = $this->dbh->cPersonal->find($qry);
		$col = new MongoCollection($this->dbh,'cPersonal');
		$firephp->log($col);
		$cursor = $col->findOne($qry);
		foreach($cursor as $d){
			$firephp->log($d);
		}
		//devuelvo el array
		return $cursor;
	}
	

}
?>
