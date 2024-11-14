<!-- PHP -->
<?php
    // Variables
    $price = '4'; // Cambiamos el 4 que es un int por un string
    // Como no tenemos activados los tipos estrictos seguiremos viendo el mismo resultado
    $quantity = 3;

    // FUNCIONES LÓGICAS
    function calculate_total(int $price, int $quantity):int {
        return $price * $quantity;
    }

    // Variable para añadirlo al HTML
    $total = calculate_total($price, $quantity);


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
    <title>A3_7. Declaración y uso de tipos en funciones</title>
    <link rel="stylesheet" href="../RecursosA/css/styles.css">
</head>

<body>
    <header>
        <h1><?= create_logo()?> The Candy Store</h1>
    </header>

    <h2>Chocolates</h2>
    <p>Total: $<?= $total ?></p>

    <footer>
        <?= create_logo() ?>
        <?= create_copyright_notice() ?>
    </footer>
</body>

</html>