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

    // Validación - Nombre
    $errors['nombre'] = is_text($animal['nombre'], 1, 50) 
        ? '' : 'El nombre debe tener de entre 1 a 50 caracteres';

    // Validación - Especie
    $errors['especie'] = is_especie_id($animal['especie_id'], $especies_list) 
        ? '' : 'Especie no válida';

    // Validación - Edad
    $errors['edad'] = is_age_valid($animal['edad']) 
        ? '' : 'Formato: "2 años", "11 meses", etc.';

    // Validación - Imagen
    if (!empty($_FILES['imagen']['name'])) {
        $allowed_extensions = ['jpg', 'jpeg', 'png'];
        $allowed_mime_types = ['image/jpeg', 'image/png'];
        $max_size = 2 * 1024 * 1024; // 2MB
        
        $file_name = $_FILES['imagen']['name'];
        $file_tmp = $_FILES['imagen']['tmp_name'];
        $file_size = $_FILES['imagen']['size'];
        $file_error = $_FILES['imagen']['error'];

        // Validar extensión
        $file_extension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        if (!in_array($file_extension, $allowed_extensions)) {
            $errors['imagen'] = 'Formato no permitido. Solo JPG, JPEG, PNG.';
        }

        // Validar MIME type
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mime_type = finfo_file($finfo, $file_tmp);
        finfo_close($finfo);
        if (!in_array($mime_type, $allowed_mime_types)) {
            $errors['imagen'] = 'El archivo no es una imagen válida.';
        }

        // Validar contenido real
        if (!getimagesize($file_tmp)) {
            $errors['imagen'] = 'El archivo no es una imagen válida.';
        }

        // Validar tamaño
        if ($file_size > $max_size) {
            $errors['imagen'] = 'El tamaño máximo permitido es 2MB.';
        }

        // Validar error de subida
        if ($file_error !== UPLOAD_ERR_OK) {
            $errors['imagen'] = 'Error al subir el archivo.';
        }

        // Validar que sea un archivo subido
        if (!is_uploaded_file($file_tmp)) {
            $errors['imagen'] = 'Archivo no válido o corrupto.';
        }
    } else {
        $errors['imagen'] = 'Debes subir una imagen';
    }

    // Procesar si no hay errores
    if (!array_filter($errors)) {
        try {
            // Configurar nombre personalizado
            $animal_name = strtolower(preg_replace('/[^a-zA-Z0-9]/', '_', $animal['nombre']));
            $animal_name = trim($animal_name, '_') ?: 'animal';
            $new_filename = $animal_name . '_' . uniqid() . '.' . $file_extension;
            $target_dir = "uploads/";
            $target_file = $target_dir . $new_filename;

            // Crear directorio si no existe
            if (!is_dir($target_dir)) {
                if (!mkdir($target_dir, 0755, true)) {
                    throw new Exception("No se pudo crear el directorio de imágenes");
                }
            }

            // Verificar existencia (aunque es improbable con uniqid)
            if (file_exists($target_file)) {
                $errors['imagen'] = 'Nombre de archivo duplicado. Por favor, intenta de nuevo.';
            }

            // Subir archivo
            if (!move_uploaded_file($file_tmp, $target_file)) {
                throw new Exception("Error al mover el archivo");
            }

            // Insertar imagen
            $sql = "INSERT INTO imagenes (imagen, alt) VALUES (:imagen, :alt)";
            pdo($pdo, $sql, [
                'imagen' => $new_filename,
                'alt' => $animal['alt']
            ]);
            $imagen_id = $pdo->lastInsertId();

            // Obtener nombre de especie
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
                'especie' => $especie_nombre,
                'raza' => $animal['raza'],
                'edad' => $animal['edad'],
                'genero' => $animal['genero'],
                'especie_id' => $animal['especie_id'],
                'imagen_id' => $imagen_id
            ]);

            redirect('lista-animales.php', ['success' => 'Animal agregado']);
        } catch (PDOException $e) {
            $errors['warning'] = 'Error en la base de datos: ' . $e->getMessage();
        } catch (Exception $e) {
            $errors['warning'] = 'Error: ' . $e->getMessage();
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