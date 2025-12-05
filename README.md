# TR-FIN
Trabajo final

# TR-FIN
# TR-FIN – Hospital Veterinario 🐶🐱

Proyecto web académico en **PHP + PostgreSQL** para la gestión básica de un hospital veterinario:
- Agendamiento de citas.
- Recepción de mensajes de contacto.
- Registro de hospitalizaciones.

---

## 1. Tablas principales (PostgreSQL)

### Tabla `citas`

    CREATE TABLE public.citas (
        id              SERIAL PRIMARY KEY,
        nombre_dueño    VARCHAR(100) NOT NULL,
        telefono        VARCHAR(50)  NOT NULL,
        correo          VARCHAR(100),
        nombre_mascota  VARCHAR(100) NOT NULL,
        especie         VARCHAR(50)  NOT NULL,
        servicio        VARCHAR(100) NOT NULL,
        fecha_cita      DATE         NOT NULL,
        hora_cita       TIME         NOT NULL,
        motivo_cita     TEXT
    );

### Tabla `mensajes_contacto`

    CREATE TABLE public.mensajes_contacto (
        id         SERIAL PRIMARY KEY,
        nombre     VARCHAR(100) NOT NULL,
        correo     VARCHAR(100) NOT NULL,
        mensaje    TEXT         NOT NULL,
        creado_en  TIMESTAMP    DEFAULT now()
    );

### Tabla `hospitalizacion`

    CREATE TABLE public.hospitalizacion (
        id                      SERIAL PRIMARY KEY,
        nombre_mascota          VARCHAR(100) NOT NULL,
        raza                    VARCHAR(100),
        peso                    NUMERIC(5,2),
        tipo_operacion          VARCHAR(150) NOT NULL,
        motivo_hospitalizacion  TEXT         NOT NULL,
        creado_en               TIMESTAMP    DEFAULT now()
    );

---

## 2. Descripción general

TR-FIN es una página web que simula el sitio de un hospital veterinario.  
Incluye:

- Página de **inicio** con presentación del hospital.
- Sección de **servicios** y **equipo de trabajo**.
- Formulario para **agendar citas**.
- Formulario de **contacto**.
- Formulario de **hospitalización** para registrar casos especiales.

Cada formulario guarda la información en su tabla correspondiente de PostgreSQL.

---

## 3. Tecnologías utilizadas

- **Backend:** PHP (programación estructurada).
- **Base de datos:** PostgreSQL.
- **Frontend:** HTML5, CSS3, JavaScript.
- **Apoyo visual:** Bootstrap (según versión del proyecto).

---

## 4. Estructura de carpetas (resumen)

- `public/`
  - `index.php` → Punto de entrada y enrutamiento con `?page=`.
- `frontend/`
  - `pages/` → Vistas (inicio, servicio, equipo, citas, contacto, hospitalizacion, etc.).
  - `partials/` → `navbar.php`, `footer.php`.
  - `assets/css/` → `style.css`.
  - `assets/js/` → `main.js`.
- `backend/`
  - `config/` → `database.php` (conexión a PostgreSQL).
  - `api/` → `guardar_cita.php`, `guardar_contacto.php`, `guardar_hospitalizacion.php`.
- `docs/`
  - `guia_tr_fin.md` → Guía paso a paso más detallada.

---

## 5. Puesta en marcha rápida

1. Crear la base de datos **Hospital** y las **tres tablas** indicadas arriba.
2. Configurar la conexión en `backend/config/database.php` (host, puerto, dbname, usuario y contraseña).
3. Copiar la carpeta del proyecto al directorio público de tu servidor PHP (por ejemplo `htdocs` o `www`) y abrir:

    http://localhost/TR-FIN/public/index.php

Para instrucciones detalladas, consultar `docs/guia_tr_fin.md`.

