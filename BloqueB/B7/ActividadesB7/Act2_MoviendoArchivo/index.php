<?php
// Ejercicio 2. Moviendo un archivo subido (Pag. 37)

// Inicialización
$msj = '';
$moved = false;

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