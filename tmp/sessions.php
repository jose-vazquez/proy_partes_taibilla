<?
class sesionusuario{
	var $_Inicio;
	var $_TiempoActivo;

	function sesionusuario(){
	  $this->_Set();
	  return $this;
	}

	function _Set(){
	  global $inicio;;
	  session_start();
	  
	  if (!session_is_registered ("inicio")){
		 session_register ("inicio");
		 $inicio = time();
	  }
	  
	  $this->_Inicio       = $inicio;
	  $this->_TiempoActivo = time()-$inicio;
	}

	function DameTiempo(){
	  $Retorno =0;
	  
	  $SegundosHora  =3600;
	  $SegundosMinuto=60;
	  
	  $Horas = floor ($this->_TiempoActivo/3600);
	  if ($Horas<1){ $SegundosHora=0; }

	  $Total = $this->_TiempoActivo-(($Horas*$SegundosHora)/60);
	  $Minutos = floor($Total/60);
	  if ($Minutos<1){ $SegundosMinuto=0; }

	  $Total = $this->_TiempoActivo-(($Horas*$SegundosHora)/60);
	  $Segundos = $Total-($Minutos*$SegundosMinuto);

	  $Retorno =$Horas.' horas '.$Minutos.' minutos '.$Segundos.' segundos';

	  return $Retorno;  
	}

}
?>
