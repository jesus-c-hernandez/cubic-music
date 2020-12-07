<!DOCTYPE html>
<html lang="en">

<?php
    include "components/head.php";
?>

<?php
    require_once "conection/conexion.php";
    include "components/head.php";
?>

<body>

<?php
        include "components/headerAux.php";
    ?>
<div class="container" style="height: 60vh;">
    <h1 class="f-white text-center">
        Carrito
    </h1>
    <div class="bg-white text-center">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Total</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $usr_login = 'cliente1';
                    $total = 0;
                    $stmt = Conexion::conectar()->prepare("SELECT * FROM carrito WHERE usr_login = :$usr_login ");
                    $stmt->bindParam(":" . $usr_login, $usr_login, PDO::PARAM_STR);
                    $stmt->execute();
                    $respuesta = $stmt->fetchAll();
                    $stmt = null;

                    foreach( $respuesta as $key => $value ) {
                        echo '
                            <tr>
                                <td>'.$value['prod_nom'].'</td>
                                <td>'.$value['prod_cant'].'</td>
                                <td>'.$value['total'].'</td>
                            </tr>
                        ';
                        $total += $value['total'];
                    }
                    
                ?>
            </tbody>
        </table>
    </div>
    <div class="text-end">
    <?php
            echo '   
            <h1><span class="badge bg-secondary">Total=$'.$total.'</span></h1>
            ';
        ?>
    </div>
    <div class="text-center">
        <?php
            echo'
                <a href="carrito.php?total='.$total.'" class="boton boton-azul">Pagar</a>
            ';
            if ( isset($_GET["total"] ) ) {
                $tabla = 'venta';
                date_default_timezone_set('America/Mexico_City');
                $fecha = date('Y-m-d');
                $hora = date('H:i:s');
                $fechaActual = $fecha . ' ' . $hora;
                $ses_id = 1;
                $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla ( ven_total, ven_fecha, ses_id ) 
                                                        VALUES ( :total, :fechaActual, :ses_id ) ");
                $stmt->bindParam(":total", $total, PDO::PARAM_STR);
                $stmt->bindParam(":fechaActual", $fechaActual, PDO::PARAM_STR);
                $stmt->bindParam(":ses_id", $ses_id, PDO::PARAM_STR);
                if ( $stmt->execute() ) {
                        $usr_login = 'cliente1';
                        $stmt = null;
                        $stmt = Conexion::conectar()->prepare("SELECT * FROM carrito WHERE usr_login = :usr_login");
                        $stmt->bindParam(":usr_login", $usr_login, PDO::PARAM_STR);
                        $stmt->execute();
                        $respuesta = $stmt->fetchAll();
                        $stmt = null;
                        foreach ($respuesta as $key => $value) {
                            $prod_nombre = $value["prod_nom"];
                            $stmt = Conexion::conectar()->prepare("SELECT * FROM producto WHERE prod_nombre = :prod_nombre");
                            $stmt->bindParam(":prod_nombre", $prod_nombre, PDO::PARAM_STR);
                            $stmt->execute();
                            $answer = $stmt->fetch();
                            $stmt = null;
                            $inventario = $answer["prod_inventario"] - 1;
                            $stmt = Conexion::conectar()->prepare("UPDATE producto SET prod_inventario = :prod_inventario WHERE prod_nombre = :prod_nombre ");
                            $stmt->bindParam(":prod_nombre", $prod_nombre, PDO::PARAM_STR);
                            $stmt->bindParam(":prod_inventario", $inventario, PDO::PARAM_INT);
                            $stmt->execute();
                            $stmt = null;
                            var_dump( $inventario );
                        }
                        $stmt = Conexion::conectar()->prepare("DELETE FROM carrito WHERE usr_login = :$usr_login ");
                        $stmt->bindParam(":" . $usr_login, $usr_login, PDO::PARAM_STR);
                        $stmt->execute();
                        $stmt = null;
                        echo '<script>
                        swal.fire({
                        icon:"success",
                        title: "Compra exitosa",
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
                            title: "Error en la compra",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false 
                            }).then((result)=>{
                            if(result.value){
                                window.location="carrito.php";
                            }
                        });
                        </script>';
                    }
                }
            $stmt = null;
        ?>
    </div>
    
</div>
    
<?php
    include "components/footer.php";
?>

    
</body>
</html>