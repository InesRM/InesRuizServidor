<?php 
include_once '../Conexion/conexion.php';

if ($_POST) {
    # code...
    //El código de la tienda debe ser único...
    $consulta_sql = 'SELECT * FROM tiendas WHERE cod = ?';
    $sentencia_sql = $conexion->prepare($consulta_sql);
    $sentencia_sql->execute(array($_POST['cod']));
    $tienda = $sentencia_sql->fetch(PDO::FETCH_ASSOC);
    $conexion = null;
    $sentencia_sql = null;
  
    if ($tienda) {
        header('Location: ./error.php');
    } else {
        crearTienda();
    }
} else {
    header('Location: ./crear.php');
}

?>

<?php
function crearTienda() {
    include_once '../Conexion/conexion.php';
    $conexion = new PDO('mysql:host=localhost;dbname=proyecto', 'InesRM', 'Learning1771');
    if ($_POST) {
        # code...
        $cod = $_POST['cod'];
        $nombre = $_POST['nombre'];
        $telefono = $_POST['tlf'];
       
        $consulta_sql = 'INSERT INTO tiendas (cod, nombre,tlf) values (?,?,?)';
        $sentencia = $conexion->prepare($consulta_sql);
        $sentencia->execute(array($cod, $nombre, $telefono));
    
        $conexion = null;
        $sentencia = null;
    
        header('Location: ../index.php');
    }
}

?>
//             <hr>

