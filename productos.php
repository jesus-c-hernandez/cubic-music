<!DOCTYPE html>
<html lang="en">

<?php
include "components/head.php";
require_once "conection/conexion.php";
?>

<body>

    <?php
    include "components/headerAux.php";
    ?>

    <div class="container text-center">
        <div class="row">
            <div class="col">
                <h1 class="f-white">
                    Productos
                </h1>
            </div>
        </div>
    </div>

    <div class="container my-5">
        <div class="row justify-content-center">
            <?php
            $stmt = Conexion::conectar()->prepare("SELECT * FROM producto");
            $stmt->execute();
            $respuesta = $stmt->fetchAll();
            $stmt = null;
            foreach ($respuesta as $key => $value) {
                echo '
                <div class="col-3 m-2">
                    <div class="card" style="width: 26rem;">
                        <img src="' . $value["prod_img"] . '" class="card-img-top" alt="...">
                        <div class="card-body text-center">
                            <h5 class="card-title">' . $value["prod_nombre"] . '</h5>
                            <p class="card-text">
                            ' . $value["prod_desc"] . '
                            </p>
                            <p class="card-text">
                            $ ' . $value["prod_precio"] . '
                            </p>
                            <a href="#" class="btn btn-dark">Agreagr al carrito</a>
                        </div>
                    </div>
                </div>
                ';
            }
            ?>
        </div>
    </div>

    <?php
    include "components/footer.php";
    ?>

</body>

</html>