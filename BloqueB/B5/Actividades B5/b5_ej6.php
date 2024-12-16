

<?php
// Lista de canciones inicial
$canciones = [
    "Blinding Lights" => "The Weeknd",
    "Estoy enfermo" => "Pignoise",
    "Levitating" => "Dua Lipa",
    "One more night" => "Maroon 5",
    "Feel Good Inc." => "Gorillaz"
];

// Función para eliminar canciones del inicio o del final de la lista
function eliminarCancion(&$canciones, $titulo) {
    // Obtener la primera y la última clave del array
    $primeraClave = array_key_first($canciones);
    $ultimaClave = array_key_last($canciones);

    // Mensaje por defecto
    $mensaje = "La canción '$titulo' no coincide con la primera ni la última en la lista.";

    // Verificar si el título coincide con la primera canción
    if ($primeraClave === $titulo) {
        array_shift($canciones); // Elimina la primera canción
        $mensaje = "La canción '$titulo' fue eliminada (primera posición).";
    }
    // Verificar si el título coincide con la última canción
    elseif ($ultimaClave === $titulo) {
        array_pop($canciones); // Elimina la última canción
        $mensaje = "La canción '$titulo' fue eliminada (última posición).";
    }

    return "<p>$mensaje</p>";
}
?>

<!-- HTML -->
<?php include './includes/header.php'; ?>

<h2>Lista de Canciones</h2>
<ul>
    <?php foreach ($canciones as $titulo => $artista) : ?>
        <li><?= $titulo ?> - <?= $artista ?></li>
    <?php endforeach; ?>
</ul>

<h2>Eliminar Canciones</h2>
<?= eliminarCancion($canciones, "Blinding Lights") ?>
<?= eliminarCancion($canciones, "Feel Good Inc.") ?>
<?= eliminarCancion($canciones, "Levitating") ?>

<h2>Lista de Canciones Actualizada</h2>
<ul>
    <?php foreach ($canciones as $titulo => $artista) : ?>
        <li><?= $titulo ?> - <?= $artista ?></li>
    <?php endforeach; ?>
</ul>

<?php include './includes/footer.php'; ?>
