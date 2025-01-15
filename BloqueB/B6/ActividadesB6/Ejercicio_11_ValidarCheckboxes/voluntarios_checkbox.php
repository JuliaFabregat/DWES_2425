<!-- Ejercicio 11.2 - Validando Checkboxes con Nº min de eventos a seleccionar (Pag. 176) -->

<?php 
// Inicialización
$evento = '';
$eventosSeleccionados = [];
$terms = '';
$msj = '';
// Lista de eventos disponibles
$listaEventos = ['Ceremonia de Apertura', 'Atletismo', 'Natación', 'Ciclismo', 'Ceremonia de Clausura', 'Esgrima', 'Remo']; // Hemos añadido más eventos


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // Captamos los valores
    $evento = isset($_POST['evento']) ? $_POST['evento'] : ''; // Asignar el valor del formulario
    $eventosSeleccionados = isset($_POST['eventosSeleccionados']) ? $_POST['eventosSeleccionados'] : [];  // Captamos los Eventos que se han seleccionado (Las Checkboxes)
    $terms = isset($_POST['terms']) ? true : false; // Validar términos y condiciones

    // Validación: Para filtrar por nº eventos (Selected)
    if ($terms) {
        if (count($eventosSeleccionados) >= 2) {
            $msj = "Has seleccionado los eventos: " . implode(', ', array_map('htmlspecialchars', $eventosSeleccionados));
        } else {
            $msj = "Por favor, selecciona al menos dos eventos.";
        }
    } else {
        $msj = "Debes aceptar los términos y condiciones para continuar.";
    }
}
?>




<!-- HTML -->
<?php include '../includes/header.php'; ?>

<!-- Formulario -->
<form action="voluntarios_checkbox.php" method="POST">
    <h1>Eventos en los que se puede participar:</h1>

    <?php foreach ($listaEventos as $opcion) { ?>
        <!-- Creamos el input Checkbox -->
        <input type="checkbox" name="eventosSeleccionados[]" value="<?= htmlspecialchars($opcion) ?>" <?= (isset($_POST['eventos']) && in_array($opcion, $_POST['eventos'])) ? 'checked' : '' ?>>
        
        <!-- Ponemos el nombre de cada Opción a la derecha del Checkbox -->
        <?= $opcion ?> <br>
    <?php } ?>

    I agree to the terms and conditions: <input type="checkbox" name="terms" value="true" <?= $terms ? 'checked' : '' ?>>

    <br><br>
    <input type="submit" value="Save">
</form>

<!-- Mostramos mensaje-->
<p><?= htmlspecialchars($msj) ?></p>

<?php include '../includes/footer.php'; ?>