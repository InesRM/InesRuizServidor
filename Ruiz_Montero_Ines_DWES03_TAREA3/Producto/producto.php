<?php include_once '../Conexion/conexion.php'; ?>

<?php include_once '../Layout/header.php' ?>

<div class="container my-5">
    <h2>Crear Productos</h2>
    <hr>
    <div>
        <a href="../index.php" class="btn btn-info">Volver</a>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <form method="POST" action="./crear.php">
                <div class="form-group">
                    <label for="id">Identificador</label>
                    <input type="number" class="form-control" id="id" name="id" placeholder="Nº Identificador" required>
                </div>
                <div class="form-group">
                    <label for="nombre">Nombre de producto</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" required>
                </div>
                <div class="form-group">
                    <label for="nombre_corto">Nombre Corto</label>
                    <input type="text" class="form-control" id="nombre_corto" name="nombre_corto" placeholder="Nombre Corto" required>
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripcion de producto</label>
                    <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Descripción" required>
                </div>
                <div class="form-group">
                    <label for="pvp">Precio</label>
                    <input type="text" class="form-control" id="pvp" name="pvp" placeholder="Precio" required>
                </div>
                <br>
                <div>
                    <h5>Familia</h5>
                    <?php
                    // Creamos la consulta para obtener las familias y las pintamos en un select
                    $consulta_familia = 'SELECT * FROM familias';
                    $sentencia_familia = $conexion->prepare($consulta_familia);
                    $sentencia_familia->execute();
                    $familias = $sentencia_familia->fetchAll();
                    $conexion = null;
                    $sentencia_familia = null;

                    echo '<select class="form-control" cod="familia" name="familia" required>';
                    foreach ($familias as $familia) {
                        echo '<option value="' . $familia['cod'] . '">' . $familia['nombre'] . '</option>';
                    }
                    echo '</select>';
                    ?>
                </div>
                <hr>
                <div class="">
                    <button type="submit" class="btn btn-success">Agregar Producto</button>
                </div>
            </form>
            <hr>
            <hr>
            <div>
                <a href="./listado.php" class="btn btn-warning">Listado de productos</a>
            </div>
        </div>
    </div>

</div>

<script src="https://ide.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>