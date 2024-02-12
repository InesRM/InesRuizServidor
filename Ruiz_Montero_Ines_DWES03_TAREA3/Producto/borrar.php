<?php 

include_once '../Conexion/conexion.php';

if ($_GET) {
    # code...
    $id =  $_GET['cod'];

    $consulta_sql = 'DELETE FROM productos where cod=?';
    $sentencia_sql = $conexion->prepare($consulta_sql);
    $sentencia_sql->execute(array($id));

    $conexion=null;
    $sentencia_sql=null;
    header('Location: ./listado.php');
}