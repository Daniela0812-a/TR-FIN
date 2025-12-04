<?php
// Páginas permitidas
// Páginas permitidas
$allowed_pages = ['inicio', 'servicio', 'equipo', 'citas', 'contacto', 'consulta_general', 'vacunacion', 'hospitalizacion', 'nutricion',
    'examenes', 'cirugia','estetica'];


// Página por defecto: inicio
$page = $_GET['page'] ?? 'inicio';

// Validar que la página exista en la lista, si no, cargar inicio
if (!in_array($page, $allowed_pages)) {
    $page = 'inicio';
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Clínica Veterinaria Patitas Felices</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link rel="stylesheet" href="../frontend/assets/css/style.css">
</head>
<body>

<?php
// HEADER
include __DIR__ . '/../frontend/partials/navbar.php';

// CONTENIDO SEGÚN LA PÁGINA
$view = __DIR__ . '/../frontend/pages/' . $page . '.php';

if (file_exists($view)) {
    include $view;
} else {
    include __DIR__ . '/../frontend/pages/inicio.php';
}

// FOOTER
include __DIR__ . '/../frontend/partials/footer.php';
?>

<!-- JS -->
<script src="../frontend/assets/js/main.js"></script>
</body>
</html>
