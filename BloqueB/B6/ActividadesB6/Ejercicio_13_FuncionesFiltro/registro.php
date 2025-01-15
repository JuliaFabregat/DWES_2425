<?php 
declare(strict_types=1);

// Ejercicio 13. Funciones Filtro (Pag. 208)

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

$message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Capturar datos del formulario
    $user['email'] = $_POST['email'] ?? '';
    $user['age'] = $_POST['age'] ?? '';
    $user['newsletter'] = isset($_POST['newsletter']) && $_POST['newsletter'] == 'on';
    $user['terms'] = isset($_POST['terms']) && $_POST['terms'] == 'on';

    // Validación de errores
    $errors['email'] = validEmail($user['email'], 8, 100)
        ? '' 
        : 'El correo debe tener entre 2 y 100 caracteres para ser válido.';
    
    $errors['age'] = validAge((int)$user['age'], 16, 35) 
        ? '' 
        : 'La edad debe estar entre 16 y 35 años.';
    
    $errors['terms'] = $user['terms'] 
        ? '' 
        : 'Debes aceptar los términos y condiciones para continuar.';

    // Validar si hay errores
    $invalid = implode('', $errors);
    if ($invalid) {
        $message = 'Por favor, corrija los siguientes errores. <br>';
    } else {
        $message = 'Formulario rellenado correctamente.';

        // Si te apuntas al Newsletter
        if($user['newsletter']){
            $message .= '<br>¡Gracias por suscribirte al Newsletter!';
        }
    }
}


// Funciones de validación
function validAge(int $num, int $min = 0, int $max = 0): bool {
    return $num >= $min && $num <= $max;
}

function validEmail($text, $min = 0, $max = 375): bool{
    // Cogemos el largo del texto a validar
    $length = mb_strlen($text);

    return $length >= $min and $length <= $max;
}
?>

<?php include '../includes/header.php'; ?>

<!-- Formulario -->
<form action="registro.php" method="POST">
    <h1>Registro:</h1>

    <!-- Correo Electrónico -->
    <label for="email">E-mail:</label>
    <input type="text" id="email" name="email" value="<?= htmlspecialchars($user['email']) ?>">
    <span class="error"><?= htmlspecialchars($errors['email']) ?></span>
    <br>

    <!-- Edad -->
    <label for="age">Edad:</label>
    <input type="text" id="age" name="age" value="<?= htmlspecialchars($user['age']) ?>">
    <span class="error"><?= htmlspecialchars($errors['age']) ?></span>
    <br>

    <!-- Opcional: Recibir Boletín -->
    <label>
        <input type="checkbox" name="newsletter" <?= $user['newsletter'] ? 'checked' : '' ?>>
        ¿Desea recibir el boletín de manera asidua?
    </label>
    <br>

    <!-- Términos y Condiciones -->
    <label>
        <input type="checkbox" name="terms" <?= $user['terms'] ? 'checked' : '' ?>>
        Acepto los términos y condiciones
    </label>
    <span class="error"><?= htmlspecialchars($errors['terms']) ?></span>
    <br>

    <!-- Botón de Enviar -->
    <input type="submit" value="Guardar">
</form>

<p><?= $message ?></p>

<?php include '../includes/footer.php'; ?>