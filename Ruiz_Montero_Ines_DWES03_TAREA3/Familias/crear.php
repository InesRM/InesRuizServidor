<?php
function crearFamilia()
{
    include_once '../Conexion/conexion.php';
    $conexion = new PDO('mysql:host=localhost;dbname=proyecto', 'InesRM', 'Learning1771');
    if ($_POST) {
        # code...
        $cod = $_POST['cod'];
        $nombre = $_POST['nombre'];

        $consulta_sql = 'INSERT INTO familias (cod, nombre) values (?,?)';
        $sentencia = $conexion->prepare($consulta_sql);
        $sentencia->execute(array($cod, $nombre));

        $conexion = null;
        $sentencia = null;

        header('Location: ../index.php');
    }
}


?>
//
<hr>

<?php
if ($_POST) {
    include_once '../Conexion/conexion.php';
    # code...
    //El código de la familia debe ser único...
    $consulta_sql = 'SELECT * FROM familias WHERE cod = ?';
    $sentencia_sql = $conexion->prepare($consulta_sql);
    $sentencia_sql->execute(array($_POST['cod']));
    $familia = $sentencia_sql->fetch(PDO::FETCH_ASSOC);
    $conexion = null;
    $sentencia_sql = null;

    if ($familia) {
        header('Location: ./error.php');
    } else {
        crearFamilia();
    }
} else {
    header('Location: ./crear.php');
}
?>