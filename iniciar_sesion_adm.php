<?php
require_once('config.php');
require_once( CLASSPATH . 'paciente.php' );

//Instanciamos la clase usuario
$adm = new paciente();

//Si logramos iniciar sesión correctamente
if( $adm->iniciar_sesion_adm($_POST['usuario'], $_POST['clave']) )
{
	//Redireccionamos al usuario hacia su página de perfil
	header('Location: perfil_administrador.php');
}
//Si no podemos iniciar sesión correctamente
else
{
	//Redireccionamos al usuario a la pantalla de login, con un mensaje de error
	$url = 'index.php?mensaje=' . urlencode('Usuario o contrasena invalidos, por favor intenta de nuevo');
	header("Location: $url");
	
}