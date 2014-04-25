<?php

class Session{
	
	private $user = array();
	
	function __construct($parameters = array()) {
		$this->user = $parameters;
  		$this->_set();
	}
	
	private function _set(){
		
		$firephp = FirePHP::getInstance(true);
		
		session_start();
		
		//si no esta registrado ...  
		if (empty($_SESSION["id"])){
			//... registrar
			$firephp->log("Registrando sesion ...");
			foreach($this->user as $key => $value) {
				$_SESSION["$key"] = $value;
			}
		}else{
			$firephp->log("Sesion ya registrada:");
		}

		//$this->destroy();
		$firephp->log($_SESSION);
	}
	
	public function destroy(){
		//Borro TODAS las vars de sesion
		$_SESSION = array();
		//destruyo la sesion
		session_destroy();
	}
	//Devuelve el valor de la variable
	public function get_value($key){
		return $_SESSION[$key];
	}
	//Destructor
	function __destruct(){
		$this->user=array();
		$this->destroy();
	}
	
/*	private function _
	public function save($s array){
	}
	public function set_var($var){
	}
	public function set_value_var($valor){
	}
	
	*/
}
?>
