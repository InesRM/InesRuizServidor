<?php include_once '../Layout/header.php' ?>
<?php include_once '../Conexion/conexion.php';

if ($_GET) {
    # code...
    //obtengo mi producto via el metodo get - paso los datos a los input
    $id = $_GET['id'];
    $consulta_sql = 'SELECT * FROM tiendas WHERE id=?';
    $sentencia_sql = $conexion->prepare($consulta_sql);
    $sentencia_sql->execute(array($id));
    $tienda = $sentencia_sql->fetch();
}


if ($_POST) {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $tlf = $_POST['tlf'];

    $consulta_sql_editar = 'UPDATE tiendas  SET nombre=?,tlf=? WHERE id=?';
    $sentencia_sql_editar = $conexion->prepare($consulta_sql_editar);
    $sentencia_sql_editar->execute(array($nombre, $tlf, $id));

    $conexion = null;
    $sentencia_sql_editar = null;
    header('Location: ./listado.php');
} else {
    echo "Error al editar";
}
?>

<div class="container my-5">
    <h2>Editar Tienda N° : <?= $id ?> </h2>
    <hr>

    <div class="row">
        <div class="col-md-6">
            <form method="POST" action="update.php">
                <div class="form-group">
                    <label for="nombre">Nombre de tienda</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required value="<?= $tienda['nombre'] ?>">
                    <input type="hidden" name="id" id="id" value="<?= $tienda['id'] ?>"> 
                </div>
                <div class="form-group">  
                    <label for="tlf">Teléfono</label>
                    <input type="text" class="form-control" id="tlf" name="tlf" required value="<?= $tienda['tlf'] ?>">
                    <input type="hidden" name="id" id="id" value="<?= $tienda['id'] ?>">
                </div>
                <button type="submit" class="btn btn-primary">Guardar</button>
                <a href="./listado.php">
                    <button type="button" class="btn btn-danger">Cancelar</button>
                </a>
            </form>
        </div>
    </div>
</div>

