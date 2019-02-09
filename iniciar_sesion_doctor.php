<?php
require_once('config.php');
require_once( CLASSPATH . 'paciente.php' );

//Instanciamos la clase usuario
$doctor = new paciente();

//Si logramos iniciar sesi�n correctamente
if( $doctor->iniciar_sesion_doctor($_POST['nombre'], $_POST['cedula']) )
{
	//Redireccionamos al usuario hacia su p�gina de perfil
	header('Location: perfil_doctor.php');
}
//Si no podemos iniciar sesi�n correctamente
else
{
	//Redireccionamos al usuario a la pantalla de login, con un mensaje de error
	$url = 'index.php?mensaje=' . urlencode($doctor->mensaje);
	header("Location: $url");
}