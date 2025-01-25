<?php
// Ejercicio 3. Validando subidas de ficheros (Pag. 58) - Leer Pag 45
// Inicialización
$msj = '';
$moved = false;
$error = '';
$uploadPath = './uploads/';     // Ruta donde subiremos la img
$max_size = 5242880;            // Tamaño máx en Bytes que puede tener la img
$allowedTypes = ['image/jpeg', 'image/png', 'image/gif',];
$allowedExtensions = ['jpeg', 'jpg', 'png', 'gif',];
$i = 1;

// FUNCIÓN QUE VALIDA EL NOMBRE DEL ARCHIVO
function createFilename($fileName, $uploadPath){
    // Obtiene el nombre base y la extensión del archivo
    $baseName = pathinfo($fileName, PATHINFO_FILENAME);
    $extension = pathinfo($fileName, PATHINFO_EXTENSION);
    // Reemplazamos cualquier caracter en el nombre que no sea A-z0-9 por un -
    $baseName = preg_replace('/[^A-z0-9]/', '-', $baseName);
    // Creamos la ruta en la que guardaremos el archivo + nombre limpio + extensión
    $filePath = './uploads/' . $baseName . '.' . $extension;
    
    // Para evitar que los archivos con nombres duplicados se sobreescriban
    while(file_exists('uploads/' . $fileName)){
        $i = $i+1;
        $fileName = $baseName . '('. $i . ')' . '.' . $extension;
    }

    return $fileName;
}


// Comprobar petición
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // Comprobar si la img tiene errores
    if($_FILES['image']['error'] === 0){
        // La guardamos temporalmente en un nuevo lugar
        $temp = $_FILES['image']['tmp_name'];
        $path = './var/www/images/' . $_FILES['image']['name'];

        // Si las comprobaciones salen bien, movemos la imagen
        $moved = move_uploaded_file($temp, $path);

        // Mandamos el mensaje de confirmación
        $msj = 'The file has been successfully uploaded and displayed <br><br>';
        $msj .= '<b>File:</b> ' . $_FILES['image']['name'] . '<br>';
        $msj .= '<b>Size:</b> ' . $_FILES['image']['size'] . ' bytes <br><br>';
    }
    else{
        $msj = 'The file could not be uploaded <br>';
    }

    // Si se ha movido, mostramos la imagen
    if($moved === true){
        $msj .= '<img src="' . $path . '">';
    }
    else{
        $msj = 'The file could not be moved <br>';
    }
}

?>

<!-- HTML -->
<?php include '../includes/header.php'; ?>

<h1>File Uploader</h1> <br>

<?= $msj ?>

<form method="POST" action=<?= $_SERVER['PHP_SELF'] ?> enctype="multipart/form-data">
    <label for="image"><b>Upload file:</b></label>
    <input type="file" name="image" accept="image/*" id="image"> <br><br>
    <input type="submit" value="Upload">
</form>

<?php include '../includes/footer.php'; ?>