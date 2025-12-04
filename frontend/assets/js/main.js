// main.js - Clínica Veterinaria Patitas Felices
// En este archivo manejamos las pequeñas interacciones de la página:
// - Click en "Urgencias" del menú
// - Mensajes al hacer clic en algunos servicios
// - Sombra del menú al hacer scroll
// - Desaparecer los mensajes flotantes (toast) de éxito/error

// Esperamos a que todo el HTML esté cargado antes de trabajar con él
document.addEventListener("DOMContentLoaded", () => {

    // 1. MENÚ: cuando el usuario hace clic en "Urgencias" del menú superior
    //    mostramos un mensaje con el teléfono y la dirección.
    const enlacesMenu = document.querySelectorAll(".nav a"); // Todos los enlaces del menú

    enlacesMenu.forEach(enlace => {
        // Revisamos si el texto del enlace es "urgencias"
        if (enlace.textContent.trim().toLowerCase() === "urgencias") {
            enlace.addEventListener("click", (evento) => {
                // Prevenimos que el enlace recargue la página o cambie de URL
                evento.preventDefault();

                // Mostramos un mensaje emergente (alert)
                alert(
                    "Urgencias 24/7\n" +
                    "Teléfono: 555 987 654\n" +
                    "Dirección: Calle Mascotas 123."
                );
            });
        }
    });

    // 2. BENEFICIO DE URGENCIAS (LA TARJETA DE ARRIBA)
    //    Si la tarjeta de "URGENCIAS" tiene el id="beneficio-urgencias",
    //    al hacer clic mostramos un mensaje explicando que atendemos sin cita.
    const beneficioUrgencias = document.getElementById("beneficio-urgencias");
    if (beneficioUrgencias) {
        beneficioUrgencias.addEventListener("click", () => {
            alert(
                "En casos críticos atendemos sin cita previa.\n" +
                "Acércate directamente al hospital o comunícate a la línea de urgencias."
            );
        });
    }

    // 3. SERVICIOS PRINCIPALES
    //    Recorremos todas las tarjetas con clase .servicio
    //    y mostramos un mensaje SOLO en los servicios que nos interesan.
    const servicios = document.querySelectorAll(".servicio");

    servicios.forEach(servicio => {
        servicio.addEventListener("click", () => {
            // Buscamos el <h3> dentro de la tarjeta para saber de qué servicio se trata
            const titulo = servicio.querySelector("h3")
                ? servicio.querySelector("h3").textContent.trim().toLowerCase()
                : "";

            let mensaje = "";


            // Solo mostramos alerta si realmente hay un mensaje configurado
            if (mensaje !== "") {
                alert(mensaje);
            }
        });
    });

    // 4. SOMBRA EN EL HEADER CUANDO HACEMOS SCROLL
    //    Este efecto coloca una sombra al menú (header) cuando el usuario baja la página.
    const header = document.querySelector(".header");
    if (header) {
        window.addEventListener("scroll", () => {
            // Si hemos bajado más de 10 píxeles, activamos la sombra
            if (window.scrollY > 10) {
                header.style.boxShadow = "0 3px 15px rgba(0,0,0,0.12)";
            } else {
                // Si volvemos arriba, quitamos la sombra
                header.style.boxShadow = "none";
            }
        });
    }

    // 5. TOAST FLOTANTE (MENSAJES DE ÉXITO / ERROR EN CITA Y CONTACTO)
    //    Estos elementos los crea PHP con las clases .alerta-exito o .alerta-error.
    //    Aquí hacemos que se oculten automáticamente después de unos segundos.
    const alertas = document.querySelectorAll(".alerta-exito, .alerta-error");

    alertas.forEach((alerta) => {
        // Esperamos 4 segundos antes de empezar a ocultar la alerta
        setTimeout(() => {
            // Añadimos la clase que activa la animación de salida en CSS
            alerta.classList.add("alerta--oculta");

            // Después de la animación (0.3s aprox), la quitamos del DOM
            setTimeout(() => {
                if (alerta && alerta.parentNode) {
                    alerta.parentNode.removeChild(alerta);
                }
            }, 350);
        }, 4000);
    });
});
