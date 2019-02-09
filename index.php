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

<body background="");>
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

<div id="menu"><img src="imagenes/index.png" width="943" height="288"></div>
<div id="contenido">
  <h2>Medicatometro</h2>
          	<p><img src="imagenes/DrAtComputer.png" width="370" height="257" align="left">Bienvenido. Medicatometro es una solución informática que permite automatizar y optimizar los procesos manuales del registro del historial medico de los pacientes y 
       	    resultados de análisis de laboratorio. </p>
          	<p>Nuestro sistema esta enfocado en resguardar la información y brindar funciones que permitan la automatización efectiva  del cuidado de la salud y seguridad del paciente.</p>
          	<p>El Sistema Medico cuenta con niveles de acceso por usuario, registro de historiales medicos y resultados de examanes de laboratorio en línea.</p>
          	<p>&nbsp;</p>
</div>
<div id="barra-lateral">
  <p align="center"><strong>Iniciar sesion</strong></p>
 <?php if( isset( $_GET['mensaje'] ) && ! empty( $_GET['mensaje'] ) ):?>
	<p class="php"><?php echo $_GET['mensaje'];?></p>
	<?php endif;?>
<div id="Accordion1" class="Accordion" tabindex="0">
<div class="AccordionPanel">
    <div class="AccordionPanelTab">Paciente</div>
    <div class="AccordionPanelContent">
      <p>&nbsp;</p>
      <form name="form1" method="post" action="mostrar_historia.php">
        <p>
          <label for="textfield">Cedula</label>
          :
          <input type="text" name="cedula" required pattern="[0-9]{8}"/>
        </p>
        <p>
          <input type="submit" name="button" id="button" value="Enviar"/>
        </p>
      </form>
    </div>
</div>
<div class="AccordionPanel">
  <div class="AccordionPanelTab">Doctor</div>
  <div class="AccordionPanelContent">
    <form name="form2" method="post" action="iniciar_sesion_doctor.php">
      <p>
        <label for="textfield2">Usuario: </label>
        <input type="text" name="nombre" required/>
      </p>
      <p>
        <label for="textfield3">Contraseña:</label>
        <input type="password" name="cedula" required/>
      </p>
      
      <input type="submit" name="button" id="button" value="Enviar"/>
    </form>
  </div>
</div>
<div class="AccordionPanel">
  <div class="AccordionPanelTab">Administrador</div>
  <div class="AccordionPanelContent">
    <form name="form2" method="post" action="iniciar_sesion_adm.php">
      <p>
        <label for="textfield2">Usuario: </label>
        <input type="text" name="usuario" required/>
      </p>
      <p>
        <label for="textfield3">Contraseña:</label>
        <input type="password" name="clave" required/>
      </p>
      <p>
        <input type="submit" name="button" id="button" value="Enviar">
      </p>
    </form>
  </div>
</div>
</div>
<h3><img src="imagenes/banners_r9_c3.jpg" width="200" height="100"></h3>
</div>
<div id="pie-de-pag">© 2013 Medicatometro</div>

<script type="text/javascript">
var Accordion1 = new Spry.Widget.Accordion("Accordion1");
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
</script>

</body>
</html>
