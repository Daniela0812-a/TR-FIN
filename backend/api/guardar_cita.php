<?php
// ---------------------------------------------------------------------
// 1. Conectar a la base de datos
// ---------------------------------------------------------------------
// Con require incluimos el archivo donde ya está creada la conexión $conn
// (__DIR__ es la carpeta actual: backend/api/)
require __DIR__ . '/../config/database.php';

// ---------------------------------------------------------------------
// 2. Verificar que el formulario llegó por POST
// ---------------------------------------------------------------------
// Si alguien intenta entrar directamente escribiendo la URL en el navegador
// (sin enviar el formulario), lo devolvemos a la página de "Citas".
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../../public/index.php?page=citas');
    exit; // Siempre salir después de un header
}

// ---------------------------------------------------------------------
// 3. Recibir los datos que vienen del formulario
// ---------------------------------------------------------------------
// El operador ?? '' sirve para evitar errores si alguna posición no existe
// y en ese caso le pone una cadena vacía.
$nombre_dueño   = $_POST['nombre_dueño']   ?? '';
$telefono       = $_POST['telefono']       ?? '';
$correo         = $_POST['correo']         ?? '';
$nombre_mascota = $_POST['nombre_mascota'] ?? '';
$especie        = $_POST['especie']        ?? '';
$servicio       = $_POST['servicio']       ?? '';
$fecha_cita     = $_POST['fecha_cita']     ?? '';
$hora_cita      = $_POST['hora_cita']      ?? '';
$motivo_cita    = $_POST['motivo_cita']    ?? '';

// ---------------------------------------------------------------------
// 4. Validación básica (campos obligatorios)
// ---------------------------------------------------------------------
// Aquí revisamos que los campos importantes NO vengan vacíos.
// Si falta alguno, redirigimos a la página de citas con un mensaje de error.
if (
    $nombre_dueño   === '' ||
    $telefono       === '' ||
    $nombre_mascota === '' ||
    $especie        === '' ||
    $servicio       === '' ||
    $fecha_cita     === '' ||
    $hora_cita      === ''
) {
    // ?error=1 lo usamos en la vista para mostrar el mensaje rojo
    header('Location: ../../public/index.php?page=citas&error=1');
    exit;
}

// ---------------------------------------------------------------------
// 5. Crear la consulta SQL para insertar la cita
// ---------------------------------------------------------------------
// Usamos parámetros ($1, $2, ... $9) para evitar problemas de inyección SQL.
// La tabla se llama "public.citas" y las columnas deben existir en la BD.
$sql = "
    INSERT INTO public.citas (
        nombre_dueño,
        telefono,
        correo,
        nombre_mascota,
        especie,
        servicio,
        fecha_cita,
        hora_cita,
        motivo_cita
    ) VALUES (
        $1, $2, $3, $4, $5, $6, $7, $8, $9
    )
";

// ---------------------------------------------------------------------
// 6. Ejecutar el INSERT en PostgreSQL
// ---------------------------------------------------------------------
// pg_query_params recibe:
//  - la conexión ($conn)
//  - la consulta con los $1, $2, ...
//  - un arreglo con los valores en el mismo orden.
$result = pg_query_params($conn, $sql, [
    $nombre_dueño,
    $telefono,
    $correo,
    $nombre_mascota,
    $especie,
    $servicio,
    $fecha_cita,
    $hora_cita,
    $motivo_cita
]);

// Si algo falla al ejecutar el INSERT, detenemos el script y mostramos el error
if (!$result) {
    die('Error al guardar la cita: ' . pg_last_error($conn));
}

// ---------------------------------------------------------------------
// 7. Si todo salió bien, redirigir a la página de citas con mensaje de éxito
// ---------------------------------------------------------------------
// ?ok=1 lo usamos en la vista para mostrar el mensaje flotante de "Cita enviada".
header('Location: ../../public/index.php?page=citas&ok=1');
exit;
