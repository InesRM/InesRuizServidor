<?php include_once '../Conexion/conexion.php' ?>

<?php include_once '../Layout/header.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- css para usar Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Gestión de Productos - Tarea 3</title>
</head>

<body>
    <h3 class="text-center mt-2 font-weight-bold">Detalle Producto </h3>

    <div class="container w-75 mt-4">
        <div class="card text-white bg-dark mb-3" style="max-width: 70rem;">

            <?php
            $id = $_GET['id'];
            $detalle = "SELECT nombre, nombre_corto, pvp, familia, descripcion from productos where id=$id";    
            $sentencia_sql = $conexion->prepare($detalle);
            $sentencia_sql->execute();
            $producto = $sentencia_sql->fetch();
            ?>
            <div class="card-header">Detalle del Producto</div>
            <?php
            echo "<div class='card-body'>";
            echo "
            <h5 class='card-title'>Nombre: ".$producto["nombre"]."</h5>
            <h5 class='card-title'>Nombre Corto: ".$producto["nombre_corto"]."</h5>
            <h5 class='card-title'>Precio: ".$producto["pvp"]."</h5>
            <h5 class='card-title'>Familia: ".$producto["familia"]."</h5>
            <h5 class='card-title'>Descripción: ".$producto["descripcion"]."</h5>
            </div>";
            ?>
        </div>

    </div>
    <div class="col text-center">
        <a href="./listado.php">
            <button class="btn btn-warning text-left" type="button" name="listar">Volver</button>
        </a>

    </div>
</body>

</html>