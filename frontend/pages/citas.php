<section class="seccion seccion-citas">
    <div class="contenedor">
        <h1>Agendamiento de cita </h1>
        <p>
            Diligencia el siguiente formulario para solicitar una cita para tu mascota.
        </p>

    <?php if (isset($_GET['ok']) && $_GET['ok'] == '1'): ?>
    <div class="alerta alerta-exito" id="alerta-exito">
        <span class="alerta-icono">✔</span>
        <span>¡Tu solicitud de cita fue enviada correctamente! Pronto nos comunicaremos contigo.</span>
    </div>
<?php endif; ?>

<?php if (isset($_GET['error']) && $_GET['error'] == '1'): ?>
    <div class="alerta alerta-error" id="alerta-error">
        <span class="alerta-icono">!</span>
        <span>Faltan datos obligatorios. Por favor, revisa el formulario.</span>
    </div>
<?php endif; ?>


        <form class="form-cita" method="post" action="../backend/api/guardar_cita.php">
            <!-- Datos del propietario -->
            <div class="form-grupo">
                <label for="nombre_dueño">Nombre del propietario</label>
                <input type="text" id="nombre_dueño" name="nombre_dueño" required>
            </div>

            <div class="form-grupo">
                <label for="telefono">Teléfono de contacto</label>
                <input type="text" id="telefono" name="telefono" required>
            </div>

            <div class="form-grupo">
                <label for="correo">Correo electrónico</label>
                <input type="email" id="correo" name="correo">
            </div>

            <!-- Datos de la mascota -->
            <div class="form-grupo">
                <label for="nombre_mascota">Nombre de la mascota</label>
                <input type="text" id="nombre_mascota" name="nombre_mascota" required>
            </div>

            <div class="form-grupo">
                <label for="especie">Especie</label>
                <select id="especie" name="especie" required>
                    <option value="">Selecciona una opción</option>
                    <option value="Perro">Perro</option>
                    <option value="Gato">Gato</option>
                    <option value="Otra">Haster</option>
                    <option value="Otra">Loro</option>
                    <option value="Otra">Conejo</option>
                    <option value="Otra">Roedores</option>
                    <option value="Otra">Reptiles</option>
                    <option value="Otra">Otras Especies</option>
                </select>
            </div>

            
            <div class="form-grupo">
                <label for="servicio">Servicio</label>
                <select id="servicio" name="servicio" required>
                    <option value="">Selecciona un servicio</option>
                    <option value="Consulta general">Consulta general</option>
                    <option value="Vacunación">Vacunación</option>
                    <option value="Urgencias">Urgencias</option>
                    <option value="Hospitalización">Hospitalización</option>
                    <option value="Cirugía">Cirugía</option>
                    <option value="Cirugía">Estética</option>
                    <option value="Cirugía">Toma de exámenes</option>
                    <option value="Cirugía">Nutricionista</option>
                </select>
            </div>

            <div class="form-grupo">
                <label for="fecha_cita">Fecha</label>
                <input type="date" id="fecha_cita" name="fecha_cita" required>
                <small>Selecciona la fecha en la que te gustaría ser atendido.</small>
            </div>

            <div class="form-grupo">
                <label for="hora_cita">Hora</label>
                <select id="hora_cita" name="hora_cita" required>
                    <option value="">Selecciona la hora</option>
                    <option value="08:00">08:00 a.m.</option>
                    <option value="09:00">09:00 a.m.</option>
                    <option value="10:00">10:00 a.m.</option>
                    <option value="11:00">11:00 a.m.</option>
                    <option value="14:00">02:00 p.m.</option>
                    <option value="15:00">03:00 p.m.</option>
                    <option value="16:00">04:00 p.m.</option>
                </select>
                <small>El hospital  hospital verificara si ese horario esta disponible.</small>
            </div>

            <!-- Comentarios -->
            <div class="form-grupo">
                <label for="mensaje">Motivo por el cual solicita la cita </label>
                <textarea id="mensaje" name="motivo_cita" rows="4"></textarea>
            </div>

            <button type="submit" class="btn-primario">Enviar solicitud</button>
        </form>
    </div>
</section>
