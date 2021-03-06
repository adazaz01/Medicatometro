﻿<?php
session_start();
require_once('config.php');
require_once( CLASSPATH . 'paciente.php' );

//Si en $_SESSION tenemos los datos del usuario
if( array_key_exists( 'adm', $_SESSION ) )
{
	//Mostramos el perfil
	$adm = $_SESSION['adm'];
	
}
//Si no
else
{
	//Redireccionamos al usuario hacia la pantalla de registro/inicio de sesión
	$url = 'index.php?mensaje=' . urlencode('Debes iniciar sesión o registrarte');
	header("Location: $url");
}

//Instanciamos la clase paciente
$adm = new paciente();

//Capturamos los datos del formulario

$buscar = $_POST['buscar'];


$registro = $adm->buscar_paciente($buscar);

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Sistema Medico</title>
<link href="css/estilo.css" rel="stylesheet" type="text/css">
<link href="SpryAssets/SpryAccordion.css" rel="stylesheet" type="text/css">
<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css">
<style type="text/css">
#contenido p img {
	float: right;
}
</style>
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
  <h2>Modificar Paciente</h2>
  <h3>Datos</h3>
		<?php if( $registro ):?>
    <form action="registrar_cambios_paciente.php" method="POST" name="paciente" >
	<label>Nombre: </label>
		<input type="text" name="nombre" value="<?php echo $registro['nombre'];?>" pattern="[A-Za-z]{1,20}"/>
		<br />
		
		<label>Apellido: </label>
		<input type="text" name="apellido" value="<?php echo $registro['apellido'];?>" pattern="[A-Za-z]{1,20}"/>
		<br />
		
		<label>Sexo: </label>
		<select name="sexo" value="<?php echo $registro['sexo'];?>"/>
        	<option value="Femenino">Femenino</option>
            <option value="Masculino">Masculino</option>
        </select>
		<br />
        
        <label>Cedula: </label>
		<input type="text" name="cedula" value="<?php echo $registro['cedula'];?>"  pattern="[0-9]{8}"/>
		<br />
		
		<label>Telefono: </label>
		<input type="text" name="telefono" value="<?php echo $registro['telefono'];?>" pattern="[0-9]{10}"/>
        <br />
        
        <input name="id" type="hidden" value="<?php echo $registro['id'];?>">
        <input type="image" name="imageField" id="imageField" src="imagenes/9069725-guardar-acero-icono-glosssy.jpg">
    </form>
    
    <?php else:?>
	<?php 
			$url = 'modificar_pa.php?mensaje=' . urlencode('El paciente no se encuentra registrado');
			header("Location: $url");
		?>
    
    <?php endif;?>
	
		
  <p><img src="imagenes/estudiante-pensativo-doctor-hablando-con-un-estetoscopio-adult-pixmac-imagen-56436651.jpg" width="262" height="399"  alt=""/></p>
  <p>&nbsp;</p>
</div>
<div id="barra-lateral">
<p align="center">&nbsp;</p>
<p align="center">&nbsp;</p>
<p align="center">&nbsp;</p>
<p align="center">&nbsp;</p>
<p align="center"><a href="cerrar_sesion.php"><img src="imagenes/13457808-logout-icon.jpg" width="146" height="113"  alt=""/></a><a href="index.php"></a></p>
<p align="center"><a href="perfil_administrador.php"><img src="imagenes/menu.png" width="175" height="93"></a></p>
<h3>&nbsp;</h3>                   
</div>
<div id="pie-de-pag">© 2013 Medicatometro</div>
</body>
</html>
