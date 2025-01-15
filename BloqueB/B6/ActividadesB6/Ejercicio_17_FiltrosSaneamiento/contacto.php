<?php
// Ejercicio 17. Aplicando filtros de saneamiento a variables (Pag. 263)

// Inicialización de los valores y errores
$formulario = [
    'name' => '',
    'email' => '',
    'phone' => '',
    'message' => '',
];

$errors = [
    'name' => '',
    'email' => '',
    'phone' => '',
    'message' => '',
];

$data = [];


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Definir filtros para saneamiento de datos
    $filters['name'] = FILTER_SANITIZE_STRING;             // Limpia texto, elimina etiquetas HTML
    $filters['email'] = FILTER_SANITIZE_EMAIL;             // Limpia el correo electrónico
    $filters['phone'] = FILTER_SANITIZE_NUMBER_INT;        // Elimina caracteres no numéricos
    $filters['message'] = FILTER_SANITIZE_STRING;          // Limpia el mensaje de etiquetas HTML

    // Captura y saneo de datos
    $formulario = filter_input_array(INPUT_POST);
    $data = filter_var_array($formulario, $filters);

    // Validar errores
    $errors['name'] = $formulario['name'] ? '' : 'El nombre es requerido.';
    $errors['email'] = filter_var($formulario['email'], FILTER_VALIDATE_EMAIL) ? '' : 'El correo electrónico no es válido.';
    $errors['phone'] = $formulario['phone'] ? '' : 'El número de teléfono es requerido.';
    $errors['message'] = $formulario['message'] ? '' : 'El mensaje no puede estar vacío.';
}

?>

<!-- HTML -->
<?php include '../includes/header.php'; ?>

<!-- Mostrar el formulario de contacto -->
<form action="contacto.php" method="POST">
    <!-- Nombre -->
    Nombre: <input type="text" name="name" value="<?= htmlspecialchars($formulario['name']) ?>">
    <span class="error"><?= $errors['name'] ?></span><br>

    <!-- Correo electrónico -->
    E-mail: <input type="text" name="email" value="<?= htmlspecialchars($formulario['email']) ?>">
    <span class="error"><?= $errors['email'] ?></span><br>

    <!-- Teléfono -->
    Teléfono: <input type="text" name="phone" value="<?= htmlspecialchars($formulario['phone']) ?>">
    <span class="error"><?= $errors['phone'] ?></span><br>

    <!-- Mensaje -->
    Mensaje: <textarea name="message"><?= htmlspecialchars($formulario['message']) ?></textarea>
    <span class="error"><?= $errors['message'] ?></span><br>

    <input type="submit" value="Enviar">
</form>

<?php if ($_SERVER['REQUEST_METHOD'] === 'POST') { ?>
    <h3>Datos enviados (saneados):</h3>
    <pre><?php var_dump($data); ?></pre>
<?php } ?>

<?php include '../includes/footer.php'; ?>
