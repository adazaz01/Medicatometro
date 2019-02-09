<?php
 
session_start();
   if(!isset($_SESSION['doctor']))
   {
        echo "No hay ninguna sesion iniciada";
//esto ocurre cuando la sesion caduca.
        
   }
   else
   { 
     session_destroy();
       //echo "Has cerrado la sesion";
echo "<meta content='0;URL=index.php?content=Formularioresgistro.php' http-equiv='REFRESH'> </meta>";
       
   }
 
 
   if(!isset($_SESSION['adm']))
   {
        echo "No hay ninguna sesion iniciada";
//esto ocurre cuando la sesion caduca.
        
   }
   else
   { 
     session_destroy();
       //echo "Has cerrado la sesion";
echo "<meta content='0;URL=index.php?content=Formularioresgistro.php' http-equiv='REFRESH'> </meta>";
       
   }
 
   
?>