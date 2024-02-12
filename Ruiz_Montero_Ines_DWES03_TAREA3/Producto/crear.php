<?php

include_once '../Conexion/conexion.php';

if ($_POST) {
    # code...
    $cod = $_POST['id'];
    $nombre = $_POST['nombre'];
    $nombre_corto = $_POST['nombre_corto'];
    $descripcion = $_POST['descripcion'];
    $pvp = $_POST['pvp'];
    $familia = $_POST['familia'];
  
    $consulta_sql = 'INSERT INTO productos(id, nombre, nombre_corto, descripcion, pvp, familia) values (?,?,?,?,?,?)';
    $sentencia = $conexion->prepare($consulta_sql);
    $sentencia->execute(array($cod, $nombre, $nombre_corto, $descripcion, $pvp, $familia));

    $conexion = null;
    $sentencia = null;

    header('Location: ../index.php');
}
