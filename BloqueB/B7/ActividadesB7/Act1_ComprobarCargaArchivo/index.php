<?php
// Ejercicio 1. Comprobar que se ha cargado un archivo (Pag. 25)

// Variables
$msj = '';

// Comprobar petición
if($_SERVER['REQUEST_METHOD'] == 'POST'){

    // Comprobar si la img tiene errores
    if($_FILES['image']['error'] === 0){
        $msj = 'The file has been uploaded successfully <br><br>';
        $msj .= '<b>File:</b> ' . $_FILES['image']['name'] . '<br>';
        $msj .= '<b>Size:</b> ' . $_FILES['image']['size'] . ' bytes <br><br>';
    }
    else{
        $msj = 'The file could not be uploaded <br>';
    }

    // En caso de tener dos imágenes - image es el nombre del input
    // if($_FILES['image']['error'] === 0 && $_FILES['image2']['error'] === 0){
    //     $msj = 'The files have been uploaded successfully <br><br>';
    //     $msj .= '<b>File 1:</b> ' . $_FILES['image']['name'] . '<br>';
    //     $msj .= '<b>Size 1:</b> ' . $_FILES['image']['size'] . ' bytes <br><br>';
    //     $msj .= '<b>File 2:</b> ' . $_FILES['image2']['name'] . '<br>';
    //     $msj .= '<b>Size 2:</b> ' . $_FILES['image2']['size'] . ' bytes <br><br>';
    // }
    // else{
    //     $msj = 'The files could not be uploaded <br>';
    // }
}

?>

<!-- HTML -->
<?php include '../includes/header.php'; ?>

<h1>File Uploader</h1> <br>

<?= $msj ?>

<form method="POST" action="index.php" enctype="multipart/form-data">
    <label for="image"><b>Upload file:</b></label>
    <input type="file" name="image" accept="image/*" id="image"> <br><br>
    <!-- <input type="file" name="image2" accept="image2/*" id="image2"> <br><br> -->
    <input type="submit" value="Upload">
</form>

<?php include '../includes/footer.php'; ?>