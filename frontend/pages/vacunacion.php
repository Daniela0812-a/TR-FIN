
<?php
// Conexión a la base de datos
require __DIR__ . '/../../backend/config/database.php';

// Leer término de búsqueda
$buscar = $_GET['buscar_mascota'] ?? '';
$buscar = trim($buscar);

$resultados = [];
$historial_error = '';

if ($buscar !== '') {
    if (!$conn) {
        $historial_error = 'No hay conexión con la base de datos.';
    } else {
        // Consulta de citas de Vacunación/Desparasitación para esa mascota
        $sql = "
            SELECT nombre_mascota,
                   nombre_dueño,
                   especie,
                   servicio,
                   fecha_cita,
                   hora_cita,
                   motivo_cita
            FROM citas
            WHERE nombre_mascota ILIKE $1
              AND servicio ILIKE 'Vacunación%'
            ORDER BY fecha_cita DESC, hora_cita DESC
        ";

        $params = ['%' . $buscar . '%'];

        $res = @pg_query_params($conn, $sql, $params);

        if ($res) {
            while ($fila = pg_fetch_assoc($res)) {
                $resultados[] = $fila;
            }
        } else {
            $historial_error = 'Error al consultar la tabla "citas". Revisa nombres de columnas y tabla.';
        }
    }
}
?>

<main>
    <section class="vac-layout">
        <div class="contenedor">
            <h1 class="vac-titulo">Esquemas de Vacunación y Desparasitación</h1>

            <p class="vac-descripcion">
                Mantener al día las vacunas y la desparasitación de tu mascota es una de las formas
                más importantes de proteger su salud. Aquí encontrarás una guía general de los planes
                que suele manejar la clínica según la etapa de vida y los tipos de parásitos más comunes.
            </p>

            <h2 class="vac-subtitulo">Información general</h2>
            <p class="vac-descripcion">
                Los planes pueden ajustarse según la especie, el peso, el estilo de vida y las
                indicaciones del médico veterinario. Esta información es orientativa y no reemplaza
                una consulta profesional.
            </p>

            <!-- Tarjetas doble columna: VACUNACIÓN / DESPARASITACIÓN -->
            <div class="vac-grid">
                <!-- VACUNACIÓN -->
                <article class="vac-card vac-card--left">
                    <header class="vac-card__header vac-card__header--vac">
                        <div class="vac-card__icono">
                            💉
                        </div>
                        <h3>Vacunación</h3>
                    </header>

                    <div class="vac-card__contenido">
                        <h4>Planes por edad</h4>
                        <ul class="vac-lista">
                            <li><strong>Cachorros:</strong> Esquemas iniciados entre las 6 y 8 semanas.</li>
                            <li><strong>Adultos:</strong> Refuerzos anuales o según criterio médico.</li>
                        </ul>

                        <h4>Vacunas esenciales (ejemplo)</h4>
                        <div class="vac-tabla-wrap">
                            <table class="vac-tabla">
                                <thead>
                                    <tr>
                                        <th>Vacuna</th>
                                        <th>Cachorros</th>
                                        <th>Adultos</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Parvovirus / Moquillo</td>
                                        <td>Serie inicial + refuerzo</td>
                                        <td>Refuerzo anual</td>
                                    </tr>
                                    <tr>
                                        <td>Polivalente</td>
                                        <td>2–3 dosis</td>
                                        <td>Refuerzo anual</td>
                                    </tr>
                                    <tr>
                                        <td>Rabia</td>
                                        <td>Desde los 3 meses</td>
                                        <td>Según normativa local</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <p class="vac-nota">
                            La frecuencia y combinación de vacunas puede variar de acuerdo a los
                            protocolos de la clínica y a las recomendaciones oficiales de salud
                            animal.
                        </p>
                    </div>
                </article>

                <!-- DESPARASITACIÓN -->
                <article class="vac-card vac-card--right">
                    <header class="vac-card__header vac-card__header--desp">
                        <div class="vac-card__icono">
                            🐾
                        </div>
                        <h3>Desparasitación</h3>
                    </header>

                    <div class="vac-card__contenido">
                        <h4>Tipos de parásitos frecuentes</h4>
                        <ul class="vac-lista">
                            <li>Parásitos internos: lombrices intestinales, tenias, etc.</li>
                            <li>Parásitos externos: pulgas, garrapatas y ácaros.</li>
                        </ul>

                        <h4>Métodos de prevención</h4>
                        <ul class="vac-lista">
                            <li>Tabletas o jarabes orales.</li>
                            <li>Pipetas tópicas y collares antiparasitarios.</li>
                            <li>Baños medicados y control ambiental.</li>
                        </ul>

                        <h4>Frecuencia orientativa</h4>
                        <div class="vac-tabla-wrap">
                            <table class="vac-tabla">
                                <thead>
                                    <tr>
                                        <th>Etapa</th>
                                        <th>Internos</th>
                                        <th>Externos</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Cachorros</td>
                                        <td>Cada 15–30 días</td>
                                        <td>Según riesgo</td>
                                    </tr>
                                    <tr>
                                        <td>Adultos</td>
                                        <td>Cada 3–6 meses</td>
                                        <td>Mensual / según producto</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <p class="vac-nota">
                            El plan exacto de desparasitación debe definirse en consulta, teniendo en
                            cuenta el entorno donde vive la mascota y su contacto con otros animales.
                        </p>
                    </div>
                </article>
            </div>

            <!-- Historial y botón -->
            <section class="vac-historial">
                <h2 class="vac-subtitulo">Historial de tu mascota</h2>
                <p class="vac-descripcion">
                    Escribe el nombre de tu mascota para consultar las citas registradas de
                    <strong>Vacunación y desparasitación</strong> en la clínica.
                </p>

                <!-- Buscador conectado a la BD -->
                <form class="vac-buscador" method="get" action="index.php">
                    <!-- Para que el router cargue de nuevo esta misma página -->
                    <input type="hidden" name="page" value="vacunacion">

                    <input
                        type="text"
                        name="buscar_mascota"
                        placeholder="Ej. Firulais"
                        value="<?= htmlspecialchars($buscar) ?>"
                    >
                    <button type="submit">Buscar</button>
                </form>

                <?php if ($buscar !== ''): ?>
                    <p class="vac-descripcion">
                        Resultados para: <strong><?= htmlspecialchars($buscar) ?></strong>
                    </p>
                <?php endif; ?>

                <?php if ($historial_error): ?>
                    <p class="vac-descripcion" style="color:#b00020;">
                        <?= htmlspecialchars($historial_error) ?>
                    </p>
                <?php elseif ($buscar !== '' && count($resultados) === 0): ?>
                    <p class="vac-descripcion">
                        No se encontraron citas de vacunación/desparasitación para ese nombre de mascota.
                    </p>
                <?php elseif (count($resultados) > 0): ?>
                    <div class="vac-historial-tabla">
                        <table class="vac-tabla vac-tabla--historial">
                            <thead>
                                <tr>
                                    <th>Mascota</th>
                                    <th>Especie</th>
                                    <th>Dueño</th>
                                    <th>Fecha</th>
                                    <th>Hora</th>
                                    <th>Motivo / Nota</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($resultados as $r): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($r['nombre_mascota']) ?></td>
                                        <td><?= htmlspecialchars($r['especie'] ?? '') ?></td>
                                        <td><?= htmlspecialchars($r['nombre_dueño'] ?? '') ?></td>
                                        <td><?= htmlspecialchars($r['fecha_cita'] ?? '') ?></td>
                                        <td><?= htmlspecialchars($r['hora_cita'] ?? '') ?></td>
                                        <td><?= nl2br(htmlspecialchars($r['motivo_cita'] ?? '')) ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php endif; ?>

                <div class="vac-cta">
                    <a href="index.php?page=citas" class="vac-btn">
                        Reservar cita de Vacunación / Desparasitación
                    </a>
                </div>
            </section>
        </div>
    </section>
</main>
