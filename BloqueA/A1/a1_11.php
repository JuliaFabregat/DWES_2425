 <!--PHP-->
<?php
    // Operadores de Comparación -> Comparan 2 valores y devuelven un valor booleano
    // VARIABLES
    $item = 'Chocolate';
    $stock = 5;
    $wanted = 10;   // En este caso sería false porque la primera condición no se cumple
    // El cliente esta vez solo quiere 3
    $deliver = true;
    $can_buy = (($wanted <= $stock) && ($deliver == true)); // Esta condición nos dará 1 si se puede comprar y " " si no se puede comprar
    // Condición de $can_buy: ((si hay suficiente stock) Y (se puede enviar));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A_1.11. Usando operadores de comparación II</title>
    <link rel="stylesheet" href="../RecursosA/css/styles.css">
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