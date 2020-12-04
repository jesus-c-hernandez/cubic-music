<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>

    <?php

    // Inicializar variables de los campos
    // Inicializarlas en null, y si el campo se lleno entonces se le da valor
    // Lo mismo con los botones, se inicializan en null, si se les da click entonces se les da un valor

    $id = null;
    $nombre = null;
    $precio = null;
    $inventario = null;
    $active = null;

    $agregar = null;
    $editar = null;
    $eliminar = null;

    // Comprobar que los campos fueron llenados

    if (isset($_POST['prod_id'])) {
        $id = $_POST['prod_id'];
    }

    if (isset($_POST['prod_nombre'])) {
        $nombre = $_POST['prod_nombre'];
    }

    if (isset($_POST['prod_precio'])) {
        $precio = $_POST['prod_precio'];
    }

    if (isset($_POST['prod_inventario'])) {
        $inventario = $_POST['prod_inventario'];
    }

    if (isset($_POST['prod_active'])) {
        $active = $_POST['prod_active'];
    }

    // Comprobar que accion se quiere realizar

    if (isset($_POST['prod_agregar'])) {
        $agregar = $_POST['prod_agregar'];
    }

    if (isset($_POST['prod_editar'])) {
        $editar = $_POST['prod_editar'];
    }

    if (isset($_POST['prod_eliminar'])) {
        $eliminar = $_POST['prod_eliminar'];
    }

    // Si no se lleno ningun campo entonces no se realiza nada

    if ($id == null && $nombre == null && $precio == null && $inventario == null && $active == null) {
    ?>
        <div class="seccion contenedor contenido-centrado f-white centrar-texto">
            <h2>Error al capturar campos</h2>
            <a href="inicio-admin.php" class="boton boton-azul">Regresar</a>
        </div>
        <?php
    } else {

        $con = mysqli_connect("localhost", "root", "", "cubicmusic");

        if ($agregar != null) {
            // Accion de agregar un producto

            // Comprobar que se esten llenando los campos para realizar la consulta
            if ($nombre == null || $precio == null || $inventario == null || $active == null) {
                ?>
                <div class="seccion contenedor contenido-centrado f-white centrar-texto">
                    <h2>Debe llenar todos los campos</h2>
                    <a href="inicio-admin.php" class="boton boton-azul">Regresar</a>
                </div>
                <?php
                return;
            }

            $obtenerSesion = "SELECT MAX(ses_id) FROM sesion";
            $resultado = mysqli_query($con, $obtenerSesion);
            $ses_id = 1;

            // $ses_id = $con->query($obtenerSesion, 1);

            // foreach($resultado as $key=>$value){
            //     $cont=1;
            //     $ses_id = $value;
            // }

            // Ejecutar sentencia para agregar a la tabla
            $sql = "INSERT INTO producto(prod_nombre, prod_precio, prod_inventario, prod_active, ses_id) VALUES ('$nombre', '$precio', '$inventario', '$active', '$ses_id')";

            // Si la consulta se ejecuta con exito entonces se manda mensaje
            if ($con->query($sql) == true) {
                ?>
                <div class="seccion contenedor contenido-centrado f-white centrar-texto">
                    <h2>Producto Agregado con Exito</h2>
                    <a href="inicio-admin.php" class="boton boton-azul">Regresar</a>
                </div>
                <?php
            } else {
                // Si la consulta falla entonces se muestra el error
                die("Error al Agregar el Producto" . $con->error);
                ?>
                <a href="inicio-admin.php" class="boton boton-azul">Regresar</a>
                <?php
            }
        }

        if ($editar != null) {
            // Accion de editar un producto

            // Comprobar que se esten llenando los campos para realizar la consulta
            if ($id == null || $nombre == null || $precio == null || $inventario == null || $active == null) {
                ?>
                <div class="seccion contenedor contenido-centrado f-white centrar-texto">
                    <h2>Debe llenar todos los campos</h2>
                    <a href="inicio-admin.php" class="boton boton-azul">Regresar</a>
                </div>
                <?php
                return;
            }

            // Ejecutar sentencia para editar la tabla
            $sql = "UPDATE producto SET prod_nombre = '$nombre', prod_precio = '$precio', prod_inventario = '$inventario', prod_active = b'$active' WHERE prod_id = '$id'";

            // Si la consulta se ejecuta con exito entonces se manda mensaje
            if ($con->query($sql) == true) {
                ?>
                <div class="seccion contenedor contenido-centrado f-white centrar-texto">
                    <h2>Producto Editado con Exito</h2>
                    <a href="inicio-admin.php" class="boton boton-azul">Regresar</a>
                </div>
                <?php
            } else {
                // Si la consulta falla entonces se muestra el error
                die("Error al Editar el Producto" . $con->error);
                ?>
                <a href="inicio-admin.php" class="boton boton-azul">Regresar</a>
                <?php
            }
        }

        if ($eliminar != null) {
            // Accion de eliminar un usuario

            // Comprobar que se esten llenando los campos para realizar la consulta
            if ($id == null) {
                ?>
                <div class="seccion contenedor contenido-centrado f-white centrar-texto">
                    <h2>Debe indicar el ID del Producto</h2>
                    <a href="inicio-admin.php" class="boton boton-azul">Regresar</a>
                </div>
                <?php
                return;
            }

            // Ejecutar sentencia para eliminar de la tabla
            $sql = "DELETE FROM producto WHERE prod_id = '$id'";

            // Si la consulta se ejecuta con exito entonces se manda mensaje
            if ($con->query($sql) == true) {
                ?>
                <div class="seccion contenedor contenido-centrado f-white centrar-texto">
                    <h2>Producto Eliminado con Exito</h2>
                    <a href="inicio-admin.php" class="boton boton-azul">Regresar</a>
                </div>
                <?php
            } else {
                // Si la consulta falla entonces se muestra el error
                die("Error al Eliminar el Producto" . $con->error);
                ?>
                <a href="inicio-admin.php" class="boton boton-azul">Regresar</a>
                <?php
            }
        }
    }
    ?>
</body>

</html>