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
    <h3 class="text-center mt-2 font-weight-bold">Gestión de Productos</h3>

    <div class="container w-75 mt-4">
        <div>
            <a href="../index.php" class="btn btn-warning">Volver</a>
        </div>
        <div class="d-flex justify-content-end">
            <form id="formCrear" method="POST" action="../index.php">
                <a href="../index.php">
                    <button class="btn btn-success text-left" type="button" name="crear">Añadir</button>
                </a>
            </form>
        </div>

        <table class="table text-white table-dark text-center mt-2">
            <thead>
                <tr>
                    <th class="font-weight-normal" scope="col">identificador</th>
                    <th class="font-weight-normal" scope="col">Nombre</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $consulta_sql = 'SELECT * FROM productos';
                $sentencia_sql = $conexion->prepare($consulta_sql);
                $sentencia_sql->execute();
                $lista_productos = $sentencia_sql->fetchAll(PDO::FETCH_ASSOC);
                $conexion = null;
                $sentencia_sql = null;
                foreach ($lista_productos as $producto) {
                ?>
                    <tr>
                        <td class="font-weight-normal"><?= $producto['id'] ?></td>
                        <td class="font-weight-normal"><?= $producto['nombre'] ?></td>
                        <td class="font-weight-normal">
                        <td>
                            <a href="../Producto/update.php?id=<?= $producto['id'] ?>">
                                <button class="btn btn-primary" type="button" name="editar">Editar</button>
                            </a>
                        </td>
                        <td>
                            <a href="../Producto/detalle.php?id=<?= $producto['id'] ?>">
                                <button class="btn btn-info" type="button" name="detalle">Detalle</button>
                            </a>
                        </td>
                        <td>
                            <a href="../Producto/borrar.php?id=<?= $producto['id'] ?>">
                                <button class="btn btn-danger" type="button" name="eliminar">Borrar</button>
                            </a>
                        </td>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

    </div>
    </div>
    <script src="https://ide.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>