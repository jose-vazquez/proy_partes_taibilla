<?
require_once ("clasesesionusuario.php");

$SesionUsuario = new sesionusuario();
$TiempoActivo  = $SesionUsuario->DameTiempo();
unset ($SesionUsuario);
?>

<b>Tiempo Activo en la pagina:&nbsp;</b><?=$TiempoActivo?>