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
    $filters['name'] = FILTER_NULL_ON_FAILURE;
    $filters['email']= FILTER_VALIDATE_EMAIL;
    $filters['phone']['filter'] = FILTER_VALIDATE_REGEXP;
    $filters['phone']['options'] = ['regexp' => '/^\d{9,11}$/'];
    $filters['message'] = FILTER_DEFAULT;

    // Captura y saneo de datos
    $formulario = filter_input_array(INPUT_POST, $filters);
    $data = filter_var_array($formulario, $filters);

    // Validar errores
    $errors['name'] = $formulario['name'] ? '' : 'El nombre es requerido.';
    $errors['email'] = filter_var($formulario['email'], FILTER_VALIDATE_EMAIL) ? '' : 'El correo electrónico no es válido.';
    $errors['phone'] = $formulario['phone'] ? '' : 'El número de teléfono es requerido.';
    $errors['message'] = $formulario['message'] ? '' : 'El mensaje no puede estar vacío.';

    // Sanitizar datos
    $data['name'] = filter_var($formulario['name'], FILTER_SANITIZE_STRING);
    $data['email'] = filter_var($formulario['email'], FILTER_SANITIZE_EMAIL);
    $data['phone'] = filter_var($formulario['phone'], FILTER_SANITIZE_STRING);
    $data['message'] = filter_var($formulario['message'], FILTER_SANITIZE_STRING);
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
