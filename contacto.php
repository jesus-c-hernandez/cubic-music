<!DOCTYPE html>
<html lang="en">

<?php
    include "components/head.php";
?>
<body>

    <?php
        include "components/headerAux.php";
    ?>

    <main class="contenedor seccion contenido-centrado">

        <h2 class="fw-300 f-white centrar-texto">Llena el Formulario de Contacto</h2>

        <form class="contacto" action="">

            <fieldset class="field">

                <legend>Información de Contacto</legend>

                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" placeholder="Nombre del Representante">

                <label for="email">E-mail:</label>
                <input type="email" id="email" placeholder="Correo del Representante" required>

                <label for="telefono">Teléfono:</label>
                <input type="tel" id="telefono" placeholder="Tel. del Representante" required>

            </fieldset>

            <fieldset class="field">

                <legend>Información Sobre El Plan</legend>

                <label for="opciones">Plan que desea contratar:</label>
                <select id="opciones">
                    <option value="" disabled selected>--Seleccione--</option>
                    <option value="">Brilla por tu cuenta</option>
                    <option value="">En grupo es mejor</option>
                    <option value="">Instrumenta tus sueños</option>
                </select>

                <label for="cantidad">Integrantes:</label>
                <input type="number" min="1">

            </fieldset>

            <fieldset class="field">

                <legend>Especificaciones del servicio</legend>

                <p>¿Desea rentar instrumentos?:</p>

                <div class="forma-contacto">
                    <label for="si">Sí</label>
                    <input type="radio" name="contacto" value="si" id="si">

                    <label for="no">No</label>
                    <input type="radio" name="contacto" value="no" id="no">
                </div>

                <label for="cantidad">Número de canciones que desea producir:</label>
                <input type="number" min="1">

                <p>Fecha en la que desea usar las instalaciones de grabación:</p>

                <label for="fecha">Fecha:</label>
                <input type="date" id="fecha">

            </fieldset>

            <input type="submit" value="Enviar" class="boton boton-azul">

        </form>

    </main>

    <?php
        include "components/footer.php";
    ?>

</body>

</html>