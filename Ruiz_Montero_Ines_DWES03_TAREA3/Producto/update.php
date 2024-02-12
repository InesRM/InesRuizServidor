<?php include_once '../Layout/header.php' ?>
<?php include_once '../Conexion/conexion.php';

if ($_GET) {
    # ide...
    //obtengo mi producto via el metodo get - paso los datos a los input
    $id = $_GET['id'];
    $consulta_sql = 'SELECT * FROM productos WHERE id=?';
    $sentencia_sql = $conexion->prepare($consulta_sql);
    $sentencia_sql->execute(array($id));
    $producto = $sentencia_sql->fetch();
}

if ($_POST) {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $nombre_corto = $_POST['nombre_corto'];
    $descripcion =$_POST['descripcion'];
    $pvp = $_POST['pvp'];
    $familia = $_POST['familia'];

    $consulta_sql_editar = 'UPDATE productos  SET nombre=?,descripcion=?,nombre_corto=?,descripcion=?,pvp=?,familia=? WHERE id=?';
    $sentencia_sql_editar = $conexion->prepare($consulta_sql_editar);
    $sentencia_sql_editar->execute(array($nombre,$descripcion,$nombre_corto,$descripcion,$pvp,$familia,$id));

    $conexion =null;
    $sentencia_sql_editar=null;
    header('Location: ./listado.php');
}
?>

    <div class="container my-5">
        <h2>Editar Producto N° : <?= $id ?> </h2>
        <hr>

        <div class="row">
            <div class="col-md-6">
                <form method="POST" action="update.php">
                    <div class="form-group">
                        <label for="nombre">Nombre de producto</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required value="<?= $producto['nombre'] ?>">
                        <input type="hidden" name="id" id="id" value="<?=$producto['id']?>">
                    </div>
                    <div class="form-group">
                        <label for="nombre_corto">Nombre Corto</label>
                        <input type="text" class="form-control" id="nombre_corto" name="nombre_corto" required value="<?= $producto['nombre_corto'] ?>">
                        <input type="hidden" name="id" id="id" value="<?=$producto['id']?>">
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripcion de producto</label>
                        <input type="text" class="form-control" id="descripcion" name="descripcion"  required value="<?= $producto['descripcion'] ?>">
                    </div>
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

                echo '<select class="form-control" id="familia" name="familia" required>';
                foreach ($familias as $familia) {
                    echo '<option value="' . $familia['id'] . '">' . $familia['nombre'] . '</option>';     
                }
                echo '</select>';
                ?>
                </div>
                    <hr></hr>
                    <button type="submit" class="btn btn-primary">Editar Producto</button>
                </form>
                <hr></hr>
                <div>
                    <a href="./listado.php" class="btn btn-warning">Cancelar</a>
                </div>
            </div>

        </div>

    </div>
