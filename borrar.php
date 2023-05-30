<?php
//archivos a utilizar
include("libs/conex.php");
include("libs/personas.lib.php");
//Verificando si existe un id en el metodo GET
if ($_GET and $_GET['id']){
    //borramos a la persona correspondiente
    $rs=borrarPersona($_GET['id'],$conn);
}
header("Location: index.php");
    ?>