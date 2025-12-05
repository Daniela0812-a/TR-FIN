<main class="servicios contacto-layout">
    <div class="contenedor">

        <h2 class="servicios__titulo">Contacto</h2>

        <!-- Bloque de información de contacto -->
        <section class="contacto-info">
            <div class="contacto-texto">
                <p>
                    Si deseas solicitar información, reservar servicios o resolver dudas,
                    puedes comunicarte con nosotros por los siguientes medios:
                </p>
                <p>
                    <strong>Dirección:</strong> Calle Mascotas 123, Barrio Central<br>
                    <strong>Teléfono:</strong> 555 987 654<br>
                    <strong>Correo:</strong> udenar@patitasfelices.com
                </p>
                <p class="contacto-horario">
                    <strong>Horario de atención:</strong> Lunes a sábado de 8:00 a.m. a 6:00 p.m.  
                    Urgencias disponibles las 24 horas.
                </p>
            </div>

            <div class="contacto-card">
                <h3>¿Necesitas ayuda rápida?</h3>
                <ul>
                    <li>Consultas sobre servicios y tarifas.</li>
                    <li>Orientación para agendar citas.</li>
                    <li>Dudas sobre vacunación o desparasitación.</li>
                </ul>
                <span class="contacto-pill">Te responderemos lo antes posible 🐾</span>
            </div>
        </section>

        <!-- Formulario de mensaje -->
        <section class="contacto-formulario">
            <h3 class="contacto-formulario__titulo">Envíanos un mensaje</h3>

            <form class="form-contacto" action="../backend/api/guardar_contacto.php" method="post">
                <label for="nombre">Nombre completo</label>
                <input type="text" id="nombre" name="nombre" required>

                <label for="correo">Correo electrónico</label>
                <input type="email" id="correo" name="correo" required>

                <label for="mensaje">Mensaje</label>
                <textarea id="mensaje" name="mensaje" rows="4" required></textarea>

                <button type="submit">Enviar mensaje</button>
            </form>
        </section>
    </div>
</main>
