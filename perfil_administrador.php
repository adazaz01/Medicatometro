<?php
session_start();

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
?>
<!doctype html>
<html>
<head>
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
  <p>&nbsp;</p>
  <p>
    <?php
	echo '<h2>Bienvenido Administrador ' . $adm['usuario'] . '</h2>';
?>
  </p>
  <p> <a href="login_datos_paciente.php"><img src="imagenes/regi_pac.png" width="326" height="99"  alt=""/></a><a href="login_datos_doctor.php"><img src="imagenes/reg_doc.png" width="326" height="99"  alt=""/></a></p>
  <p><a href="modificar_pa.php"><img src="imagenes/regi_pac - copia.png" width="326" height="99"  alt=""/></a><a href="modificar_doc.php"><img src="imagenes/mof_doc.png" width="326" height="99"  alt=""/></a></p>
          	<p><a href="eliminar_paciente.php"><img src="imagenes/elimi_pa.png" width="326" height="99"  alt=""/></a><a href="eliminar_doctor.php"><img src="imagenes/elimi_doc.png" width="326" height="99"  alt=""/></a></p>
          	<p>&nbsp;</p>
</div>
<div id="barra-lateral">
<p align="center">&nbsp;</p>
<p align="center">&nbsp;</p>
<p align="center">&nbsp;</p>
<p align="center">&nbsp;</p>
<h3><a href="cerrar_sesion.php"><img src="imagenes/13457808-logout-icon.jpg" width="146" height="113"  alt=""/></a></h3>                   
</div>
<div id="pie-de-pag">© 2013 Medicatometro</div>
</body>
</html>
