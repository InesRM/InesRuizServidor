<?php include_once '../Conexion/conexion.php' ?>

<?php include_once '../Layout/header.php' ?>

<body>
    <h3 class="text-center mt-2 font-weight-bold">Detalle de la Tienda </h3>

    <div class="container w-75 mt-4">
        <div class="card text-white bg-dark mb-3" style="max-width: 70rem;">

            <?php
            $id = $_GET['id'];
            $detalle = "SELECT nombre, tlf from tiendas where id=$id";    
            $sentencia_sql = $conexion->prepare($detalle);
            $sentencia_sql->execute();
            $tienda = $sentencia_sql->fetch();
            ?>
            <div class="card-header">Detalle de la Tienda</div>
            <?php
            echo "<div class='card-body'>";
            echo "
            <h5 class='card-title'>Nombre: ".$tienda["nombre"]."</h5>
            <h5 class='card-title'>Teléfono: ".$tienda["tlf"]."</h5>
            </div>";
            ?>
        </div>

    </div>
    <div class="col text-center">
        <a href="./listado.php">
            <button class="btn btn-warning text-left" type="button" name="listar">Volver</button>
        </a>

    </div>
</body>

</html>