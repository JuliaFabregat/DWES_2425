<?php
// Ejercicio Final (Pag. 263)

// Inicialización de los datos y errores
$usuario = [
    'nombre' => '',
    'email' => '',
    'telefono' => '',
    'evento' => '',
    'terminos' => '',
];
$error = [
    'nombre' => '',
    'email' => '',
    'telefono' => '',
    'evento' => '',
    'terminos' => '',
];
$datos = [];
$mensaje = '';

// Validación
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Definir filtros para validación
    $filtros['nombre']['filter'] = FILTER_VALIDATE_REGEXP; 
    $filtros['nombre']['options']['regexp'] = '/^[A-Za-z ]{2,50}$/';  // Solo letras y espacio, entre 2 y 50 caracteres
    $filtros['email'] = FILTER_VALIDATE_EMAIL;  // Validación del email
    $filtros['telefono']['filter'] = FILTER_VALIDATE_REGEXP;
    $filtros['telefono']['options']['regexp'] = '/^[0-9]{9}$/';  // Solo números, al menos 9 dígitos
    $filtros['evento'] = FILTER_VALIDATE_REGEXP;
    $filtros['evento']['options']['regexp'] = '/^(Presencial|Online)$/'; // Solo las opciones Presencial u Online
    $filtros['terminos'] = FILTER_VALIDATE_BOOLEAN;  // Validación del checkbox

    // Validar las entradas
    $usuario = filter_input_array(INPUT_POST, $filtros);

    // Verifica si filter_input_array devolvió false y asigna un array vacío si es el caso
    if ($usuario === false) {
        $usuario = [
            'nombre' => '',
            'email' => '',
            'telefono' => '',
            'evento' => '',
            'terminos' => '',
        ];
    }

    // Saneamiento de los datos
    $datos = filter_var_array($usuario, [
        'nombre' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        'email' => FILTER_SANITIZE_EMAIL,
        'telefono' => FILTER_SANITIZE_NUMBER_INT,
        'evento' => FILTER_SANITIZE_STRING,
        'terminos' => FILTER_SANITIZE_NUMBER_INT
    ]);

    // Validar los errores
    $error['nombre'] = $usuario['nombre'] ? '' : 'El nombre completo es obligatorio y debe contener entre 2 y 50 caracteres.';
    $error['email'] = $usuario['email'] ? '' : 'El correo electrónico no es válido.';
    $error['telefono'] = $usuario['telefono'] ? '' : 'El teléfono debe ser un número válido con al menos 9 dígitos.';
    $error['evento'] = $usuario['evento'] ? '' : 'Debe seleccionar un tipo de evento válido.';
    $error['terminos'] = ($usuario['terminos'] === true) ? '' : 'Debe aceptar los términos y condiciones.';

    // Si hay errores
    $invalid = implode($error);
    if ($invalid) {
        $mensaje = 'Por favor, corrige los errores';
    } else {
        $mensaje = 'Se ha registrado correctamente :)';
    }
}
?>

<?php include '../includes/header.php'; ?>

<h1>Formulario de registro para eventos</h1>

<form action="ejercicioFinal.php" method="POST">
    <!-- Nombre completo -->
    Nombre completo: <input type="text" name="nombre" value="<?= htmlspecialchars($usuario['nombre']) ?>">
    <span class="error"><?= $error['nombre'] ?></span><br>

    <!-- Correo electrónico -->
    Correo electrónico: <input type="text" name="email" value="<?= htmlspecialchars($usuario['email']) ?>">
    <span class="error"><?= $error['email'] ?></span><br>

    <!-- Teléfono -->
    Teléfono: <input type="text" name="telefono" value="<?= htmlspecialchars($usuario['telefono']) ?>">
    <span class="error"><?= $error['telefono'] ?></span><br>

    <!-- Tipo de evento -->
    Tipo de evento:
    <select name="evento">
        <option value="">Seleccione...</option>
        <option value="Presencial" <?= $usuario['evento'] == 'Presencial' ? 'selected' : '' ?>>Presencial</option>
        <option value="Online" <?= $usuario['evento'] == 'Online' ? 'selected' : '' ?>>Online</option>
    </select>
    <span class="error"><?= $error['evento'] ?></span><br>

    <!-- Aceptación de los términos -->
    <input type="checkbox" name="terminos" value="1" <?= $usuario['terminos'] == 1 ? 'checked' : '' ?>> Acepto los términos y condiciones.
    <span class="error"><?= $error['terminos'] ?></span><br>

    <input type="submit" value="Registrar">
</form>

<?php if ($_SERVER['REQUEST_METHOD'] === 'POST') { ?>
    <h2>Resultados:</h2>
    <pre><?php var_dump($datos); ?></pre>
<?php } ?>

<?php if (!empty($mensaje)) { ?>
    <div style="<?= $invalid ? 'color: red;' : 'color: green;' ?>">
        <h3><?= htmlspecialchars($mensaje) ?></h3>
    </div>
<?php } ?>

<?php include '../includes/footer.php'; ?>
