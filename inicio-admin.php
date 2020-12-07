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
        include "components/headerAux.php";
    ?>

    <h1 class="centrar-texto fw-300 f-white">Bienvenido Administrador</h1>

    <?php
    $con = mysqli_connect("localhost", "root", "", "cubicmusic");
    ?>

    <section class="contenedor seccion-admin">

        <h2 class="centrar-texto f-white">Planes y Productos</h2>

        <table class="contenido-centrado centrar-texto f-white tabla">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Inventario</th>
                    <th>Producto Activo</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $sql = "SELECT * FROM `producto`";

                $ejecutar = mysqli_query($con, $sql);

                foreach ($ejecutar as $key => $value) {
                    $cont = 1;
                    echo '<tr>
            <td>' . $value["prod_id"] . '</td>
            <td>' . $value["prod_nombre"] . '</td>
            <td>' . $value["prod_precio"] . '</td>
            <td>' . $value["prod_inventario"] . '</td>
            <td>' . $value["prod_active"] . '</td>';
                }
                ?>
            </tbody>
        </table>

        <h3 class="centrar-texto f-white">Agregar, Editar o Eliminar Productos</h3>

        <form class="seccion contenedor contenido-centrado" action="accion-producto.php" method="post">

            <fieldset class="field">

                <label for="prod_id">ID de Producto:</label>
                <input type="number" id="prod_id" name="prod_id">

                <label for="prod_nombre">Nombre del Producto:</label>
                <input type="text" id="prod_nombre" name="prod_nombre">

                <label for="prod_precio">Precio:</label>
                <input type="number" id="prod_precio" name="prod_precio">

                <label for="prod_inventario">Inventario:</label>
                <input type="number" id="prod_inventario" name="prod_inventario">

                <label for="prod_active">Producto Activo:</label>
                <input type="number" id="prod_active" name="prod_active">

            </fieldset>

            <input type="submit" value="Agregar" id="prod_agregar" name="prod_agregar" class="boton boton-azul">
            <input type="submit" value="Editar" id="prod_editar" name="prod_editar" class="boton boton-azul">
            <input type="submit" value="Eliminar" id="prod_eliminar" name="prod_eliminar" class="boton boton-azul">

        </form>

    </section>

    <section class="contenedor seccion-admin">

        <h2 class="centrar-texto f-white">Usuarios</h2>

        <table class="contenido-centrado centrar-texto f-white tabla">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Login</th>
                    <th>Contraseña</th>
                    <th>Tipo de Usuario</th>
                    <th>Usuario Activo</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $sql = "SELECT * FROM `usuario`";

                $ejecutar = mysqli_query($con, $sql);

                foreach ($ejecutar as $key => $value) {
                    $cont = 1;
                    echo '<tr>
                    <td>' . $value["usr_id"] . '</td>
                    <td>' . $value["usr_login"] . '</td>
                    <td>' . $value["usr_pwd"] . '</td>
                    <td>' . $value["usr_type"] . '</td>
                    <td>' . $value["usr_active"] . '</td>';
                }
                ?>
            </tbody>
        </table>

        <h3 class="centrar-texto f-white">Agregar, Editar o Eliminar Usuarios</h3>

        <form class="seccion contenedor contenido-centrado" action="accion-usuario.php" method="post">

            <fieldset class="field">

                <label for="usr_id">ID de Usuario:</label>
                <input type="number" id="usr_id" name="usr_id">

                <label for="usr_login">Login de Usuario:</label>
                <input type="text" id="usr_login" name="usr_login">

                <label for="usr_pwd">Contraseña:</label>
                <input type="text" id="usr_pwd" name="usr_pwd">

                <label for="usr_type">Tipo de Usuario:</label>
                <input type="number" id="usr_type" name="usr_type">

                <label for="usr_active">Usuario Activo:</label>
                <input type="number" id="usr_active" name="usr_active">

            </fieldset>

            <input type="submit" value="Agregar" id="usr_agregar" name="usr_agregar" class="boton boton-azul">
            <input type="submit" value="Editar" id="usr_editar" name="usr_editar" class="boton boton-azul">
            <input type="submit" value="Eliminar" id="usr_eliminar" name="usr_eliminar" class="boton boton-azul">

        </form>

    </section>

    <section class="contenedor seccion-admin">

        <h2 class="centrar-texto f-white">Ventas Realizadas</h2>

        <table class="contenido-centrado centrar-texto f-white tabla">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Total de la Venta</th>
                    <th>Fecha</th>
                    <th>Realizada en Sesion</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $sql = "SELECT * FROM `venta`";

                $ejecutar = mysqli_query($con, $sql);

                foreach ($ejecutar as $key => $value) {
                    $cont = 1;
                    echo '<tr>
                    <td>' . $value["ven_id"] . '</td>
                    <td>' . $value["ven_total"] . '</td>
                    <td>' . $value["ven_fecha"] . '</td>
                    <td>' . $value["ses_id"] . '</td>';
                }
                ?>
            </tbody>
        </table>

    </section>

    <section class="contenedor seccion-admin">

        <h2 class="centrar-texto f-white">Sesiones</h2>

        <table class="contenido-centrado centrar-texto f-white tabla">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Inicio de Sesion</th>
                    <th>Fin de Sesion</th>
                    <th>Usuario Creador</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $sql = "SELECT * FROM `sesion`";

                $ejecutar = mysqli_query($con, $sql);

                foreach ($ejecutar as $key => $value) {
                    $cont = 1;
                    echo '<tr>
                    <td>' . $value["ses_id"] . '</td>
                    <td>' . $value["ses_inicio"] . '</td>
                    <td>' . $value["ses_fin"] . '</td>
                    <td>' . $value["usr_id"] . '</td>';
                }
                ?>
            </tbody>
        </table>

    </section>

    <?php
        include "components/footer.php";
    ?>

</body>

</html>