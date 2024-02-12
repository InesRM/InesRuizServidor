<?php include_once './Conexion/conexion.php' ?>
<?php include_once './Layout/header.php';

//Obtenemos las familias de los productos, no de las familias

$sql_familias = 'SELECT DISTINCT familia FROM productos';
$sentencia_familias = $conexion->query($sql_familias);
$familias = $sentencia_familias->fetchAll(PDO::FETCH_COLUMN);



//Manejamos la selección del desplegable

if (isset($_POST['familia'])) {
    $familia_seleccionada = $_POST['familia'];
    $sql_productos = "SELECT id, nombre_corto, pvp FROM productos WHERE familia = '$familia_seleccionada'";
    $sentencia_productos = $conexion->query($sql_productos);
    $productos = $sentencia_productos->fetchAll(PDO::FETCH_ASSOC);
} else {
    $sql_productos = "SELECT * FROM productos";
    $sentencia_productos = $conexion->query($sql_productos);
    $productos = $sentencia_productos->fetchAll(PDO::FETCH_ASSOC);
}

?>

<body>
    <h3 class="text-center mt-2 font-weight-bold">Gestión de familias</h3>

    <div class="container w-75 mt-4">
        <div>
            <a href="./Producto/producto.php" class="btn btn-warning">Volver</a>
        </div>
        <div class="d-flex justify-content-end">
            <form id="formCrear" method="POST" action="">
                <a href="../index.php">
                    <button class="btn btn-success text-left" type="button" name="crear">Añadir</button>
                </a>
            </form>
        </div>

        <table class="table text-white table-striped text-center mt-2">
            <tbody>
                <div>
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="familia">Familia</label>
                            <select class="form-control" id="familia" name="familia">
                                <option value="">Elige una familia</option>
                                <?php foreach ($familias as $familia) : ?>
                                    <option value="<?php echo $familia ?>"><?php echo $familia ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <hr></hr>
                        <button type="submit" class="btn btn-primary">Buscar</button>
                    </form>
                </div>
                <div class="mt-4">
                    <form action="" method="POST">
                        <table class="table table-striped text-white">
                            <thead>
                                <tr>
                                    <th>Nombre corto</th>
                                    <th>PVP</th>
                                    <th>Stock</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($productos as $producto) : ?>
                                    <tr>
                                        <td><?php echo $producto['nombre_corto'] ?></td>
                                        <td><?php echo $producto['pvp'] ?></td>
                                        <td><input type="checkbox" name="producto[]" value="<?php echo $producto['id'] ?>"></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <?php
                        //Si se ha seleccionado un producto, se mostrará el stock de los productos seleccionados en cada una de las tiendas en las que se encuentren.
                        if (isset($_POST['producto'])) {
                            $productos_seleccionados = $_POST['producto'];
                            $sql_stock = "SELECT producto, tienda, SUM(unidades) as stock FROM stocks WHERE producto IN (" . implode(',', $productos_seleccionados) . ") GROUP BY producto, tienda";
                            $sentencia_stock = $conexion->query($sql_stock);
                            $stock = $sentencia_stock->fetchAll(PDO::FETCH_ASSOC);
                        ?>
                            <table class="table table-striped text-white">
                                <thead>
                                    <tr>
                                        <th>Producto</th>
                                        <th>Tienda</th>
                                        <th>Stock</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($stock as $tienda) : ?>
                                        <tr>
                                            <td><?php echo $tienda['producto'] ?></td>
                                            <td><?php echo $tienda['tienda'] ?></td>
                                            <td><?php echo $tienda['stock'] ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        <?php } ?>
                        <form action="" method="POST">
                            <button type="submit" class="btn btn-primary">Stock</button>
                        </form>
                </div>
            </tbody>
        </table>
    </div>
</body>