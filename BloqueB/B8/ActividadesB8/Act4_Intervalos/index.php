<!-- Actividad 4. Intervalos (Pag. 78) -->
<?php
$msj = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Captamos las fechas ingresadas por el usuario y la fecha Actual
    $fechaInicio = new DateTime($_POST['fechaInicio']);
    $fechaFin = new DateTime($_POST['fechaFin']);
    $fechaActual = new DateTime();

    // Contador de tiempo para que empiece el evento
    if($fechaActual < $fechaInicio){
        // Creamos el contador
        $contador = $fechaActual->diff($fechaInicio);
        $msj = "<br> <b>Quedan</b> " . $contador->format('%a días, %h horas, %i minutos') . " <b>para que comience el evento.</b> <br>";
    } else {
        $msj = "<br> <b>El evento ya ha comenzado</b> <br>";
    }

    // 2. Usar DateInterval() para calcular la duración entre fechaInicio y fechaFin
    $duracionTotal = $fechaInicio->diff($fechaFin); // diff() devuelve un objeto DateInterval

    // 3. Formatear la duración en "X días, Y horas, Z minutos"
    $msj .= "<br> <b>Duración del evento:</b> " . $duracionTotal->format('%a días, %h horas, %i minutos') . "<br>";

    // 4. Calcular el tiempo total en horas y minutos
    $horasTotales = ($duracionTotal->days * 24) + $duracionTotal->h;
    $msj .= "<br> <b>Duración total en horas y minutos:</b> {$horasTotales} horas, {$duracionTotal->i} minutos <br>";
}
?>




<!-- HTML -->
<?php include '../includes/header.php' ?>

<h1>Intervalos</h1> <br>

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

<!-- Mostramos el intervalo entre ellas -->
<?= $msj ?>

<?php include '../includes/footer.php' ?>