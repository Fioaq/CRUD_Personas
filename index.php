<?php
//archivos a utilizar
include("libs/conex.php");
include("libs/personas.lib.php");
include("libs/ciudades.lib.php");
//asignamos en la variable "datos" a todas las personas registradas en la base de datos
$datos = traerPersonas($conn);
//asignamos en la variable "d_ciudades" a todas las ciudades registradas en la base de datos
$d_ciudades = traerCiudades($conn);
//funcion de confirmacion al eliminar y editar
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
    <nav class="d-flex flex-column align-items-center p-4">
        <h1>Personas</h1>
        <button class="btn btn-primary mt-2">
            <a href="nuevo.php" class="text-light text-decoration-none">Agregar persona</a>
        </button>
    </nav>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>CI</th>
                <th>Dirección</th>
                <th>Fecha de Nacimiento</th>
                <th>Ciudad</th>
                <th>Editar</th>
                <th>Borrar</th>
            </tr>
        </thead>
        <tbody>
            <?php
            //colocamos a cada persona registrada en la tabla mediante un foreach
            foreach ($datos as $d) {
                ?>
                <tr>
                    <td>
                        <?php echo $d['id']; ?>
                    </td>
                    <td>
                        <?php echo $d['nombre']; ?>
                    </td>
                    <td>
                        <?php echo $d['apellido']; ?>
                    </td>
                    <td>
                        <?php echo $d['cin']; ?>
                    </td>
                    <td>
                        <?php echo $d['direccion']; ?>
                    </td>
                    <td>
                        <?php echo $d['fecha_nac']; ?>
                    </td>
                    <td>
                        <?php 
                        foreach($d_ciudades as $data){
                            if($d['ciudad_id'] == $data['id']){
                                echo $data['nombre'];
                            }
                        }
                        ?>
                    </td>
                    <td>
                        <button class="btn btn-warning">
                            <a href="nuevo.php?mod=edtpersona&id=<?php echo $d['id']; ?>" onClick="return confirm('Desea editar este registro?')" class="text-light text-decoration-none">Editar</a>
                        </button>
                    </td>
                    <td>
                        <button class="btn btn-danger">
                            <a href="borrar.php?mod=delpersona&id=<?php echo $d['id']; ?>" onClick="return confirm('Desea borrar este registro?')" class="text-light text-decoration-none">Borrar</a>
                        </button>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</body>

</html>