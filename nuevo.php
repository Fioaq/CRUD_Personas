<?php
//archivos a utilizar
include("libs/conex.php");
include("libs/personas.lib.php");
include("libs/ciudades.lib.php");
//asignamos en la variable "d_ciudades" a todas las ciudades registradas en la base de datos
$d_ciudades = traerCiudades($conn);
$titulo = "Insertar Persona";
if ($_GET and $_GET['id']) {
    //si existe un id, cambiamos el titulo a "Editar Persona"
    $titulo = "Editar Persona";
    //traemos a la persona buscando mediante su id
    $rs = traerPersona($_GET['id'], $conn);
    echo "<pre>";
    $dato = $rs->fetch_assoc();
    echo "</pre>";
} else {
    $dato['id'] = -1;
    $dato['nombre'] = "";
    $dato['apellido'] = "";
    $dato['cin'] = "";
    $dato['fecha_nac'] = "";
    $dato['direccion'] = "";
    $dato['ciudad_id'] = "";
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personas -
        <?php echo $titulo; ?>
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
    <h3 class="text-center p-4">
        <?php echo $titulo; ?>
    </h3>
    <div>
        <form action="guardar.php" method="post" class="form d-flex flex-column align-items-center">
            <div class="d-flex justify-content-center gap-4">
                <div>
                    <label>Nombre</label><br>
                    <input type="hidden" id="id" name="id" value="<?php
                    echo $dato['id'];
                    ?>" />
                    <input class="form-control" type="text" id="nombre" name="nombre" required value="<?php
                    if (isset($dato['nombre'])) {
                        echo $dato['nombre'];
                    }
                    ?>" /> <br>
                    <label>CI</label><br>
                    <input class="form-control" type="text" id="cin" name="cin" required value="<?php
                    if (isset($dato['cin'])) {
                        echo $dato['cin'];
                    }
                    ?>" /> <br>
                    <label>Fecha de nacimiento</label><br>
                    <input class="form-control" type="date" id="fecha_nac" name="fecha_nac" required value="<?php
                    if (isset($dato['fecha_nac'])) {
                        echo $dato['fecha_nac'];
                    }
                    ?>" /> <br>
                </div>
                <div>
                    <label>Apellido</label><br>
                    <input class="form-control" type="text" id="apellido" name="apellido" required value="<?php
                    if (isset($dato['apellido'])) {
                        echo $dato['apellido'];
                    }
                    ?>" /> <br>
                    <label>Dirección</label><br>
                    <input class="form-control" type="text" id="direccion" name="direccion" required value="<?php
                    if (isset($dato['direccion'])) {
                        echo $dato['direccion'];
                    }
                    ?>" /> <br>
                    <label>Ciudad</label><br>
                    <select class="form-control" id="ciudad_id" name="ciudad_id" required value="<?php
                    if (isset($dato['ciudad_id'])) {
                        echo $dato['ciudad_id'];
                    }
                    ?>">
                        <?php foreach($d_ciudades as $d){?>
                        <option value="<?php echo $d['id']; ?>"><?php echo $d['nombre']; ?></option>
                        <?php } ?>
                    </select> <br>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
            <a href="index.php" class="mt-2">Volver</a>
        </form>
    </div>
</body>
</html>