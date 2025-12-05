<?php
// ---------------------------------------------------------------------
// 1. Conexión a la base de datos
// ---------------------------------------------------------------------
// Reutilizamos el mismo archivo de conexión que usas para las citas.
// Allí debe crearse la variable $conn con la conexión a PostgreSQL.
require __DIR__ . '/../config/database.php';

// ---------------------------------------------------------------------
// 2. Aceptar solo peticiones por POST
// ---------------------------------------------------------------------
// Si alguien entra escribiendo la URL directamente (GET),
// lo devolvemos a la página de contacto.
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../../public/index.php?page=contacto');
    exit;
}

// ---------------------------------------------------------------------
// 3. Recibir los datos del formulario
// ---------------------------------------------------------------------
// trim() elimina espacios al inicio y al final (evita cosas como "  Juan  ").
// El operador ?? '' evita errores si algún campo no viene en el POST.
$nombre  = trim($_POST['nombre']  ?? '');
$correo  = trim($_POST['correo']  ?? '');
$mensaje = trim($_POST['mensaje'] ?? '');

// ---------------------------------------------------------------------
// 4. Validación básica
// ---------------------------------------------------------------------
// Verificamos que los tres campos estén llenos.
// Si falta algo, regresamos a contacto con un indicador de error.
if ($nombre === '' || $correo === '' || $mensaje === '') {
    // En la vista de contacto, puedes leer ?errorContacto=1
    // para mostrar un mensaje de "Faltan datos".
    header('Location: ../../public/index.php?page=contacto&errorContacto=1');
    exit;
}

// ---------------------------------------------------------------------
// 5. Insertar el mensaje en la base de datos
// ---------------------------------------------------------------------
// La tabla "mensajes_contacto" debe existir en PostgreSQL con las columnas:
//  id (serial), nombre (text/varchar), correo (text/varchar), mensaje (text).
// Usamos parámetros ($1, $2, $3) para evitar inyección SQL.
$sql = "INSERT INTO mensajes_contacto (nombre, correo, mensaje)
        VALUES ($1, $2, $3)";

// pg_query_params ejecuta la consulta con los valores en el orden correcto.
$result = pg_query_params($conn, $sql, [$nombre, $correo, $mensaje]);

// ---------------------------------------------------------------------
// 6. Redirigir con mensaje de éxito o error
// ---------------------------------------------------------------------
// Si el INSERT salió bien, mandamos okContacto=1 para mostrar mensaje verde.
// Si hubo problema, mandamos errorContacto=1 para mostrar mensaje de error.
if ($result) {
    header('Location: ../../public/index.php?page=contacto&okContacto=1');
} else {
    header('Location: ../../public/index.php?page=contacto&errorContacto=1');
}

exit;
