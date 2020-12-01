<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="icon" href="img/logo-pequeño.png">
</head>

<body>

    <header class="site-header inicio-internas">

        <div class="contenedor contenido-header">

            <div class="barra">

                <a href="/">
                    <img src="img/logo.png" alt="Logotipo de Cubic Music">
                </a>

                <nav class="navegacion">
                    <a href="nosotros.html">Conócenos</a>
                    <a href="servicios.html">Servicios</a>
                    <a href="producciones.html">Producciones</a>
                    <a href="contacto.html">Contacto</a>
                </nav>

            </div>

        </div>

    </header>

    <main class="seccion contenedor contenido-centrado">

        <h1 class="f-white fw-300 centrar-texto">Bienvenido a la Tienda de Cubic Music</h1>

        <fieldset class="field">

            <label for="login">Nombre de Usuario (correo):</label>
            <input type="text" id="login" required>

            <label for="pass">Contraseña:</label>
            <input type="password" id="pass" required>

        </fieldset>

        <input type="submit" value="Iniciar Sesión" class="boton boton-azul">

    </main>

    <section class="seccion contenedor contenido-centrado">
        <div class="registrarse centrar-texto f-white">
            <h3>¿Aún no tienes una cuenta?</h3>
            <p>¡No esperes más! Sé parte de la comunidad</p>
            <a href="#" class="boton boton-azul">Registrarse</a>
        </div>
    </section>

    <footer class="">

        <div class="barra footer">

            <div>
                <a href="/">
                    <img src="img/logo.png" alt="Icono Cubic Music">
                </a>
            </div>

            <div class="info">

                <p>Redes:</p>

                <div class="redes">
                    <a href="#">
                        <img src="img/logotipo-facebook.png" alt="Logotipo de Facebook">
                    </a>
                    <a href="#">
                        <img src="img/logotipo-twitter.png" alt="Logotipo de Twitter">
                    </a>
                    <a href="#">
                        <img src="img/logotipo-instagram.jpg.png" alt="Logotipo de Instagram">
                    </a>
                </div>

                <p>Tel: 5511246879</p>
                <p>cubicmusic_contacto@gmail.com</p>
                <p>Calle de la Musica #40, Torreon, Coah. 27145</p>
            </div>

            <div>
                <p>Todos los derechos reservados &copy;</p>
            </div>

        </div>
    </footer>

</body>

</html>