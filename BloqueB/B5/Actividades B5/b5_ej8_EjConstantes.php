<!-- Ejemplo: usando constantes (Pag 125) -->

<?php 
// Incluimos el archivo de configuración
include 'includes/settings.php';
?>

<!-- HTML -->
<?php include 'includes/header.php'; ?>

<h1>Welcome to <?= SITE_NAME ?></h1>
<p>To contact us, email <?= ADMIN_EMAIL ?></p>

<?php include 'includes/footer.php'; ?>