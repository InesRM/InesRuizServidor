<?php include_once '../Conexion/conexion.php' ?>
<?php include_once '../Layout/header.php' ?>

<body>
    <h3 class="text-center mt-2 font-weight-bold">Gestión de Tiendas</h3>

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
                    <th class="font-weight-normal" scope="col">Código</th>
                    <th class="font-weight-normal" scope="col">Nombre</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $consulta_sql = 'SELECT * FROM tiendas';
                $sentencia_sql = $conexion->prepare($consulta_sql);
                $sentencia_sql->execute();
                $lista_tiendas = $sentencia_sql->fetchAll(PDO::FETCH_ASSOC);
                $conexion = null;
                $sentencia_sql = null;
                foreach ($lista_tiendas as $tienda) {
                ?>
                    <tr>
                        <td class="font-weight-normal"><?= $tienda['cod'] ?></td>
                        <td class="font-weight-normal"><?= $tienda['nombre'] ?></td>
                        <td class="font-weight-normal">
                        <td>
                            <a href="../Tiendas/update.php?cod=<?= $tienda['cod'] ?>">
                                <button class="btn btn-primary" type="button" name="editar">Editar</button>
                            </a>
                        </td>
                        <td>
                            <a href="../Tiendas/detalle.php?cod=<?= $tienda['cod'] ?>">
                                <button class="btn btn-info" type="button" name="detalle">Detalle</button>
                            </a>
                        </td>
                        <td>
                            <a href="../Tiendas/borrar.php?cod=<?= $tienda['cod'] ?>">
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
    <!-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> -->
</body>

</html>


