<?php
	require_once('m_abstDB.php');

	class Usuario extends DBAbstractModel {

		public $nombre;
		public $apellidos;
		public $paginas;
		private $clave;
		private $qry;
		protected $id;

		function __construct() {
			$firephp = FirePHP::getInstance(true);
			$this->db_name = 'dbUsuarios';
		}
		
		public function find($n,$p) {
			$this->qry =  array( 'nombre' => $n,'password' => $this->$p);
			$this->get_results_from_query();
			$firephp->log($this->rows);
		}

/*		public function get($user_email='') {
			if($user_email != ''):
				$this->query = "
				SELECT id, nombre, apellido, email, clave
				FROM usuarios WHERE email = '$user_email'";
				$this->get_results_from_query();
			endif;

			if(count($this->rows) == 1):
				foreach ($this->rows[0] as $propiedad=>$valor):
				$this->$propiedad = $valor;
				endforeach;
			endif;
		}
		
		public function set($user_data=array()) {
			if(array_key_exists('email', $user_data)):
				$this->get($user_data['email']);
				if($user_data['email'] != $this->email):
					foreach ($user_data as $campo=>$valor):
						$$campo = $valor;
					endforeach;
					$this->query = "INSERT INTO usuarios
					(nombre, apellido, email, clave)
					VALUES ('$nombre', '$apellido', '$email', '$clave')";
					$this->exec_query();
				endif;
			endif;
		}
		
		public function edit($user_data=array()) {
			foreach ($user_data as $campo=>$valor):
				$$campo = $valor;
			endforeach;
			$this->query = "UPDATE usuarios SET nombre='$nombre',
							apellido='$apellido',clave='$clave'
							WHERE email = '$email'";
			$this->execute_single_query();
		}

		public function delete($user_email='') {
			$this->query = "DELETE FROM usuarios
							WHERE email = '$user_email'";
			$this->execute_single_query();
		}
*/		
		function __destruct() {
			unset($this);
		}
	}
?>
