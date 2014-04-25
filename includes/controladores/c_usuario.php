<?php

/*   */

class Usu_help{
		
	//Si existe el usuario devuelvo sus datos.
	public function handleRequest(){
		$cat = Usuarios::find(array('id'=>$_GET['category']));
		
	}
	public function save_user(){
		
	}
	
	
}


?>
