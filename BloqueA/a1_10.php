<!--PHP-->
<?php
    // Operadores de Comparación -> Comparan 2 valores y devuelven un valor booleano
    // VARIABLES
    $item = 'Chocolate';
    $stock = 5;
    $wanted = 2;
    $can_buy = ($wanted <= $stock); // Esta condición nos dará 1 si se puede comprar y " " si no se puede comprar

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A_1.10. Usando Operadores de Comparación </title>
    <link rel="stylesheet" href="RecursosA1/css/styles.css">
</head>
<body>
    <h1>The Candy Store</h1>
    <h2>Shopping Cart</h2>
    <p> Item:       <?= $item ?></p>
    <p> Stock:      <?= $stock ?></p>
    <p> Wanted:     <?= $wanted ?></p>
    <p> Can Buy:    <?= $can_buy ?></p>
</body>
</html>