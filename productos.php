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
                            <a href="productos.php?nom='.$value["prod_nombre"].'&precio='.$value["prod_precio"].'" class="btn btn-dark" >
                                Agregar al carrito
                            </a>
                        </div>
                    </div>
                </div>
                ';
            }
            ?>
            <?php
                function alCarrito (  ) {
                    $usr_login = 'cliente1';
                    $prod_nom = $_GET["nom"];
                    $prod_cant = 1;
                    $total = $_GET["precio"];
                    $tabla = 'carrito';
                    $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (usr_login, prod_nom, prod_cant, total) 
                                                            VALUES ( :usr_login, :prod_nom, :prod_cant, :total ) ");
                    $stmt->bindParam(":usr_login", $usr_login, PDO::PARAM_STR);
                    $stmt->bindParam(":prod_nom", $prod_nom, PDO::PARAM_STR);
                    $stmt->bindParam(":prod_cant", $prod_cant, PDO::PARAM_INT);
                    $stmt->bindParam(":total", $total, PDO::PARAM_INT);
                    if ( $stmt->execute() ) {
                        echo '<script>
                                swal.fire({
                                icon:"success",
                                title: "Producto agregado",
                                showConfirmButton: true,
                                confirmButtonText: "Cerrar",
                                closeOnConfirm: false 
                                }).then((result)=>{
                                if(result.value){
                                    window.location="productos.php";
                                }
                            });
                            </script>';
                    } else {
                        echo '<script>
                                swal.fire({
                                icon:"error",
                                title: "Producto NO agregado",
                                showConfirmButton: true,
                                confirmButtonText: "Cerrar",
                                closeOnConfirm: false 
                                }).then((result)=>{
                                if(result.value){
                                    window.location="productos.php";
                                }
                            });
                            </script>';
                    }
                    $stmt = null;
                }
                if (
                    isset($_GET["nom"])
                ) {
                    alCarrito();
                }
            ?>
        </div>
    </div>

    <?php
    include "components/footer.php";
    ?>

</body>

</html>