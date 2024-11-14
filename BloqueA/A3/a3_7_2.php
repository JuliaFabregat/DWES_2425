<?php declare(strict_types=1);
    //Variables
    $price = 4.5;   // Ahora que tenemos activados los tipos estrictos sí nos daria error en el string
    $quantity = 3;

    // Funciones
    // Como le indicamos que puede ser un int o float nos permite que $price sea 4.5
    function calculate_total(float $price, int $quantity): int|float { // Podemos establecer 1 o más tipos de datos válidos
        return $price * $quantity;
    }

    // Variable para añadirlo al HTML
    $total = calculate_total($price, $quantity);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A3_7.2. Habilitación de tipos estrictos</title>
    <link rel="stylesheet" href="../RecursosA/css/styles.css">
</head>

<body>
    <header>
        <h1>The Candy Store</h1>
    </header>

    <h2>Chocolates</h2>
    <p>Total: $<?= $total ?></p>

</body>

</html>