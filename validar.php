<?php
$usuario=$_POST['user'];
$pass=$_POST['password'];

session_start();
$_SESSION['user'] = $usuario;

$conexion=mysqli_connect("localhost","root","","prueba");

$consulta="SELECT*FROM usuario where user='$usuario' and pass='$pass'";
$resultado=mysqli_query($conexion,$consulta);

$filas=mysqli_num_rows($resultado);

if($filas){
    header("location:contacto.html");
} else {
    ?>
    <?php
    include("iniciar-sesion.php");
    ?>
    <?php
}
mysqli_free_result($resultado);
mysqli_close($conexion);
?>
