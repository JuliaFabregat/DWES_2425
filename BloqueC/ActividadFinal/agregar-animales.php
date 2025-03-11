<?php
declare(strict_types=1);
require 'includes/database-connection.php';
require 'includes/functions.php';
require 'includes/validate.php';

// Obtener lista de especies
$sql_especies = "SELECT id, especie FROM especies ORDER BY especie";
$especies_list = pdo($pdo, $sql_especies)->fetchAll();

// Inicializar
$animal = [
    'nombre' => '',
    'especie_id' => '',
    'raza' => '',
    'edad' => '',
    'genero' => '',
    'imagen' => '',
    'alt' => ''
];

$errors = [
    'nombre' => '',
    'especie' => '',
    'imagen' => '',
    'edad' => '',
    'warning' => ''
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Capturar datos del formulario
    $animal['nombre']   = $_POST['nombre'] ?? '';
    $animal['especie_id'] = $_POST['especie_id'] ?? '';
    $animal['raza']     = $_POST['raza'] ?? '';
    $animal['edad']     = $_POST['edad'] ?? '';
    $animal['genero']   = $_POST['genero'] ?? '';
    $animal['alt']      = $_POST['alt'] ?? '';

    // Validaciones
    $errors['nombre'] = is_text($animal['nombre'], 1, 50) 
        ? '' : 'Nombre debe tener 1-50 caracteres';

    $errors['especie'] = is_especie_id($animal['especie_id'], $especies_list) 
        ? '' : 'Especie no válida';

    $errors['edad'] = is_age_valid($animal['edad']) 
        ? '' : 'Formato: "2 años", "11 meses", etc.';

    if (!empty($_FILES['imagen']['name'])) {
        $imagen_valida = is_imagen_valida($_FILES['imagen']);
        $errors['imagen'] = $imagen_valida 
            ? '' : 'La imagen debe ser JPG/PNG y menor a 2MB';
    } else {
        $errors['imagen'] = 'Debes subir una imagen';
    }

    // Procesar si no hay errores
    if (!array_filter($errors)) {
        try {
            // Subir imagen
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["imagen"]["name"]);
            
            if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file)) {
                // Insertar imagen
                $sql = "INSERT INTO imagenes (imagen, alt) VALUES (:imagen, :alt)";
                pdo($pdo, $sql, [
                    'imagen' => basename($_FILES["imagen"]["name"]),
                    'alt' => $animal['alt']
                ]);
                $imagen_id = $pdo->lastInsertId();

                // Obtener nombre de especie para insertar el nombre en la tabla
                $especie_nombre = '';

                foreach ($especies_list as $especie) {
                    if ($especie['id'] == $animal['especie_id']) {
                        $especie_nombre = $especie['especie'];
                        break;
                    }
                }

                // Insertar animal
                $sql = "INSERT INTO animales 
                        (nombre, especie, raza, edad, genero, especie_id, imagen_id) 
                        VALUES 
                        (:nombre, :especie, :raza, :edad, :genero, :especie_id, :imagen_id)";
                
                pdo($pdo, $sql, [
                    'nombre' => $animal['nombre'],
                    'especie' => $especie_nombre, // Nombre de la especie
                    'raza' => $animal['raza'],
                    'edad' => $animal['edad'],
                    'genero' => $animal['genero'],
                    'especie_id' => $animal['especie_id'], // ID de la especie
                    'imagen_id' => $imagen_id
                ]);

                redirect('lista-animales.php', ['success' => 'Animal agregado']);
            }
        } catch (PDOException $e) {
            $errors['warning'] = 'Error al guardar: ' . $e->getMessage();
        }
    } else {
        $errors['warning'] = 'Por favor, corrija los errores';
    }
}

$title = 'Agregar Animal';
$description = 'Formulario para dar de alta nuevos animales';
$section = 'agregarAnimales';
?>




<!-- HTML -->
<?php include 'includes/header.php'; ?>
<main class="container admin" id="content">
    <form action="agregar-animales.php" method="post" enctype="multipart/form-data" class="narrow">
        <h1>Agregar Animal</h1>
        
        <?php if ($errors['warning']): ?>
            <div class="alert alert-danger"><?= $errors['warning'] ?></div>
        <?php endif; ?>

        <div class="form-group">
            <label>Nombre:</label>
            <input type="text" name="nombre" value="<?= html_escape($animal['nombre']) ?>" required>
            <span class="errors"><?= $errors['nombre'] ?></span>
        </div>

        <div class="form-group">
            <label>Especie:</label>
            <select name="especie_id" required>
                <option value="">Selecciona</option>
                <?php foreach ($especies_list as $especie): ?>
                    <option value="<?= $especie['id'] ?>">
                        <?= html_escape($especie['especie']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <span class="errors"><?= $errors['especie'] ?></span>
        </div>

        <div class="form-group">
            <label>Raza:</label>
            <input type="text" name="raza" value="<?= html_escape($animal['raza']) ?>">
        </div>

        <div class="form-group">
            <label>Edad:</label>
            <input type="text" name="edad" value="<?= html_escape($animal['edad']) ?>" 
                placeholder="Ej: 2 años, 11 meses">
            <span class="errors"><?= $errors['edad'] ?></span>
        </div>

        <div class="form-group">
            <label>Género:</label>
            <select name="genero" required>
                <option value="Macho">Macho</option>
                <option value="Hembra">Hembra</option>
                <option value="Indefinido">Indefinido</option>
            </select>
        </div>

        <div class="form-group">
            <label>Imagen:</label>
            <input type="file" name="imagen" accept="image/*" required>
            <span class="errors"><?= $errors['imagen'] ?></span>
        </div>

        <div class="form-group">
            <label>Texto alternativo:</label>
            <input type="text" name="alt" value="<?= html_escape($animal['alt']) ?>">
        </div>

        <input type="submit" value="Guardar" class="button secondary">
    </form>
</main>
<?php include 'includes/footer.php'; ?>