<!-- Actividad 5. Eventos Programados (Pag. 90) -->
<?php
$msj = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Captamos las fechas ingresadas por el usuario
    $fechaInicioPOST = DateTime::createFromFormat('Y-m-d H:i:s', $_POST['fechaInicio']);
    $fechaFinPOST = DateTime::createFromFormat('Y-m-d H:i:s', $_POST['fechaFin']);

    if($fechaInicioPOST && $fechaFinPOST){
        // Creamos el intervalo de 1 semana
        $intervalo = new DateInterval('P1W');
        $periodo = new DatePeriod($fechaInicioPOST, $intervalo, $fechaFinPOST);

        // Calcular la duración de cada intervalo
        $duracion = $fechaInicioPOST->diff($fechaFinPOST);
        $msj = '<h3>Eventos:</h3>';
        $msj .= "<p><b>Duración total:</b> {$duracion->days} días.</p>";

        // Creamos la lista de eventos
        $msj .= "<h3>Lista de Eventos programados:</h3>";
        foreach ($periodo as $evento) {
            $msj .= "<p><b>" . $evento->format('l') . "</b><br>" . $evento->format('M j, Y H:i') . "</p>";
        }
    } else{
        $msj = "<p>Formato de fecha incorrecto. (Year-Month-Day HH:MM:SS)</p>";
    }
}
?>




<!-- HTML -->
<?php include '../includes/header.php' ?>

<h1>Eventos Programados</h1> <br>

<!-- El usuario ingresa la fecha -->
<form action="index.php" method="post">
    <label for="fecha">Ingrese la fecha y hora del Inicio del Evento (Y-m-d H:i:s): </label>
    <input type="text" name="fechaInicio" id="fechaInicio">
    <br> <br>
    <label for="fecha">Ingrese la fecha y hora del Final del Evento (Y-m-d H:i:s): </label>
    <input type="text" name="fechaFin" id="fechaFin">
    <br> <br>
    <input type="submit" value="Enviar">
</form>

<!-- Mostramos la lista de eventos -->
<?= $msj ?>

<?php include '../includes/footer.php' ?>