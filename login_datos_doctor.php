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
</div>
<div id="contenido">
  <h2>&nbsp;</h2>
  <h2>Registrar Doctor</h2>
  
  <?php if( isset( $_GET['mensaje'] ) && ! empty( $_GET['mensaje'] ) ):?>
  <p><?php echo $_GET['mensaje'];?></p>
	<?php endif;?>
    
  <form action="registrar_doctor.php" method="POST" name="paciente" enctype="multipart/form-data" >
	
	<label>Nombre: </label>
		<input type="text" name="nombre" placeholder="Nombre del Doctor" required  pattern="[A-Za-z]{1,20}"/>
		<br />
		
		<label>Apellido: </label>
		<input type="text" name="apellido" placeholder="Apellido del Doctor" required pattern="[A-Za-z]{1,20}"/>
		<br />
		
		<label>Sexo: </label>
		<select name="sexo" required/>
        	<option value="Femenino">Femenino</option>
            <option value="Masculino">Masculino</option>
        </select>
		<br />
        
        <label>Cedula: </label>
		<input type="text" name="cedula" placeholder="Cedula del Doctor" required/ pattern="[0-9]{8}">
		<br />
		
		<label>Telefono: </label>
		<input type="text" name="telefono" placeholder="Telefono del Doctor" required pattern="[0-9]{10}"/>
		<br />
        
        <label>Especialidad: </label>
		<input type="text" name="especialidad" placeholder="Especialidad del Doctor" required pattern="[A-Za-z]{1,50}"/>
		<br />
        
        	<label>Foto: </label>
		<input type="file" name="foto" />
		<br />
		<input type="image" name="imageField" id="imageField" src="imagenes/boton_enviar.gif">
  </form>
    
    
    
    </p>
        </div>
<div id="barra-lateral">
<p align="center">&nbsp;</p>
<p align="center">&nbsp;</p>
<p align="center">&nbsp;</p>
<p align="center">&nbsp;</p>
<p align="center"><a href="cerrar_sesion.php"><img src="imagenes/13457808-logout-icon.jpg" width="146" height="113"  alt=""/></a><a href="index.php"></a></p>
<p><a href="perfil_administrador.php"><img src="imagenes/menu.png" width="175" height="87"></a></p>                   
</div>
<div id="pie-de-pag">© 2013 Medicatometro</div>
</body>
</html>
