<?php
declare(strict_types = 1);
require 'includes/database-connection.php';
require 'includes/functions.php';

// Consulta para obtener todos los animales con especies e imágenes
$sql = "SELECT 
            a.id, 
            a.nombre, 
            a.edad, 
            e.especie,
            i.imagen AS image_file
        FROM animales AS a
        JOIN especies AS e ON a.especie_id = e.id
        LEFT JOIN imagenes AS i ON a.imagen_id = i.id
        ORDER BY a.id DESC";

$animales = pdo($pdo, $sql)->fetchAll();

// Datos
$title = 'Gestión de Animales';
$description = 'Lista de todos los animales del refugio';
$section = 'listaAnimales';
?>




<!-- HTML -->
<?php include 'includes/header.php'; ?>
<main class="container" id="content">
    <h1>Gestión de Animales</h1>
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
                         alt="<?= $animal['nombre'] ?>" class="thumbnail">
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