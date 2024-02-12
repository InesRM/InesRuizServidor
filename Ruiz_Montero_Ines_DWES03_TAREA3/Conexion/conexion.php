<?php

try {
    //code...
    $usuario = 'InesRM';
    $contrasena = 'Learning1771';
    $link = 'mysql:host=localhost;dbname=febreroe';

    $conexion = new PDO($link,$usuario,$contrasena);

} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}
