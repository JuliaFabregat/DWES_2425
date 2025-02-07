<!-- Actividad 3. Objeto Date Time (Pag. 65) -->
<?php
$msj = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Captamos la fecha ingresada por el usuario
    $fecha = $_POST['fecha'];

    // Intento de solución a meses en Español
    $formatter = new IntlDateFormatter(
        'es_ES',
        IntlDateFormatter::LONG,
        IntlDateFormatter::NONE,
        'Europe/Madrid',
        IntlDateFormatter::GREGORIAN
    );

    // Convertimos la fecha en un objeto datetime
    // $fecha = new DateTime();
    $fecha = date_create_from_format('Y-m-d H:i:s', $fecha);

    // Obtenemos el Timestamp de la fecha
    // $fechaTimestamp = $fecha->getTimestamp();

    $msj    =  '<br> <b>Fecha en formato Y-m-d H:i:s:</b> ' . $fecha->format('Y-m-d H:i:s') . '<br>';
    $msj    .= '<b>Timestamp correspondiente a la fecha:</b> ' . $fecha->getTimestamp() . '<br>';
    $msj    .= '<b>Fecha en formato legible:</b> ' . $formatter->format($fecha) . '<br>';
}
?>




<!-- HTML -->
<?php include '../includes/header.php' ?>

<h1>Formatos de fechas</h1>
<!-- El usuario ingresa la fecha -->
<form action="index.php" method="post">
    <label for="fecha">Ingrese la fecha en formato (Y-m-d H:i:s):</label>
    <input type="text" name="fecha" id="fecha">
    <input type="submit" value="Enviar">
</form>

<!-- Mostramos las fechas en diferentes formatos -->
<?= $msj ?>

<?php include '../includes/footer.php' ?>