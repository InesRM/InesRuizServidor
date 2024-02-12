<?php include_once '../Layout/header.php' ?>
<?php include_once '../Conexion/conexion.php';

if ($_GET) {
    # code...
    //obtengo mi producto via el metodo get - paso los datos a los input
    $id = $_GET['cod'];
    $consulta_sql = 'SELECT * FROM familias WHERE cod=?';
    $sentencia_sql = $conexion->prepare($consulta_sql);
    $sentencia_sql->execute(array($id));
    $familia = $sentencia_sql->fetch();
}


if ($_POST) {
    $id = $_POST['cod'];
    $nombre = $_POST['nombre'];
    

    $consulta_sql_editar = 'UPDATE familias  SET nombre=? WHERE cod=?';
    $sentencia_sql_editar = $conexion->prepare($consulta_sql_editar);
    $sentencia_sql_editar->execute(array($nombre, $id));

    $conexion = null;
    $sentencia_sql_editar = null;
    header('Location: ./listado.php');
} else {
    echo "Error al editar";
}
?>

<div class="container my-5">
    <h2>Editar familia</h2>
    <hr>

    <div class="row">
        <div class="col-md-6">
            <form method="POST" action="update.php">
                <div class="form-group">
                    <label for="nombre">Nombre de familia</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required value="<?= $familia['nombre'] ?>">
                    <input type="hidden" name="cod" id="cod" value="<?= $familia['cod'] ?>"> 
                </div>
                <button type="submit" class="btn btn-primary">Guardar</button>
                <a href="./listado.php">
                    <button type="button" class="btn btn-danger">Cancelar</button>
                </a>
            </form>
        </div>
    </div>
</div>

