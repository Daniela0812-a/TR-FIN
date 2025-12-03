<?php


// Conectamos la base de datos
require __DIR__ . '/../config/database.php';

// Nos aseguramos de que viene por POST 
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    // Si entran directo por la URL, los mandamos a la página de citas
    header('Location: ../../public/index.php?page=citas');
    exit;
}

// Aquí se recibe datos del formulario
$nombre_dueño   = $_POST['nombre_dueño']   ?? '';
$telefono       = $_POST['telefono']       ?? '';
$correo         = $_POST['correo']         ?? '';
$nombre_mascota = $_POST['nombre_mascota'] ?? '';
$especie        = $_POST['especie']        ?? '';
$servicio       = $_POST['servicio']       ?? '';
$fecha_cita     = $_POST['fecha_cita']     ?? '';
$hora_cita      = $_POST['hora_cita']      ?? '';
$motivo_cita        = $_POST['motivo_cita']        ?? '';

// La validación básica 
if (
    $nombre_dueño   === '' ||
    $telefono       === '' ||
    $nombre_mascota === '' ||
    $especie        === '' ||
    $servicio       === '' ||
    $fecha_cita     === '' ||
    $hora_cita      === ''
) {
    // Si falta algo importante, regresamos a citas con un mensaje de error
    header('Location: ../../public/index.php?page=citas&error=1');
    exit;
}

// Aqui se arma el insert
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

// Metodo para ejecutar el INSERT
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

if (!$result) {
    // Si algo sale mal, muestra mensaje de error
    die('Error al guardar la cita: ' . pg_last_error($conn));
}

// 7. Si todo salió bien, volvemos a la página de citas con un OK
header('Location: ../../public/index.php?page=citas&ok=1');
exit;
