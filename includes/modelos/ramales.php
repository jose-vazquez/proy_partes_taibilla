<?php

class Usuarios{
	
	/*
		El método ESTATICO find selecciona el usuario
		de la bbdd y me devuelve los datos como un array.
	*/
	
	public static function find($arr = array()){
		global $db;

		//$firephp = FirePHP::getInstance(true);
		
		if(empty($arr)){
			//$st = $db->prepare("SELECT * FROM jqm_categories");
			$qry =  array( 'numero' => 1 );
			$st = $db->colTomas->find($qry);
		}
		else if($arr['id']){
//			$st = $db->prepare("SELECT * FROM jqm_categories WHERE id=:id");
			$st = $db->prepare("SELECT * FROM jqm_categories WHERE id=:id");
		}
		else{
			throw new Exception("Unsupported property!");
		}
		
		$st->execute($arr);
		
		// Returns an array of Category objects:
		return $st->fetchAll(PDO::FETCH_CLASS, "Category");
	}
}

?>
