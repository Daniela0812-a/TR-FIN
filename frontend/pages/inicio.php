<main>
    <!-- IMAGEN PRINCIPAL DEL HOSPITAL -->
    <section class="hero">
        <div class="hero__overlay"></div>
        <div class="contenedor hero__contenido">
            <div class="hero__texto">
                <span class="hero__badge">Cuidamos lo que más quieres</span>
                <h2>Hospital Patitas Felices</h2>
                <p>Atención profesional para perros, gatos y pequeños animales, las 24 horas del día.</p>
            </div>
        </div>
    </section>

    <!-- TARJETAS DE BENEFICIOS (CON IMÁGENES) -->
    <section class="beneficios">
        <div class="contenedor beneficios__grid">

            <!-- CONSULTA GENERAL -->
            <a href="index.php?page=consulta_general" class="beneficio-link">
                <article class="beneficio beneficio--clicable">
                    <div class="beneficio__icono">
                        <img src="../frontend/assets/img/consulta.png" alt="Consulta general">
                    </div>
                    <h3>CONSULTA GENERAL</h3>
                    <p>Revisiones completas, diagnóstico y seguimiento para tu mascota.</p>
                </article>
            </a>

            <!-- VACUNACIÓN Y DESPARASITACIÓN -->
            <a href="index.php?page=vacunacion" class="beneficio-link">
                <article class="beneficio beneficio--clicable">
                    <div class="beneficio__icono">
                        <img src="../frontend/assets/img/vacunacion.png" alt="Vacunación y desparasitación">
                    </div>
                    <h3>VACUNACIÓN Y DESPARASITACIÓN</h3>
                    <p>Esquemas de vacunas y desparasitación para prevenir enfermedades.</p>
                </article>
            </a>

            <!-- URGENCIAS -->
            <article class="beneficio beneficio--clicable" id="beneficio-urgencias">
                <div class="beneficio__icono">
                    <img src="../frontend/assets/img/urgencia.png" alt="Urgencias 24/7">
                </div>
                <h3>URGENCIAS</h3>
                <p>Atención inmediata en casos críticos, cualquier día y hora.</p>
            </article>

        </div>
    </section>

    <!-- SERVICIOS PRINCIPALES -->
    <section class="servicios">
        <div class="contenedor">
            <h2 class="servicios__titulo">Nuestros servicios principales</h2>
            <p class="servicios__subtitulo">
                Estos son algunos de los servicios que ofrecemos para acompañar cada etapa de la vida de tu mascota.
            </p>

            <div class="servicios__grid">
            <a href="index.php?page=cirugia" class="servicio-link">
                <article class="servicio servicio--clicable">
                    <div class="servicio__imagen">
                        <img src="../frontend/assets/img/cirugia.png" alt="Cirugía veterinaria">
                        <span class="servicio__etiqueta servicio__etiqueta--azul">QUIRÚRGICO</span>
                    </div>
                    <h3>Cirugía</h3>
                    <p>Quirófano equipado y áreas de hospitalización cómodas y seguras.</p>
                </article>
            </a>


            <a href="index.php?page=estetica" class="servicio-link">
                <article class="servicio servicio--clicable">
                    <div class="servicio__imagen">
                        <img src="../frontend/assets/img/estetica.png" alt="Estética y peluquería">
                        <span class="servicio__etiqueta servicio__etiqueta--morado">BIENESTAR</span>
                    </div>
                    <h3>Estética y peluquería</h3>
                    <p>Baño, corte y cuidado del pelaje para tu mascota.</p>
                </article>
            </a>
        </div>
            
        </div>
    </section>
</main>
