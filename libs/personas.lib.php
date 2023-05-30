<?php
function traerPersonas($con)
{
    $sql = "SELECT * FROM personas";
    $filas = $con->query($sql);
    return $filas;
}
function traerPersona($id, $con)
{
    $sql = "SELECT * FROM personas where id=" . $id;
    $filas = $con->query($sql);
    return $filas;
}
function agregarPersona($datos, $con)
{
    $sql = "INSERT INTO personas (`nombre`, `apellido`, `cin`, `direccion`, `fecha_nac`, `ciudad_id`) VALUES ('" . $datos['nombre'] . "', '". $datos['apellido'] . "', '".  $datos['cin'] . "', '" . $datos['direccion'] . "', '" . $datos['fecha_nac'] . "', '" . $datos['ciudad_id'] . "');";
    $con->query($sql);
}
function editarPersona($datos, $con)
{
    // update personas set nombre = CAMPO where id= ID
    $sql = "update personas set nombre ='" . $datos['nombre'] . "', apellido ='" . $datos['apellido'] . "', cin ='" . $datos['cin'] . "', direccion ='" . $datos['direccion'] . "', fecha_nac ='" . $datos['fecha_nac'] . "', ciudad_id ='" . $datos['ciudad_id'] . "' where id=" . $datos['id'];
    $con->query($sql);
}
function borrarPersona($id, $con)
{
    // delete from personas where id == ID
    $sql = "delete from personas where id=" . $id;
    $filas = $con->query($sql);
    return $filas;
}
?>