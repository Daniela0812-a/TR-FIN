<main class="nutri-layout">
    <div class="contenedor">
        <!-- Encabezado tipo hero -->
        <section class="nutri-hero">
            <div class="nutri-hero__texto">
                <span class="nutri-chip">Bienestar y alimentación</span>
                <h1>Nutrición veterinaria</h1>
                <p>
                    Una buena alimentación es clave para que tu mascota tenga energía,
                    mantenga un peso saludable y prevenga muchas enfermedades.
                    Aquí encontrarás ejemplos generales de raciones según tamaño y edad.
                </p>
            </div>
            <div class="nutri-hero__ilustracion">
                <div class="nutri-hero__card">
                    <img src="../frontend/assets/img/nutricion.png" alt="Nutrición veterinaria">
                </div>
                <span class="nutri-hero__badge">Plan personalizado en consulta</span>
            </div>
        </section>

        <!-- Tabla 1: Perros -->
        <section class="nutri-section">
            <h2 class="nutri-titulo">Perros – Guía orientativa de alimento seco</h2>
            <p class="nutri-texto">
                Cantidades aproximadas por día para alimento concentrado de buena calidad.
                Siempre deben ajustarse según recomendación del médico veterinario.
            </p>

            <div class="nutri-tabla-wrap">
                <table class="nutri-tabla">
                    <thead>
                        <tr>
                            <th>Tamaño / raza</th>
                            <th>Cachorro</th>
                            <th>Adulto</th>
                            <th>Senior</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Mini / Pequeño (hasta 10 kg)</td>
                            <td>60 – 160 g</td>
                            <td>80 – 180 g</td>
                            <td>70 – 150 g</td>
                        </tr>
                        <tr>
                            <td>Mediano (10 – 25 kg)</td>
                            <td>160 – 280 g</td>
                            <td>180 – 320 g</td>
                            <td>160 – 280 g</td>
                        </tr>
                        <tr>
                            <td>Grande (más de 25 kg)</td>
                            <td>280 – 450 g</td>
                            <td>320 – 520 g</td>
                            <td>280 – 450 g</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>

        <!-- Tabla 2: Gatos -->
        <section class="nutri-section">
            <h2 class="nutri-titulo">Gatos – Guía orientativa de alimento seco</h2>
            <p class="nutri-texto">
                Los gatos necesitan alimento equilibrado en proteínas y grasas.
                Estas cantidades son por día y se pueden dividir en varias porciones.
            </p>

            <div class="nutri-tabla-wrap">
                <table class="nutri-tabla nutri-tabla--gatos">
                    <thead>
                        <tr>
                            <th>Tipo de gato</th>
                            <th>Cachorro</th>
                            <th>Adulto</th>
                            <th>Senior</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Razas pequeñas / casero</td>
                            <td>40 – 60 g</td>
                            <td>45 – 70 g</td>
                            <td>40 – 60 g</td>
                        </tr>
                        <tr>
                            <td>Razas medianas</td>
                            <td>60 – 80 g</td>
                            <td>70 – 90 g</td>
                            <td>60 – 80 g</td>
                        </tr>
                        <tr>
                            <td>Gato indoor con sobrepeso</td>
                            <td>—</td>
                            <td>50 – 70 g (controlado)</td>
                            <td>45 – 65 g (controlado)</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>

        <!-- Nota final + botón a citas -->
        <section class="nutri-section nutri-section--final">
            <p class="nutri-texto">
                Estas tablas son solo una guía general. El plan real se define en la
                consulta nutricional teniendo en cuenta raza, peso, actividad física
                y enfermedades preexistentes.
            </p>
            <div class="nutri-cta">
                <a href="index.php?page=citas" class="btn-primario">
                    Agendar cita de Nutrición
                </a>
            </div>
        </section>
    </div>
</main>
