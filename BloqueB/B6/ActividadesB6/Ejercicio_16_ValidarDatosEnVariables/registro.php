<?php
// Ejercicio 16. Validando datos en Variables (Pag. 244)

// Inicialización de los valores y errores
$formulario = [
    'email' => '',
    'age' => '',
    'url' => '',
    'terms' => false,
];

$errors = [
    'email' => '',
    'age' => '',
    'url' => '',
    'terms' => '',
];

$data = [];

// Verificar si el formulario ha sido enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Definir filtros para validar los datos
    $filters['email'] = FILTER_VALIDATE_EMAIL;
    $filters['age']['filter'] = FILTER_VALIDATE_INT;
    $filters['age']['options']['min_range'] = 18;
    $filters['age']['options']['max_range'] = 65;
    $filters['url'] = FILTER_VALIDATE_URL;
    $filters['terms'] = FILTER_VALIDATE_BOOLEAN;

    // Captura los datos usando filter_input_array
    $formulario = filter_input_array(INPUT_POST);
    $data = filter_var_array($formulario, $filters);

    // Validación de errores
    $errors['email'] = $formulario['email'] ? '' : 'El correo electrónico no es válido.';
    $errors['age'] = $formulario['age'] ? '' : 'La edad debe estar comprendida entre 18 y 65 años.';
    $errors['url'] = $formulario['url'] ? '' : 'La URL no es válida.';
    $errors['terms'] = $formulario['terms'] ? '' : '<br>Debe aceptar los términos y condiciones para continuar.';
}


?>

<!-- HTML -->
<?php include '../includes/header.php'; ?>

<!-- Mostrar el formulario -->
<form action="registro.php" method="POST">
    <!-- Email -->
    E-mail: <input type="text" name="email" value="<?= htmlspecialchars($formulario['email']) ?>">
    <span class="error"><?= $errors['email'] ?></span><br>

    <!-- Edad -->
    Edad: <input type="text" name="age" value="<?= htmlspecialchars($formulario['age']) ?>">
    <span class="error"><?= $errors['age'] ?></span><br>

    <!-- URL -->
    URL: <input type="text" name="url" value="<?= htmlspecialchars($formulario['url']) ?>">
    <span class="error"><?= $errors['url'] ?></span><br>

    <!-- Términos y condiciones -->
    I agree to the terms and conditions: <input type="checkbox" name="terms" value="true">
    <span class="terms"><?= $errors['terms'] ?></span><br>

    <input type="submit" value="Save">
</form>

<?php if ($_SERVER['REQUEST_METHOD'] === 'POST') { ?>
    <pre><?php var_dump($data); ?></pre>
<?php } ?>

<?php include '../includes/footer.php'; ?>
