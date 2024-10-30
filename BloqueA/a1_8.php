<!--PHP-->
<?php
    // Expresiones guardadas en variables - Orden de ejecución: 1º multiplicación, luego al resultado le suma 2
    $total = 2 + 4 * 5;
    $total2 = (2 + 4) * 5;  // Aquí sí se ejecutaría primero los paréntesis, sumando y luego multiplicando
    // Unir Cadenas en una misma variable - como el + en HTML
    $greeting = 'Hola' . 'Marcos';

    // VARIABLES
    // Cambiamos los items y el coste de los items
    $items = 4;
    $cost = 6;
    $subtotal = $cost * $items;
    $tax = ($subtotal / 100) * 20;
    $total = $subtotal + $tax;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A_1.8. Operadores Aritméticos </title>
</head>
<body>
    <h1>The Candy Store</h1>
    <h2>Shopping Cart</h2>
    <p>Items: <?= $items ?></p>
    <p>Cost per pack: $<?= $cost ?></p>
    <p>Subtotal: $<?= $subtotal ?></p>
    <p>Tax: $<?= $tax ?></p>
    <p>Total: $<?= $total ?></p>
</body>
</html>