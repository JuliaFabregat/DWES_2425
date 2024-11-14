<!-- PHP -->
<?php
    // Variables
    $tax = '25';    // Actualizamos de 20 a 25 pero no actualiza el cáculo de la función

    // FUNCIONES LÓGICAS
    function calculate_total($price, $quantity){
        // Cálculos
        $cost = $price * $quantity; // Sacamos el precio sin IVA
        // Para que la variable de tax se actualice aquí debemos de cambiar el 20 por 25, ya que son independientes
        $tax = $cost * (25/100);    // Sacamos el IVA de ese precio
        $total = $cost + $tax;      // Le sumamos al precio final el IVA de ese producto

        return $total;
    }


    // FUNCIONES ESTÉTICAS
    function create_logo(){
        return '<img src="./../RecursosA/img/logo.png" alt="logo" width="50" height="auto"/>';
    }

    function create_copyright_notice(){
        // Variables
        $year = date('Y');
        $message = '&copy; ' . $year . '<i>The Candy Store</i>';

        return $message;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A3_4. Global and Local Scope</title>
    <link rel="stylesheet" href="../RecursosA/css/styles.css">
</head>

<body>
    <header>
        <h1><?= create_logo()?> The Candy Store</h1>
    </header>

    <p>Mints: $<?= calculate_total(2,5) ?></p>
    <p>Toffee: $<?= calculate_total(3,5) ?></p>
    <p>Fudge: $<?= calculate_total(5,4) ?></p>
    <p>Chew-gum: $<?= calculate_total(1.50, 4) ?></p>

    <p>Prices inlcude tax at: <?= $tax ?></p>

    <footer>
        <?= create_logo() ?>
        <?= create_copyright_notice() ?>
    </footer>
</body>

</html>