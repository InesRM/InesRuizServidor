<?php 
include_once '../Conexion/conexion.php';

if ($_POST) {
    # code...
    //El código de la tienda debe ser único...
    $consulta_sql = 'SELECT * FROM tiendas WHERE id = ?';
    $sentencia_sql = $conexion->prepare($consulta_sql);
    $sentencia_sql->execute(array($_POST['id']));
    $tienda = $sentencia_sql->fetch(PDO::FETCH_ASSOC);
    // $conexion = null;
    // $sentencia_sql = null;
  
    if ($tienda) {
        header('Location: ./error.php');
    } else {
        crearTienda();
    }
} else {
    header('Location: ./crear.php');
}



function crearTienda() {
    include_once '../Conexion/conexion.php';
    $conexion = new PDO('mysql:host=localhost;dbname=febreroe', 'InesRM', 'Learning1771');
    if ($_POST) {
        # code...
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $telefono = $_POST['tlf'];
       
        $consulta_sql = 'INSERT INTO tiendas (id, nombre, tlf) values (?,?,?)';
        $sentencia = $conexion->prepare($consulta_sql);
        $sentencia->execute(array($id,$nombre, $telefono));
    
        $conexion = null;
        $sentencia = null;
    
        header('Location: ../index.php');
    }
}

?>
//             <hr>

