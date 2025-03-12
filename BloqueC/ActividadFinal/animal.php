<?php
declare(strict_types = 1);
require 'includes/database-connection.php';
require 'includes/functions.php';

// Validar ID del animal
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if (!$id) {
    include 'page-not-found.php';
    exit;
}

// Obtener datos del animal
$sql = "SELECT 
            a.id, 
            a.nombre, 
            a.raza, 
            a.edad, 
            a.genero, 
            a.joined,
            e.especie,
            e.descripcion AS especie_descripcion,
            i.imagen AS image_file,
            i.alt AS image_alt
        FROM animales AS a
        JOIN especies AS e ON a.especie_id = e.id
        LEFT JOIN imagenes AS i ON a.imagen_id = i.id
        WHERE a.id = :id";

$animal = pdo($pdo, $sql, ['id' => $id])->fetch();

if (!$animal) {
    include 'page-not-found.php';
    exit;
}

// Especies
$sql_especies = "SELECT id, especie FROM Especies";
$especies_nav = pdo($pdo, $sql_especies)->fetchAll();

// Datos
$title = html_escape($animal['nombre']);
$description = "Detalles de {$animal['nombre']} - {$animal['especie']}";
$section = "descripcionAnimal";
?>




<!-- HTML -->
<?php include 'includes/header.php'; ?>

<main class="container" id="content">
    <div class="animal-detail">
        <section class="image">
            <img src="uploads/<?= html_escape($animal['image_file'] ?? 'blank.jpg') ?>" 
                 alt="<?= html_escape($animal['image_alt'] ?? 'Imagen de animal') ?>">
        </section>
        <section class="details">

            <h1><?= html_escape($animal['nombre']) ?></h1>
            
            <div class="metadata">
                <p><strong>Especie:</strong> <?= html_escape($animal['especie']) ?></p>
                <p><strong>Raza:</strong> <?= html_escape($animal['raza'] ?? 'Desconocida') ?></p>
                <p><strong>Edad:</strong> <?= html_escape($animal['edad'] ?? 'N/A') ?></p>
                <p><strong>Género:</strong> <?= html_escape($animal['genero']) ?></p>
                <p><strong>Rescatado:</strong> <?= format_date($animal['joined']) ?></p>
            </div>

            <div class="description">
                <h3>Dato curioso sobre la especie</h3>
                <p><?= html_escape($animal['especie_descripcion'] ?? 'No hay dato curioso disponible :(') ?></p>
            </div>

        </section>
    </div>
</main>

<?php include 'includes/footer.php'; ?>