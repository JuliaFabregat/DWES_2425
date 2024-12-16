<!-- Ejemplo: Obtener información sobre archivos (Pag 146) -->
<?php
// Definimos el nombre del archivo
// $path = 'img/logo.png';
// $path = 'img/pattern.png';
$path = 'img/nologo.png';  // File not found
?>

<!-- HTML -->
<?php include 'includes/header.php'; ?>

<?php if(file_exists($path)) { ?>
    <b>Name:</b>        <?= pathinfo($path, PATHINFO_BASENAME) ?> <br>
    <b>Size:</b>        <?= filesize($path) ?> bytes <br>
    <b>Mime type:</b>   <?= mime_content_type($path) ?> <br>
    <b>Folder: </b>     <?= pathinfo($path, PATHINFO_DIRNAME) ?><br>
<?php } else { ?>
    <p>File not found.</p>
<?php } ?>

<?php include 'includes/footer.php'; ?>
