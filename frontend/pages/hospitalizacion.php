<main class="seccion seccion-citas">
    <div class="contenedor">
        <h1>Registro de hospitalización</h1>
        <p>
            Aquí el personal del hospital puede registrar a las mascotas que
            están hospitalizadas, junto con la operación realizada y el motivo.
        </p>

        <?php if (isset($_GET['okHosp']) && $_GET['okHosp'] == '1'): ?>
            <div class="alerta alerta-exito">
                <span class="alerta-icono">✔</span>
                <span>¡El registro de hospitalización se guardó correctamente!</span>
            </div>
        <?php endif; ?>

        <?php if (isset($_GET['errorHosp']) && $_GET['errorHosp'] == '1'): ?>
            <div class="alerta alerta-error">
                <span class="alerta-icono">!</span>
                <span>Faltan datos obligatorios. Revisa el formulario.</span>
            </div>
        <?php endif; ?>

        <!-- Formulario de hospitalización -->
        <form class="form-cita" method="post" action="../backend/api/guardar_hospitalizacion.php">
            <!-- Nombre de la mascota -->
            <div class="form-grupo">
                <label for="nombre_mascota">Nombre de la mascota</label>
                <input type="text" id="nombre_mascota" name="nombre_mascota" required>
            </div>

            <!-- Raza -->
            <div class="form-grupo">
                <label for="raza">Raza</label>
                <input type="text" id="raza" name="raza">
            </div>

            <!-- Peso -->
            <div class="form-grupo">
                <label for="peso">Peso (kg)</label>
                <input type="number" step="0.01" id="peso" name="peso" placeholder="Ej. 12.50">
            </div>

            <!-- Tipo de operación -->
            <div class="form-grupo">
                <label for="tipo_operacion">Tipo de operación</label>
                <input type="text" id="tipo_operacion" name="tipo_operacion" required
                        placeholder="Ej. Cirugía de rodilla, extracción de tumor, etc.">
            </div>

            <!-- Motivo de hospitalización -->
            <div class="form-grupo">
                <label for="motivo_hospitalizacion">¿Por qué está hospitalizado?</label>
                <textarea id="motivo_hospitalizacion" name="motivo_hospitalizacion"
                            rows="4" required></textarea>
            </div>

            <button type="submit" class="btn-primario">Guardar hospitalización</button>
        </form>
    </div>
</main>

