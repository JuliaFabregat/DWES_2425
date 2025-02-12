<?php
$msj = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Captamos la fecha ingresada por el usuario con la zona horaria seleccionada
    $fechaInput = $_POST['fechaEvento'];
    $zonaHorariaInput = $_POST['zonaHoraria'];
    
    $fechaEvento = DateTime::createFromFormat('Y-m-d H:i:s', $fechaInput, new DateTimeZone($zonaHorariaInput));
    
    if ($fechaEvento) {
        // Definir zonas horarias de destino
        $zonas = [
            'America/New_York' => 'Nueva York',
            'Asia/Tokyo' => 'Tokio'
        ];
        
        $msj = '<h3>Detalles del evento:</h3>';
        $msj .= "<p><b>Fecha original:</b> " . $fechaEvento->format('Y-m-d H:i:s') . " ({$zonaHorariaInput})</p>";
        
        // Mostrar la fecha en cada zona horaria
        foreach ($zonas as $tz => $ciudad) {
            $fechaConvertida = clone $fechaEvento;
            $fechaConvertida->setTimezone(new DateTimeZone($tz));
            
            $infoZona = new DateTimeZone($tz);
            $transiciones = $infoZona->getTransitions($fechaEvento->getTimestamp(), $fechaEvento->getTimestamp());
            $offset = $infoZona->getOffset($fechaEvento);
            
            $msj .= "<h3>Zona Horaria: {$ciudad}</h3>";
            $msj .= "<p><b>Ubicación:</b> {$tz}</p>";
            $msj .= "<p><b>Offset UTC:</b> " . ($offset / 3600) . " horas</p>";
            $msj .= "<p><b>Fecha convertida:</b> " . $fechaConvertida->format('Y-m-d H:i:s') . "</p>";
            
            if (!empty($transiciones)) {
                $msj .= "<p><b>Transición de horario de verano:</b> " . $transiciones[0]['abbr'] . "</p>";
            }
        }

        // Crear eventos recurrentes cada semana
        $intervalo = new DateInterval('P1W');
        $periodo = new DatePeriod($fechaEvento, $intervalo, 4); // 4 eventos (1 mes de duración)
        
        $msj .= "<h3>Lista de Eventos Recurrentes:</h3>";
        foreach ($periodo as $evento) {
            $msj .= "<p><b>Evento:</b> " . $evento->format('l, M j, Y H:i') . " ({$zonaHorariaInput})</p>";
        }
    } else {
        $msj = "<p>Formato de fecha incorrecto. Use el formato: (YYYY-MM-DD HH:MM:SS)</p>";
    }
}

?>

<!-- HTML -->
<?php include '../includes/header.php' ?>

<h1>Crear Evento y Convertir Zonas Horarias</h1> <br>

<form action="index.php" method="post">
    <label for="fechaEvento">Ingrese la fecha y hora del evento (Y-m-d H:i:s): </label>
    <input type="text" name="fechaEvento" id="fechaEvento" required>
    <br><br>
    <label for="zonaHoraria">Seleccione la zona horaria: </label>
    <select name="zonaHoraria" id="zonaHoraria">
        <option value="Europe/Madrid">Madrid (CET)</option>
        <option value="America/New_York">Nueva York (EST)</option>
        <option value="Asia/Tokyo">Tokio (JST)</option>
    </select>
    <br><br>
    <input type="submit" value="Crear Evento">
</form>

<?= $msj ?>

<?php include '../includes/footer.php' ?>
