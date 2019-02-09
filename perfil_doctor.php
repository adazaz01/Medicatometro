<?php
session_start();

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
  <p>&nbsp;</p>
</div>
<p>&nbsp;</p>
<div id="contenido">
      
  <p>
    <?php
	echo '<h2>Bienvenido Doctor ' . $doctor['nombre'] . '</h2>';
?>
  </p>
  <?php if( isset( $_GET['mensaje'] ) && ! empty( $_GET['mensaje'] ) ):?>
  <p class="php"><?php echo $_GET['mensaje'];?></p>
	<?php endif;?>
      <p>
  <form name="form3" method="post" action="buscar_paciente.php">
         <label for="textfield4">Buscar Paciente</label>
         <input type="text" name="buscar" placeholder="Cedula del paciente" required pattern="[0-9]{8}"/>
            
         <input type="submit" name="button" id="button" value="Buscar"/>
  </form></p>
      <p>&nbsp;</p>
      <p><img src="imagenes/directoriomedico.jpg" width="543" height="418"></p>
      <p>&nbsp;</p>
</div>
<div id="barra-lateral">
<p align="center">&nbsp;</p>
<p align="center">&nbsp;</p>
<p align="center">&nbsp;</p>
<p align="center"><a href="cerrar_sesion.php"><img src="imagenes/13457808-logout-icon.jpg" width="146" height="113"  alt=""/></a></p>
<p align="center">&nbsp;</p>
<h3>&nbsp;</h3>
</div>
<div id="pie-de-pag">© 2013 Medicatometro</div>
</body>
</html>
