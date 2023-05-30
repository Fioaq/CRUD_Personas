<?php
//archivos a utilizar
include("libs/conex.php");
include("libs/personas.lib.php");
if ($_POST) {
    //validamos los campos
    if ($_POST['nombre'] && $_POST['apellido'] && $_POST['cin'] && $_POST['fecha_nac'] && $_POST['direccion'] && $_POST['ciudad_id']) {
        if ($_POST['id'] == -1) {
            //si el id es -1, se agrega una nueva persona
            agregarPersona($_POST, $conn);
            $message="Persona agregada correctamente!";
        } else {
            //si el id no es -1, se edita la persona
            editarPersona($_POST, $conn);
            $message="Persona editada correctamente!";
        }
    }
}
//informamos al usuario y redirigimos
echo "<script type='text/javascript'>";
echo "alert('$message');\n";
echo "window.location.href='index.php'";
echo "</script>";
?>