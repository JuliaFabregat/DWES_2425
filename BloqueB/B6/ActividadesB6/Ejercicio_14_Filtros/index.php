<?php 
declare(strict_types=1);

// Ejercicio 14. Recolectando datos usando FILTER (filtros) (Pag. 224)

// Inicialización
$user = [ 'ip' => '0.0.0.0', ];     // Valor por defecto
$errors = [ 'ip' => '', ];
$message = '';

// Petición POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Capturar datos usando filtros
    $formulario = filter_input_array(INPUT_POST, [ 'ip' => FILTER_VALIDATE_IP, ]);  // Validamos con IP ya que es una dirección IP

    // Validar dirección IP
    if ($formulario['ip'] && filter_var($formulario['ip'], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) { // filter_var() -> valida/sanitiza datos mediante filtros predefinidos
                                                                                                    // filter_var($datoAvalidar, FILTRO_A_APLICAR, $opcionesOpcionales)
        $user['ip'] = $formulario['ip'];
        $message = "La dirección IP <b>{$user['ip']}</b> es válida.";
    } else {
        $user['ip'] = '0.0.0.0';    // Establecemos el valor por defecto ya que es erróneo
        $errors['ip'] = 'Debe ingresar una dirección IPv4 válida.';
        $message = 'Por favor, corrija los errores.';
    }
}
?>




<!-- HTML -->
<?php include '../includes/header.php'; ?>

<!-- Formulario -->
<form action="index.php" method="POST">
    <h1>Validar Dirección IP:</h1>

    <!-- Dirección IP -->
    Dirección IP: <input type="text" id="ip" name="ip" value="<?= htmlspecialchars($user['ip']) ?>">
    <span class="error"><?= htmlspecialchars($errors['ip']) ?></span>
    <br>

    <!-- Botón de Enviar -->
    <input type="submit" value="Validar">
</form>

<p><?= $message ?></p>

<?php include '../includes/footer.php'; ?>
