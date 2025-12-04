
<?php
// 1. Conectamos a la base de datos (misma conexión que usas en citas)
require __DIR__ . '/../config/database.php';

// 2. Solo aceptar peticiones por POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../../public/index.php?page=hospitalizacion');
    exit;
}

// 3. Recibir datos del formulario
$nombre_mascota         = trim($_POST['nombre_mascota']         ?? '');
$raza                   = trim($_POST['raza']                   ?? '');
$peso                   = trim($_POST['peso']                   ?? '');
$tipo_operacion         = trim($_POST['tipo_operacion']         ?? '');
$motivo_hospitalizacion = trim($_POST['motivo_hospitalizacion'] ?? '');

// 4. Validar campos obligatorios
if ($nombre_mascota === '' || $tipo_operacion === '' || $motivo_hospitalizacion === '') {
    // Faltan datos importantes → devolvemos con mensaje de error
    header('Location: ../../public/index.php?page=hospitalizacion&errorHosp=1');
    exit;
}

// 5. Armar el INSERT con parámetros seguros
$sql = "
    INSERT INTO public.hospitalizacion (
        nombre_mascota,
        raza,
        peso,
        tipo_operacion,
        motivo_hospitalizacion
    ) VALUES ($1, $2, $3, $4, $5)
";

// 6. Ejecutar el INSERT
$result = pg_query_params($conn, $sql, [
    $nombre_mascota,
    $raza,
    $peso !== '' ? $peso : null,
    $tipo_operacion,
    $motivo_hospitalizacion
]);

if (!$result) {
    // Si algo sale mal, puedes mostrar el error (en desarrollo)
    die('Error al guardar la hospitalización: ' . pg_last_error($conn));
}

// 7. Si todo salió bien, regresamos a la página con mensaje de éxito
header('Location: ../../public/index.php?page=hospitalizacion&okHosp=1');
exit;
