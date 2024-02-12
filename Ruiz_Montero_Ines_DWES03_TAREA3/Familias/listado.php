<?php include_once '../Conexion/conexion.php' ?>
<?php include_once '../Layout/header.php' ?>


<body>
    <h3 class="text-center mt-2 font-weight-bold">Gestión de familias</h3>

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
                $consulta_sql = 'SELECT * FROM familias';
                $sentencia_sql = $conexion->prepare($consulta_sql);
                $sentencia_sql->execute();
                $lista_familias = $sentencia_sql->fetchAll(PDO::FETCH_ASSOC);
                $conexion = null;
                $sentencia_sql = null;
                foreach ($lista_familias as $familia) {
                ?>
                    <tr>
                        <td class="font-weight-normal"><?= $familia['cod'] ?></td>
                        <td class="font-weight-normal"><?= $familia['nombre'] ?></td>
                        <td class="font-weight-normal">
                        <td>
                            <a href="../familias/update.php?cod=<?= $familia['cod'] ?>">
                                <button class="btn btn-primary" type="button" name="editar">Editar</button>
                            </a>
                        </td>
                        <td>
                            <a href="../familias/detalle.php?cod=<?= $familia['cod'] ?>">
                                <button class="btn btn-info" type="button" name="detalle">Detalle</button>
                            </a>
                        </td>
                        <td>
                            <a href="../familias/borrar.php?cod=<?= $familia['cod'] ?>">
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
   
</body>

</html>
