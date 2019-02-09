<?php
require_once('config.php');
require_once( CLASSPATH . 'paciente.php' );

//Instanciamos la clase usuario
$doctor = new paciente();

//Si logramos iniciar sesión correctamente
if( $doctor->iniciar_sesion_doctor($_POST['nombre'], $_POST['cedula']) )
{
	//Redireccionamos al usuario hacia su página de perfil
	header('Location: perfil_doctor.php');
}
//Si no podemos iniciar sesión correctamente
else
{
	//Redireccionamos al usuario a la pantalla de login, con un mensaje de error
	$url = 'index.php?mensaje=' . urlencode($doctor->mensaje);
	header("Location: $url");
}