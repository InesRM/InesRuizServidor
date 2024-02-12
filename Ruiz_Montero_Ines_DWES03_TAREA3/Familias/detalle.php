<?php include_once '../Conexion/conexion.php' ?>

<?php include_once '../Layout/header.php' ?>

<body>
    <h3 class="text-center mt-2 font-weight-bold">Detalle familia </h3>

    <div class="container w-75 mt-4">
        <div class="card text-white bg-dark mb-3" style="max-width: 70rem;">

            <?php
            $codigo = $_GET['cod'];
            $codigo = (int)$codigo; //casteo a entero porque no reconoce el cod como un string
            $detalle = "SELECT nombre from familias where cod=$codigo";
            $sentencia_sql = $conexion->prepare($detalle);
            $sentencia_sql->execute();
            $familia = $sentencia_sql->fetch();
            ?>
            <div class="card-header">Detalle del familia</div>
            <?php
            echo "<div class='card-body'>";
            echo "
            <h5 class='card-title'>Nombre: " . $familia["nombre"] . "</h5>         
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