// main.js - Clínica Veterinaria Patitas Felices

document.addEventListener("DOMContentLoaded", () => {
    // 1. MENSAJE PARA URGENCIAS CUANDO HACEN CLICK EN "Urgencias" DEL MENÚ
    const enlacesMenu = document.querySelectorAll(".nav a");

    enlacesMenu.forEach(enlace => {
        if (enlace.textContent.trim().toLowerCase() === "urgencias") {
            enlace.addEventListener("click", (evento) => {
                evento.preventDefault(); // evita recargar
                alert("Urgencias 24/7\nLlámanos al: 555 987 654\nDirección: Calle Mascotas 123.");
            });
        }
    });

    // 2. AL HACER CLICK EN UN SERVICIO, SE ACTUALIZA EL TEXTO PRINCIPAL
    const servicios = document.querySelectorAll(".servicio");
    const heroTexto = document.querySelector(".hero__texto");

    servicios.forEach(servicio => {
        servicio.addEventListener("click", () => {
            const nombreServicio = servicio.querySelector("h3").textContent;

            heroTexto.innerHTML = `
                <h2>Servicio seleccionado: ${nombreServicio}</h2>
                <p>
                    Para agendar una cita de <strong>${nombreServicio}</strong>,
                    comunícate con nosotros o acércate a la clínica.
                    Estaremos felices de atender a tu mascota.
                </p>
            `;

            window.scrollTo({
                top: 0,
                behavior: "smooth"
            });
        });
    });

    // 3. EFECTO DE SOMBRA EN EL HEADER AL HACER SCROLL
    const header = document.querySelector(".header");

    window.addEventListener("scroll", () => {
        if (window.scrollY > 10) {
            header.style.boxShadow = "0 3px 15px rgba(0,0,0,0.12)";
        } else {
            header.style.boxShadow = "0 2px 10px rgba(0,0,0,0.05)";
        }
    });
});
