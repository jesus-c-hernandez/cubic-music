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
    $login = null;
    $pwd = null;
    $type = null;
    $active = null;

    $agregar = null;
    $editar = null;
    $eliminar = null;

    // Comprobar que los campos fueron llenados

    if (isset($_POST['usr_id'])) {
        $id = $_POST['usr_id'];
    }

    if (isset($_POST['usr_login'])) {
        $login = $_POST['usr_login'];
    }

    if (isset($_POST['usr_pwd'])) {
        $pwd = $_POST['usr_pwd'];
    }

    if (isset($_POST['usr_type'])) {
        $type = $_POST['usr_type'];
    }

    if (isset($_POST['usr_active'])) {
        $active = $_POST['usr_active'];
    }

    // Comprobar que accion se quiere realizar

    if (isset($_POST['usr_agregar'])) {
        $agregar = $_POST['usr_agregar'];
    }

    if (isset($_POST['usr_editar'])) {
        $editar = $_POST['usr_editar'];
    }

    if (isset($_POST['usr_eliminar'])) {
        $eliminar = $_POST['usr_eliminar'];
    }

    // Si no se lleno ningun campo entonces no se realiza nada

    if ($id == null && $login == null && $pwd == null && $type == null && $active == null) {
    ?>
        <div class="seccion contenedor contenido-centrado f-white centrar-texto">
            <h2>Error al capturar campos</h2>
            <a href="inicio-admin.php" class="boton boton-azul">Regresar</a>
        </div>
        <?php
    } else {

        $con = mysqli_connect("localhost", "root", "", "cubicmusic");

        if ($agregar != null) {
            // Accion de agregar un usuario

            // Comprobar que se esten llenando los campos para realizar la consulta
            if ($login == null || $pwd == null || $type == null || $active == null) {
                ?>
                <div class="seccion contenedor contenido-centrado f-white centrar-texto">
                    <h2>Debe llenar todos los campos</h2>
                    <a href="inicio-admin.php" class="boton boton-azul">Regresar</a>
                </div>
                <?php
                return;
            }

            // Ejecutar sentencia para agregar a la tabla
            $sql = "INSERT INTO usuario(usr_login, usr_pwd, usr_type, usr_active) VALUES ('$login', '$pwd', '$type', '$active')";

            // Si la consulta se ejecuta con exito entonces se manda mensaje
            if ($con->query($sql) == true) {
                ?>
                <div class="seccion contenedor contenido-centrado f-white centrar-texto">
                    <h2>Usuario Agregado con Exito</h2>
                    <a href="inicio-admin.php" class="boton boton-azul">Regresar</a>
                </div>
                <?php
            } else {
                // Si la consulta falla entonces se muestra el error
                die("Error al Agregar al Usuario" . $con->error);
                ?>
                <a href="inicio-admin.php" class="boton boton-azul">Regresar</a>
                <?php
            }
        }

        if ($editar != null) {
            // Accion de agregar un usuario

            // Comprobar que se esten llenando los campos para realizar la consulta
            if ($id == null || $login == null || $pwd == null || $type == null || $active == null) {
                ?>
                <div class="seccion contenedor contenido-centrado f-white centrar-texto">
                    <h2>Debe llenar todos los campos</h2>
                    <a href="inicio-admin.php" class="boton boton-azul">Regresar</a>
                </div>
                <?php
                return;
            }

            // Ejecutar sentencia para editar la tabla
            $sql = "UPDATE usuario SET usr_login = '$login', usr_pwd = '$pwd', usr_type = b'$type', usr_active = b'$active' WHERE usr_id = '$id'";

            // Si la consulta se ejecuta con exito entonces se manda mensaje
            if ($con->query($sql) == true) {
                ?>
                <div class="seccion contenedor contenido-centrado f-white centrar-texto">
                    <h2>Usuario Editado con Exito</h2>
                    <a href="inicio-admin.php" class="boton boton-azul">Regresar</a>
                </div>
                <?php
            } else {
                // Si la consulta falla entonces se muestra el error
                die("Error al Editar al Usuario" . $con->error);
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
                    <h2>Debe indicar el ID de Usuario</h2>
                    <a href="inicio-admin.php" class="boton boton-azul">Regresar</a>
                </div>
                <?php
                return;
            }

            // Ejecutar sentencia para eliminar de la tabla
            $sql = "DELETE FROM usuario WHERE usr_id = '$id'";

            // Si la consulta se ejecuta con exito entonces se manda mensaje
            if ($con->query($sql) == true) {
                ?>
                <div class="seccion contenedor contenido-centrado f-white centrar-texto">
                    <h2>Usuario Eliminado con Exito</h2>
                    <a href="inicio-admin.php" class="boton boton-azul">Regresar</a>
                </div>
                <?php
            } else {
                // Si la consulta falla entonces se muestra el error
                die("Error al Eliminar al Usuario" . $con->error);
                ?>
                <a href="inicio-admin.php" class="boton boton-azul">Regresar</a>
                <?php
            }
        }
    }
    ?>
</body>

</html>