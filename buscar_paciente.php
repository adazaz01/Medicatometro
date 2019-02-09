<?php
session_start();
require_once('config.php');
require_once( CLASSPATH . 'paciente.php' );

//Si en $_SESSION tenemos los datos del usuario
if( array_key_exists( 'doctor', $_SESSION ) )
{
	//Mostramos el perfil
	$doctor = $_SESSION['doctor'];
	
}
//Si no
else
{
	//Redireccionamos al usuario hacia la pantalla de registro/inicio de sesión
	$url = 'index.php?mensaje=' . urlencode('Debes iniciar sesión o registrarte');
	header("Location: $url");
}

//Instanciamos la clase paciente
$doctor = new paciente();

//Capturamos los datos del formulario

$cedula = $_POST['buscar'];


$registro = $doctor->buscar_paciente($cedula);
	
	

?>
<!doctype html>
<html>
<head>
<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>						
<meta charset="utf-8">
<title>Sistema Medico</title>
<link href="css/estilo.css" rel="stylesheet" type="text/css">
<link href="SpryAssets/SpryAccordion.css" rel="stylesheet" type="text/css">
<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css">
<script src="SpryAssets/SpryAccordion.js" type="text/javascript"></script>
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
     
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</div>




<div id="contenido">
  <h2>&nbsp;</h2>
  <h2>Paciente encontrado</h2>
  <h3>Datos</h3>
<?php 
		if( $registro )
		{
			echo '<p>Nombre: ' . $registro['nombre'] . '<p>';
			echo '<p>Apellido: ' . $registro['apellido'] . '<p>';
			echo '<p>Sexo: ' . $registro['sexo'] . '<p>';
			echo '<p>Cedula: ' . $registro['cedula'] . '<p>';
			echo '<p>Telefono: ' . $registro['telefono'] . '<p>';	
		}
		else
		{
			$url = 'perfil_doctor.php?mensaje=' . urlencode('El paciente no se encuentra registrado');
			header("Location: $url");
		}
		?>
      <form class="historial" action="historial.php" method="post">
        <p>
          <label for="textfield">Historial Medico</label>
          <textarea name="historial" style="width: 100%;" ><?php echo $registro['historial'] ?></textarea>
          
           <label for="textfield">Examenes de Laboratorio</label>
          <textarea name="examenes" style="width: 100%;" ><?php echo $registro['examenes'] ?></textarea>
          
          <input name="id" type="hidden" value="<?php echo $registro['id'] ?>">
          
          <input name="Guardar" type="submit" value="Guardar"/> 
          
        </p>
        <p>&nbsp;</p>
    </form>
  <p>&nbsp;</p>
</div>
<div id="barra-lateral">
<p align="center">&nbsp;</p>
<p align="center">&nbsp;</p>
<p align="center">&nbsp;</p>
<p align="center">&nbsp;</p>
<p align="center"><img src="imagenes/12137494-medico-y-paciente-joven-aislado-sobre-fondo-blanco.png" width="200" height="353"></p>
<h3>&nbsp;</h3>                   
</div>
<div id="pie-de-pag">© 2013 Medicatometro</div>
</body>
</html>
