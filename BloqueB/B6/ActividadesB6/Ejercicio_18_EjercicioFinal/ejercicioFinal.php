<?php
// Ejercicio 18. Ejercicio Final (Pag. 274)

// Inicialización de los datos y errores
// Array de datos del USUARIO
$usuario = [
    'nombre' => '',
    'email' => '',
    'telefono' => '',
    'evento' => '',
    'terminos' => '',
];
//  Array de ERRORES
$error = [
    'nombre' => '',
    'email' => '',
    'telefono' => '',
    'evento' => '',
    'terminos' => '',
];
// Array de datos SANEADOS | No está términos
$datos = [
    'nombre' => '',
    'email' => '',
    'telefono' => '',
    'evento' => '',
];
// Mensaje de Feedback
$mensaje = '';

// Validación
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Definir filtros para validación
    $filtros['nombre']['filter'] = FILTER_VALIDATE_REGEXP; 
    $filtros['nombre']['options']['regexp'] = '/[A-z]{2,50}/';        // Solo letras y espacio, entre 2 y 50 caracteres
    $filtros['email'] = FILTER_VALIDATE_EMAIL;                              // Validación del email
    $filtros['telefono']['filter'] = FILTER_VALIDATE_REGEXP;
    $filtros['telefono']['options']['regexp'] = '/^[0-9]{9}$/';             // Solo números, al menos 9 dígitos
    $filtros['evento']['filter'] = FILTER_VALIDATE_REGEXP;
    $filtros['evento']['options']['regexp'] = '/^(Presencial|Online)$/';    // Solo las opciones Presencial u Online
    $filtros['terminos'] = FILTER_VALIDATE_BOOLEAN;                         // Validación del checkbox

    // Validar las entradas
    $usuario = filter_input_array(INPUT_POST, $filtros);

    // Saneamiento de los datos
    $datos = filter_var_array($usuario, [
        'nombre' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        'email' => FILTER_SANITIZE_EMAIL,
        'telefono' => FILTER_SANITIZE_NUMBER_INT,
        'evento' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        //'terminos' => FILTER_SANITIZE_NUMBER_INT,          
        // No existe un Filter para BOOLEAN | Si dejo el campo vacío sale error, hay que sacarlo del array de datos *
    ]);

    // Saneamiento manual:
    // $usuario['nombre'] = htmlspecialchars($_POST['nombre'] ?? '');

    // Validar los errores
    $error['nombre'] = $usuario['nombre'] ? '' : 'El nombre es obligatorio y debe contener entre 2 y 50 caracteres.';
    $error['email'] = $usuario['email'] ? '' : 'El correo electrónico no es válido.';
    $error['telefono'] = $usuario['telefono'] ? '' : 'El teléfono debe ser un número válido con al menos 9 dígitos.';
    $error['evento'] = $usuario['evento'] ? '' : 'Debe seleccionar un tipo de evento válido.';
    $error['terminos'] = ($usuario['terminos'] === true) ? '' : 'Debe aceptar los términos y condiciones.';

    // Si hay errores
    $invalid = implode($error);
    if ($invalid) {
        $mensaje = 'Por favor, corrige los errores siguientes.';
    } else {
        $mensaje = 'Se ha registrado correctamente :)';
    }
}
?>




<!-- HTML -->
<?php include '../includes/header.php'; ?>


<h1>Formulario de registro para eventos</h1>

<form action="ejercicioFinal.php" method="POST">
    <!-- Nombre completo -->
    Nombre: <input type="text" name="nombre" value="<?= $datos['nombre'] ?>">
    <span class="error"><?= $error['nombre'] ?></span><br>

    <!-- Correo electrónico -->
    Correo electrónico: <input type="text" name="email" value="<?= $datos['email'] ?>">
    <span class="error"><?= $error['email'] ?></span><br>

    <!-- Teléfono -->
    Teléfono: <input type="text" name="telefono" value="<?= $datos['telefono'] ?>">
    <span class="error"><?= $error['telefono'] ?></span><br>

    <!-- Tipo de evento -->
    Tipo de evento:
    <select name="evento">
        <option value="">Seleccione...</option>
        <option value="Presencial" <?= $datos['evento'] == 'Presencial' ? 'selected' : '' ?>>Presencial</option>
        <option value="Online" <?= $datos['evento'] == 'Online' ? 'selected' : '' ?>>Online</option>
    </select>
    <span class="error"><?= $error['evento'] ?></span><br>

    <!-- Términos y condiciones -->
    <input type="checkbox" name="terminos" value="1" <?= $usuario['terminos'] == 1 ? 'checked' : '' ?>> Acepto los términos y condiciones.
    <span class="error"><?= $error['terminos'] ?></span><br>

    <input type="submit" value="Registrar">
</form>

<!-- Mostramos el mensaje de confirmación -->
<?php if (!empty($mensaje)) { ?>
    <p><?= $mensaje ?><p>
<?php } ?>

<!-- Mostramos los datos del formulario -->
<?php if ($_SERVER['REQUEST_METHOD'] === 'POST') { ?>
    <p><b>Resultados:</b></p>
    <pre><?php var_dump($datos); ?></pre>
<?php } ?>


<?php include '../includes/footer.php'; ?>
