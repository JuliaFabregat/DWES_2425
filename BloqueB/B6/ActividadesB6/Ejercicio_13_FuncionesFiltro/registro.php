<?php 
declare(strict_types=1);

// Inicialización
$user = [
    'email' => '',
    'age' => '',
    'terms' => false,
    'newsletter' => false,
];

$errors = [
    'email' => '',
    'age' => '',
    'terms' => '',
];

$formulario = '';
$message = '';

// Petición Post
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Capturar datos usando filter_input_array()
    $formulario = filter_input_array(INPUT_POST);

    // Asignar valores capturados
    $user['email'] = $formulario['email'] ?? '';
    $user['age'] = $formulario['age'] ?? '';
    $user['newsletter'] = isset($formulario['newsletter']) && $formulario['newsletter'] === 'on';
    $user['terms'] = isset($formulario['terms']) && $formulario['terms'] === 'on';

    // Validación de errores
    $errors['email'] = validEmail($user['email'], 8, 100) ? '' : 'El correo debe tener entre 8 y 100 caracteres para ser válido.';    
    $errors['age'] = validAge((int)$user['age'], 16, 35) ? '' : 'La edad debe estar entre 16 y 35 años.';
    $errors['terms'] = $user['terms'] ? '' : 'Debes aceptar los términos y condiciones para continuar.';

    // Validar si hay errores
    $invalid = implode('', $errors);
    if ($invalid) {
        $message = 'Por favor, corrija los siguientes errores. <br>';
    } else {
        $message = 'Formulario rellenado correctamente.';

        // Si te apuntas al Newsletter
        if ($user['newsletter']) {
            $message .= '<br>¡Gracias por suscribirte al Newsletter!';
        }
    }
}

// Funciones de validación
function validAge(int $num, int $min = 0, int $max = 0): bool {
    return $num >= $min && $num <= $max;
}

function validEmail(string $text, int $min = 0, int $max = 100): bool {
    $length = mb_strlen($text);
    return $length >= $min && $length <= $max;
}
?>

<?php include '../includes/header.php'; ?>

<!-- Formulario -->
<form action="registro.php" method="POST">
    <h1>Registro:</h1>

    <!-- Correo Electrónico -->
    E-mail <input type="text" id="email" name="email" value="<?= htmlspecialchars($user['email']) ?>">
    <span class="error"><?= htmlspecialchars($errors['email']) ?></span>
    <br>

    <!-- Edad -->
    Edad:<input type="text" id="age" name="age" value="<?= htmlspecialchars($user['age']) ?>">
    <span class="error"><?= htmlspecialchars($errors['age']) ?></span>
    <br>

    <!-- Opcional: Recibir Boletín -->
    <input type="checkbox" name="newsletter" <?= $user['newsletter'] ? 'checked' : '' ?>> ¿Desea recibir el boletín de manera asidua?
    <br>

    <!-- Términos y Condiciones -->
    <input type="checkbox" name="terms" <?= $user['terms'] ? 'checked' : '' ?>> Acepto los términos y condiciones
    <span class="error"><?= htmlspecialchars($errors['terms']) ?></span>
    <br>

    <!-- Botón de Enviar -->
    <input type="submit" value="Save">
</form>

<p><?= $message ?></p>

<!-- Mostrar depuración solo si hay datos válidos en $form y la solicitud sea POST -->
<?php if ($_SERVER['REQUEST_METHOD'] == 'POST' && $formulario): ?>
    <pre><?php var_dump($formulario); ?></pre>
<?php endif; ?>


<?php include '../includes/footer.php'; ?>
