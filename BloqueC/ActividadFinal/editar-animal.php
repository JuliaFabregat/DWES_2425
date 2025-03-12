<?php
declare(strict_types = 1);
require 'includes/database-connection.php';
require 'includes/functions.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if (!$id) {
    redirect('lista-animales.php');
}

// Obtener datos del animal
$sql = "SELECT nombre, edad FROM animales WHERE id = :id";
$animal = pdo($pdo, $sql, ['id' => $id])->fetch();

if (!$animal) {
    redirect('lista-animales.php');
}

// Procesar formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $edad = filter_input(INPUT_POST, 'edad', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $sql = "UPDATE animales SET nombre = :nombre, edad = :edad
            WHERE id = :id";
    
    pdo($pdo, $sql, [
        'nombre' => $nombre,
        'edad' => $edad ?: null,
        'id' => $id
    ]);

    redirect('lista-animales.php');
}

// Datos
$title = 'Editar Animal';
$description = 'Formulario para editar datos del animal';
$section = 'listaAnimales';
?>




<!-- HTML -->
<?php include 'includes/header.php'; ?>

<main class="container" id="content">
    <h1>Editar Animal</h1>
    <form method="POST">
        <div class="field">
            <label>Nombre:</label>
            <input type="text" name="nombre" value="<?= html_escape($animal['nombre'] ?? '') ?>" required>
        </div>
        <div class="field">
            <label>Edad:</label>
            <input type="text" name="edad" value="<?= $animal['edad'] ?? '' ?>">
        </div>
        <button type="submit" class="button secondary">Guardar cambios</button>
        <a href="lista-animales.php" class="button secondary">Cancelar</a>
    </form>
</main>

<?php include 'includes/footer.php'; ?>