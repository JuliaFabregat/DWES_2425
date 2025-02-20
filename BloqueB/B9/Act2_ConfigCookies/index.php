<!-- Actividad 2. Cofiguración de Cookies (Pag.47) -->
<?php 
// Variables
$leng = $_COOKIE['leng'] ?? null;       // Obtenemos el valor de la cookie leng
$options = ['ingles', 'castellano'];    // Opciones válidas

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $leng = $_POST['leng'];
    
    if (in_array($leng, $options)) {
        // Cookie con duración de 30 días
        setcookie('leng', $leng, time() + 60 * 60 * 24 * 30, '/', '', false, true);
    }
}

$scheme = (in_array($leng, $options)) ? $leng : 'castellano';
?>



<!-- HTML -->
<?php include '../includes/header.php'; ?>

<?php if ($leng): ?>
    <!-- Mostrar mensaje de bienvenida si existe la cookie -->
    <?php if ($scheme == 'ingles'): ?>
        <p>Welcome! Your selected language is English.</p>
    <?php elseif ($scheme == 'castellano'): ?>
        <p>¡Bienvenido! Tu idioma seleccionado es Español.</p>
    <?php endif; ?>
<?php else: ?>
    <!-- Mostrar el formulario si no existe la cookie -->
    <form action="index.php" method="POST">
        <label for="leng">Seleccione el idioma:</label>
        <select name="leng" id="leng">
            <option value="ingles">Inglés</option>
            <option value="castellano">Español</option>
        </select>
        <input type="submit" value="Guardar">
    </form>
<?php endif; ?>

<?php include '../includes/footer.php'; ?>