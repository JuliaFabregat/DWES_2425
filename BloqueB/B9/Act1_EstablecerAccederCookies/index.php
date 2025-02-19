<?php
$msg = '';

// Si la cookie existe, mostramos el mensaje de bienvenida
if (isset($_COOKIE['nombre'])) {
    $msg = 'Bienvenido de nuevo, ' . $_COOKIE['nombre'];
} 
// Si no existe procesamos el formulario
elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['nombre'])) {
    $nombre = $_POST['nombre'];
    setcookie('nombre', $nombre);
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}
?>

<?php include '../includes/header.php'; ?>

<!-- Si existe la cookie -->
<?php if (!empty($msg)): ?>
    <p><?= $msg ?></p>
<?php else: ?>
    <!-- Si no existe mostramos el formulario -->
    <form action="" method="POST">
        <label>Introduzca su nombre: </label>
        <input type="text" name="nombre" id="nombre" required>
        <input type="submit" value="Enviar">
    </form>
<?php endif; ?>

<?php include '../includes/footer.php'; ?>
