<!DOCTYPE html>
<html lang="en">
<?php
    include "components/head.php";
?>
<body>

    <?php
        include "components/headerAux.php";
    ?>

    <form class="seccion contenedor contenido-centrado" method="post">

            <fieldset class="field">

                <label for="usr_login">Login de Usuario:</label>
                <input type="text" id="usr_login" name="usuario">

                <label for="usr_pwd">Contraseña:</label>
                <input type="password" id="usr_pwd" name="contraseña">

            </fieldset>

            <input type="submit" value="Confirmar" id="usr_agregar" name="usr_agregar" class="boton boton-azul">

            <?php
                $con = mysqli_connect("localhost", "root", "", "cubicmusic");

                    if ( isset($_POST["usuario"]) && isset($_POST["contraseña"]) ){
                        $login = $_POST["usuario"];
                        $pwd = $_POST["contraseña"];
            
                        // Ejecutar sentencia para agregar a la tabla
                        $sql = "INSERT INTO usuario(usr_login, usr_pwd, usr_type, usr_active) VALUES ('$login', '$pwd', b'0', b'1' )";
            
                        // Si la consulta se ejecuta con exito entonces se manda mensaje
                        if ($con->query($sql) ) {
                            echo '<script>
                            swal.fire({
                            icon:"success",
                            title: "Bienvenido",
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
                            title: "No es bienvenido",
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
                    }
            ?>

        </form>

<?php
        include "components/footer.php";
    ?>

    
</body>
</html>