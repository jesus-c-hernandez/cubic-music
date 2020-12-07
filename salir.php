<?php
    unset($_SESSION["user"]);
    unset($_SESSION["type"]);
    session_destroy();
    echo '<script>
    window.location="iniciar-sesion.php";
    </script>';
?>