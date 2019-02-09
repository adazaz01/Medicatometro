<?php
require_once('config.php');
require_once( CLASSPATH . 'paciente.php' );

//Instanciamos la clase paciente
$doctor = new paciente();

//Capturamos los datos del formulario
$historial = $_POST['historial'];
$examenes = $_POST['examenes'];
$id = $_POST['id'];


//Si logramos crear el paciente correctamente
if( $doctor->historia($historial, $id))
{
	$url = 'index.php?mensaje=' . urlencode($paciente->mensaje);
	header("Location: $url");
}

if( $doctor->examenes($examenes, $id))
{
	$url = 'index.php?mensaje=' . urlencode($paciente->mensaje);
	header("Location: $url");
}

$registro = $doctor->leer($id);
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
<div id="menu">
  

</div>
<div id="contenido">
  <h2>&nbsp;</h2>
  <h2>La Historia Clinica se ha guardado exitosamente</h2>
          	<h3>Historia guardada  </h3>
<?php 
		if( $registro )
		{
			echo '<p>Historial: ' . $registro['historial'] . '<p>';
			echo '<p>Examenes: ' . $registro['examenes'] . '<p>';
			
		}
		?>
</div>
<div id="barra-lateral">
<p align="center">&nbsp;</p>
<p align="center">&nbsp;</p>
<p align="center">&nbsp;</p>
<p align="center">&nbsp;</p>
<p align="center"><a href="cerrar_sesion.php"><img src="imagenes/13457808-logout-icon.jpg" width="146" height="113"  alt=""/></a><a href="index.php"></a></p>
<p align="center"><a href="perfil_doctor.php"><img src="imagenes/boton_volver_atras.gif" width="73" height="22" longdesc="perfil_doctor.php"></a></p>
<p align="center">&nbsp;</p>
<h3>&nbsp;</h3>                   
</div>
<div id="pie-de-pag">
  <div id="pie-de-pag2">© 2013 Medicatometro</div>
  <p>&nbsp;</p>
</div>
</body>
</html>
