<?php
require_once('config.php');
require_once( CLASSPATH . 'paciente.php' );

//Instanciamos la clase paciente
$paciente = new paciente();

//Capturamos los datos del formulario

$eliminar = $_POST['eliminar'];


if($paciente->eliminar_doctor($eliminar))
{
	$url = 'eliminar_doctor.php?mensaje=' . urlencode($paciente->mensaje);
	header("Location: $url");
}
else
{
	$url = 'eliminar_doctor.php?mensaje=' . urlencode($paciente->mensaje);
	header("Location: $url");	
}

?>
