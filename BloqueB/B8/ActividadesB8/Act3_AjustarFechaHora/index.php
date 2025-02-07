<!-- Actividad 3. Objeto Date Time (Pag. 65) -->
<?php
// Fecha del evento original
$fechaEvento = new DateTime('2024-10-16 15:30:00');

// Clonamos la fecha para manipularla - Actualizamos fecha con setDate() y setTime()
$fechaActualizada = clone $fechaEvento;
$fechaActualizada->setDate(2025, 02, 07);
$fechaActualizada->setTime(9,59,50);

// Clonamos + Ajustamos la fecha del evento a partir de un timestamp
$fechaAct2 = clone $fechaEvento;
$fechaAct2->setTimestamp(strtotime('2024-03-03'));

// Clonamos + Modificamos la fecha usando modify() para sumar o restar días y horas
$fechaAct3 = clone $fechaEvento;
$fechaAct3->modify('+15 day' . '+2 hours');
?>




<!-- HTML -->
<?php include '../includes/header.php' ?>

<h1>Formatos de fechas</h1>

<p><b>Fecha del evento Original: </b> <?= $fechaEvento->format('Y-m-d H:i:s') ?></p>
<p><b>Fecha del evento Actualizada con setDate() y setTime(): </b> <?= $fechaActualizada->format('Y-m-d H:i:s') ?></p>
<p><b>Fecha del evento Actualizada con setTimestamp(): </b> <?= $fechaAct2->format('Y-m-d H:i:s') ?></p>
<p><b>Fecha del evento Actualizada con modify(): </b> <?= $fechaAct3->format('Y-m-d H:i:s') ?></p>

<?php include '../includes/footer.php' ?>