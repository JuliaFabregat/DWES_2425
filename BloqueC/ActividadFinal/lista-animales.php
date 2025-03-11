<?php
declare(strict_types=1);
require 'includes/database-connection.php';
require 'includes/functions.php';

// Recoger la especie seleccionada (si existe) y validarla
$selectedSpecies = $_GET['especie'] ?? '';
if ($selectedSpecies !== '' && !ctype_digit($selectedSpecies)) {
    $selectedSpecies = ''; // Si no es un valor numérico, lo ignoramos
}

// Consulta Base
$sql = "SELECT 
            a.id, 
            a.nombre, 
            a.edad, 
            e.especie,
            i.imagen AS image_file
        FROM animales AS a
        JOIN especies AS e ON a.especie_id = e.id
        LEFT JOIN imagenes AS i ON a.imagen_id = i.id";

// Array de parámetros para la consulta
$params = [];

// Si se ha seleccionado una especie, se añade una condición
if ($selectedSpecies !== '') {
    $sql .= " WHERE e.id = :especie_id";
    $params['especie_id'] = $selectedSpecies;
}

$sql .= " ORDER BY a.id DESC";

// Ejecutar la consulta con o sin parámetros
$animales = pdo($pdo, $sql, $params)->fetchAll();

// Consulta para obtener todas las especies para el filtro
$sqlEspecies = "SELECT id, especie FROM especies ORDER BY especie ASC";
$especies = pdo($pdo, $sqlEspecies)->fetchAll();

// Datos
$title = 'Gestión de Animales';
$description = 'Lista de todos los animales del refugio';
$section = 'listaAnimales';
?>




<!-- HTML -->
<?php include 'includes/header.php'; ?>
<main class="container" id="content">
    <h1>Gestión de Animales</h1>
    
    <!-- Formulario de filtro por especie -->
    <form method="GET" action="lista-animales.php">
        <label for="especie">Filtrar por especie:</label>
        <select name="especie" id="especie">
            <option value="">Todas</option>
            <?php foreach ($especies as $especieOption) { ?>
                <option value="<?= $especieOption['id'] ?>" <?= ($selectedSpecies == $especieOption['id']) ? 'selected' : '' ?>>
                    <?= html_escape($especieOption['especie']) ?>
                </option>
            <?php } ?>
        </select>
        <button type="submit">Filtrar</button>
    </form>

    <!-- Lista de Animales -->
    <table class="table">
        <thead>
            <tr>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Especie</th>
                <th>Edad</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($animales as $animal) { ?>
                <tr>
                    <td>
                        <img src="uploads/<?= html_escape($animal['image_file'] ?? 'blank.jpg') ?>" 
                             alt="<?= html_escape($animal['nombre']) ?>" class="thumbnail">
                    </td>
                    <td><?= html_escape($animal['nombre']) ?></td>
                    <td><?= html_escape($animal['especie']) ?></td>
                    <td><?= html_escape($animal['edad'] ?? 'N/A') ?></td>
                    <td>
                        <a href="editar-animal.php?id=<?= $animal['id'] ?>" class="button edit">Editar</a>
                        <a href="eliminar-animal.php?id=<?= $animal['id'] ?>" class="button delete" 
                           onclick="return confirm('¿Estás seguro?')">Eliminar</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</main>
<?php include 'includes/footer.php'; ?>
