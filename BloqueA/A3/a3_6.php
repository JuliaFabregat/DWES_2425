<!-- PHP -->
<?php
    // Variables
    $us_price = 4;
    $rates = [
        'uk' => 0.81,
        'eu' => 0.93,
        'jp' => 113.21,
    ];

    // FUNCIONES LÓGICAS
    function calculate_prices($usd, $exchange_rates){
        // Variables + Cálculos
        $prices = [
            'pound' => $usd * $exchange_rates['uk'],
            'euro'  => $usd * $exchange_rates['eu'],
            'yen'   => $usd * $exchange_rates['jp'],
        ];

        // Devolvemos el valor
        return $prices;
    }

    $global_prices = calculate_prices($us_price, $rates);


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
    <title>A3_6. Funciones y tipos de datos compuestos</title>
    <link rel="stylesheet" href="../RecursosA/css/styles.css">
</head>

<body>
    <header>
        <h1><?= create_logo()?> The Candy Store</h1>
    </header>

    <h2>Chocolates</h2>
    <p>Price in US: $<?= $us_price ?></p>
    <p>
        <!-- &pound; | &euro; | &yen; : Palabras especiales de HTML para escribir símbolos -->
        (UK &pound; <?= $global_prices['pound'] ?> |
        EU &euro; <?= $global_prices['euro'] ?> |
        JP &yen; <?= $global_prices['yen'] ?>)
    </p>

    <footer>
        <?= create_logo() ?>
        <?= create_copyright_notice() ?>
    </footer>
</body>

</html>