<!DOCTYPE html>
<html lang="en">

<?php
include "components/head.php";
?>

<body>

    <?php
    require_once "conection/conexion.php";
    include "components/headerAux.php";
    ?>

    <form class="seccion contenedor contenido-centrado text-center" method="post" enctype="multipart/form-data">

        <h1 class="f-white fw-300 centrar-texto">Bienvenido a la Tienda de Cubic Music</h1>

        <fieldset class="field">

            <label for="login">Nombre de Usuario (correo):</label>
            <input type="text" id="login" required name="user">

            <label for="pass">Contraseña:</label>
            <input type="password" id="pass" required name="password">

        </fieldset>

        <input type="submit" value="Iniciar Sesión" class="boton boton-azul">

        <?php
        if (isset($_POST["user"]) && isset($_POST["password"])) {
            $usr_login = $_POST["user"];
            $usr_pwd = $_POST["password"];
            $stmt = Conexion::conectar()->prepare("SELECT * FROM usuario WHERE usr_login = :$usr_login ");
            $stmt->bindParam(":" . $usr_login, $usr_login, PDO::PARAM_STR);
            $stmt->execute();
            $respuesta = $stmt->fetch();
            $stmt = null;
            

            if (
                $respuesta["usr_login"] == $_POST["user"] &&
                //$respuesta["usuario_password"] == $encriptar
                $respuesta["usr_pwd"] == $_POST["password"]
            ) {
                $_SESSION['user'] = $respuesta["usr_login"];
                $_SESSION['type'] = $respuesta["usr_type"];
                if ($respuesta["usr_type"] == 1) {
                    echo '<script>
                                    window.location="inicio-admin.php";
                                </script>';
                } else {
                    echo '<script>
                                    window.location="productos.php";
                                </script>';
                }
            }
        }
        ?>
    </form>

    <main class="seccion contenedor contenido-centrado">

        <section class="seccion contenedor contenido-centrado">
            <div class="registrarse centrar-texto f-white">
                <h3>¿Aún no tienes una cuenta?</h3>
                <p>¡No esperes más! Sé parte de la comunidad</p>
                <a href="#" class="boton boton-azul">Registrarse</a>
            </div>
        </section>

    </main>

    <?php
    include "components/footer.php";
    ?>

</body>

</html>