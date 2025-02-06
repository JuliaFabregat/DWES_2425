<!-- Actividad 1. Funciones de Fecha (Pag. 41) -->
<?php
// Variables
$msj = '';

// Fecha Actual
$fechaActual = time();
$fechaActual_DT = new DateTime();
$fechaFormateadaActual = date('l, d M Y',$fechaActual); // Usamos el Date para formatear la salida

// Fecha Inicio del Evento
$fechaInicio = strtotime('2025-02-08');     // Una fecha que esté en el futuro
$fechaInicioFormat = date('l, d M Y',$fechaInicio);

$inicioDT = new DateTime('@' . $fechaInicio);

// Fecha Finalización del Evento
$fechaFinalizacion = mktime(23,59, 99, 2, 10, 2025);  // Especificando manualmente: Día, Mes y Año
$fechaFinalFormat = date('l, d M Y',$fechaFinalizacion);

$finalizacionDT = new DateTime('@' . $fechaFinalizacion);


// 3. Mostrar cuenta regresiva
// - Cuantos días faltan para que inicie el evento
$tiempoInicioEvento = $fechaActual_DT->diff($inicioDT);

// - Cuantos días faltan para que termine el evento desde la fecha actual
$tiempoFinalizacionEvento = $fechaActual_DT->diff($finalizacionDT);

// 4. Mensajes Condicionales - Usamos las fechas NO convertidas para poder comparar
if ($fechaActual < $fechaInicio) {
    // - Si la fecha actual es anterior al inicio del evento, mensaje que dice cuántos días quedan para que empiece
    $msj = "Faltan " . $tiempoInicioEvento->days . " día/s para que comience el evento.";
} elseif ($fechaActual < $fechaFinalizacion){
    // - Si la fecha actual está entre el inicio y el final, mostrar que el evento está en curso
    $msj = "El evento está en curso y quedan " . $tiempoFinalizacionEvento->days . "día/s.";
} else{
    // - Si el evento ha finalizado, mostrar que ha finalizado
    $msj = "El evento ya ha finalizado.";
}
?>




<!-- HTML -->
<?php include '../includes/header.php' ?>

<h1>Mega Evento Estupefantástico</h1>

<h3>Datos:</h3>

<p><b>Hora actual:</b> <?= $fechaActual ?></p>

<p><b>Hora actual (Formateada):</b> <?= $fechaFormateadaActual ?></p>

<p><b>Fecha de Inicio del evento:</b> <?= $fechaInicioFormat ?></p>

<p><b>Fecha de Finalización del evento:</b> <?= $fechaFinalFormat ?></p>

<p><b>Tiempo restante para que comience el evento:</b> <?= $tiempoInicioEvento->format('%R%a días') ?></p>

<p><b>Tiempo restante para el final del evento:</b> <?= $tiempoFinalizacionEvento->format('%R%a días') ?></p> <br>

<h1>Estado del evento</h1>
<p><?= $msj ?></p>

<?php include '../includes/footer.php' ?>