<?php
session_start();

//Si en $_SESSION tenemos los datos del usuario
if( array_key_exists( 'adm', $_SESSION ) )
{
	//Mostramos el perfil
	$doctor = $_SESSION['adm'];
	
}
//Si no
else
{
	//Redireccionamos al usuario hacia la pantalla de registro/inicio de sesión
	$url = 'index.php?mensaje=' . urlencode('Debes iniciar sesión o registrarte');
	header("Location: $url");
}

require_once('config.php');
require_once( CLASSPATH . 'paciente.php' );

//Instanciamos la clase paciente
$paciente = new paciente();

//Capturamos los datos del formulario
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$sexo = $_POST['sexo'];
$cedula = $_POST['cedula'];
$telefono = $_POST['telefono'];

//Si logramos crear el paciente correctamente
if( $id = $paciente->crear($nombre, $apellido, $sexo, $cedula, $telefono) )
{
	if( isset( $paciente->mensaje ) && ! empty( $paciente->mensaje ) )
	{
		echo $paciente->mensaje;
	}
	
	$registro = $paciente->leer($id);
	
	
}
//Si no
else
{
	//Devolvemos al paciente a la pantalla de login, enviando mensaje de error
	$url = 'login_datos_paciente.php?mensaje=Ya existe un usuario registrado con ese numero de cedula';
	header("Location: $url");
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Sistema Medico</title>
<link href="css/estilo.css" rel="stylesheet" type="text/css">
<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css">
<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
</head>

<body>
<div id="cabezera">
      <ul id="MenuBar1" class="MenuBarHorizontal">
        <li>  <a href="index.php">Inicio</a>        </li>
        <li><a href="nosotros.php">Nosotros</a></li>
        <li><a href="innovacion.php">Innovacion</a>        </li>
        <li><a href="contacto.php">Contacto</a></li>
  </ul>
    </div>

<p>&nbsp;</p>
<div id="contenido">
  <h2>El Usuario se a registrado exitosamente</h2>
  <h3>Datos registrados</h3>
<?php 
		if( $registro )
		{
			echo '<p>Nombre: ' . $registro['nombre'] . '<p>';
			echo '<p>Apellido: ' . $registro['apellido'] . '<p>';
			echo '<p>Sexo: ' . $registro['sexo'] . '<p>';
			echo '<p>Cedula: ' . $registro['cedula'] . '<p>';
			echo '<p>Telefono: ' . $registro['telefono'] . '<p>';	
		}
		?>
</div>
<div id="barra-lateral">
<p align="center">&nbsp;</p>
<p align="center">&nbsp;</p>
<p align="center">&nbsp;</p>
<p align="center"><a href="cerrar_sesion.php"><img src="imagenes/13457808-logout-icon.jpg" width="146" height="113"  alt=""/></a><a href="index.php"></a><a href="index.php"></a></p>
<p><a href="perfil_administrador.php"><img src="imagenes/menu.png" width="175" height="87"></a></p>                   
</div>
<div id="pie-de-pag">© 2013 Medicatometroo</div>
</body>
</html>
