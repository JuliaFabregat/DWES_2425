<!-- Ejemplo: funciones que actualizan arrays (Pag 96) -->

<?php
// Array Order
$order = ['notebook', 'pencil', 'scissors', 'eraser', 'ink', 'washi tape'];

// Ordenar array alfabéticamente
sort($order);                       
$items = implode(', ', $order);     // Convertir array en string

// Array Classes
$classes = [
    'Patchwork' => 'April 12th',
    'Knitting' => 'May 4th',
    'Lettering' => 'May 18th',
];

// Ordenar array por clave
ksort($classes);

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