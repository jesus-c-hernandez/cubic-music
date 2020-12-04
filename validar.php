<?php
$usuario = $_POST['user'];
$pass = $_POST['password'];

session_start();
$_SESSION['user'] = $usuario;

$conexion = mysqli_connect("localhost", "root", "", "cubicmusic");

$consulta = "SELECT*FROM usuario where usr_login='$usuario' and usr_pwd='$pass'";
$resultado = mysqli_query($conexion, $consulta);

$filas = mysqli_num_rows($resultado);

if ($filas) {
    $consulta = "SELECT usr_type FROM usuario where usr_login='$usuario' and usr_pwd='$pass'";
    $resultado = mysqli_query($conexion, $consulta);
    $tipo;
    foreach($resultado as $key=>$value){
        $cont=1;
        $tipo = $value["usr_type"];
    }
    if($tipo == 1) {
        header("location:inicio-admin.php");
    } else {
        header("location:inicio-cliente.php");
    }
    
} else {
    include("iniciar-sesion.php");
}
mysqli_free_result($resultado);
mysqli_close($conexion);
