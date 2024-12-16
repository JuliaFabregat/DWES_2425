<!-- Ejemplo: funciones que actualizan arrays (Pag 96) -->

<?php
// Variables
$order = ['notebook', 'pencil', 'eraser'];

array_unshift($order, 'scissors');   // Añadir 'scissors' al principio
array_pop($order);  // Eliminar el último elemento

$items = implode(', ', $order);  // Convertir array en string

// Array of casses
$classes = [
    'Patchwork' => 'April 12th',
    'Knitting' => 'May 4th',
    'Lettering' => 'May 18th',
];

array_shift($classes);   // Eliminar el primer elemento

// Creamos nuevos elementos
$new = [
    'Origami' => 'June 5th',
    'Quilting' => 'June 23rd',
];

$classes = array_merge($classes, $new);   // Unir arrays, se añaden al final
?>

<!-- HTML -->
<?php include './includes/header.php'; ?>

<h1>Order</h1>
<?= $items ?>

<h1>Classes</h1>
<?php foreach($classes as $description => $date) { ?>
    <b><?= $description ?></b> <?= $date ?><br>
<?php } ?>

<?php include './includes/footer.php'; ?>