<!-- Ejercicio 11.1 - Validando Checkboxes (Pag. 175) -->

<?php 
// Inicialización
$eventosSeleccionados = [];
$terms = '';
$msj = '';
// Lista de eventos disponibles
$listaEventos = ['Ceremonia de Apertura', 'Atletismo', 'Natación', 'Ciclismo', 'Ceremonia de Clausura']; 


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // Captamos los valores
    $eventosSeleccionados = isset($_POST['evento']) ? $_POST['evento'] : ''; // Asignar el valor del formulario
    $terms = isset($_POST['terms']) ? true : false; // Validar términos y condiciones

    // Validación para un Radio Button
    if ($terms) {
        // Validar si al menos un evento ha sido seleccionado
        if (!empty($eventosSeleccionados)) {
            $msj = "Has seleccionado los siguientes eventos: " . htmlspecialchars(implode(', ', $eventosSeleccionados));
        } else {
            $msj = "Por favor, selecciona al menos un Evento.";
        }
    } else {
        $msj = "Debes aceptar los términos y condiciones para continuar.";
    }
}
?>




<!-- HTML -->
<?php include '../includes/header.php'; ?>

<!-- Formulario -->
<form action="voluntarios.php" method="POST">
    <h1>Eventos para Voluntarios</h1>

    <?php foreach($listaEventos as $evento) { ?>
        <input type="checkbox" name="eventos[]" value="<?= $evento ?>" <?= in_array($evento, $eventosSeleccionados) ? 'checked' : '' ?>> <?= $evento ?><br>
    <?php } ?>

    <br>
    <input type="checkbox" name="terms" <?= $terms ? 'checked' : '' ?>> Acepto los términos y condiciones<br><br>

    <input type="submit" value="Enviar">
</form>

<br>

<!-- Mostramos mensaje-->
<p><?= htmlspecialchars($msj) ?></p>

<?php include '../includes/footer.php'; ?>