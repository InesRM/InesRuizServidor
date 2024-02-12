<?php include_once '../Conexion/conexion.php'; ?>

<?php include_once '../Layout/header.php' ?>

<div class="container my-5">
    <h2>Crear Familia</h2>
    <hr>
    <div>
        <a href="../index.php" class="btn btn-info">Volver</a>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <form method="POST" action="./crear.php">
                <div class="form-group">
                    <label for="cod">Código</label>
                    <input type="text" class="form-control" id="cod" name="cod" placeholder="CÓDIGO" required>
                </div>
                <div class="form-group">
                    <label for="nombre">Nombre de familia</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" required>
                </div>
                <hr>
                <div class="">
                    <button type="submit" class="btn btn-success">Agregar Familia</button>
                </div>
            </form>
            <hr>
            <hr>
        </div>
        <div>
            <a href="./listado.php" class="btn btn-warning">Listado de Familias</a>
        </div>

    </div>
</div>