<!-- PHP -->
<?php
    // VARIABLES
    // $us_price = 4;       // Precio global del chocolate cuando solo calculábamos ese
    
    $us_item_prices = [     // Array que recoge los precios brutos de los productos en US
        'chocolates' => 4,
        'mint' => 2,
        'toffee' => 3,
        'fudge' => 5,
    ];
    
    $rates = [              // Array que recoge lo que vale cada moneda AL CAMBIO
        'uk' => 0.81,
        'eu' => 0.93,
        'jp' => 113.21,
        'aud' => 1.30,
        'cad' => 1.25,
    ];


    // FUNCIONES LÓGICAS
    function calculate_prices($usd, $exchange_rates){
        // VARIABLES + CÁLCULOS
        $prices = [         // Array que contiene todas las monedas con su cálculo al cambio
            'pound' => $usd * $exchange_rates['uk'],
            'euro'  => $usd * $exchange_rates['eu'],
            'yen'   => $usd * $exchange_rates['jp'],
            'aud'   => $usd * $exchange_rates['aud'],
            'cad'   => $usd * $exchange_rates['cad'],
        ];

        // Devolvemos el valor
        return $prices;
    }


    // VARIABLE que asignábamos a la función cuando solo calculábamos el chocolate
    // $global_prices = calculate_prices($us_price, $rates);
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
    <h1>The Candy Store</h1>

    
    <!-- Antes mostrabamos únicamente el producto CHOCOLATE, ahora lo tenemos integrado en la tabla -->
    <!-- <h2>Chocolates</h2>
    <p>Price in US: $<?= $us_price ?></p>
    <p>
        &pound; | &euro; | &yen; : Palabras especiales de HTML para escribir símbolos
        (UK &pound; <?= $global_prices['pound'] ?> |
        EU &euro; <?= $global_prices['euro'] ?> |
        JP &yen; <?= $global_prices['yen'] ?> |
        AUD $ <?= $global_prices['aud'] ?> |
        CAD $ <?= $global_prices['cad'] ?> )
    </p> -->

    <!-- Tabla que muestra los precios de varios productos -->
     <table>
        <tr>
            <!-- Cabecera de la tabla -->
            <th>Product</th>
            <th>US Price</th>
            <th>UK Price (&pound;)</th>
            <th>EU Price (&euro;)</th>
            <th>JP Price (&yen;)</th>
            <th>AUD Price ($)</th>
            <th>CAD Price ($)</th>
        </tr>

        <?php foreach ($us_item_prices as $item => $usd_price){ ?>
            <!-- Calculamos los precios convertidos usando la función -->
            <?php $converted_prices = calculate_prices($usd_price, $rates); ?>
            <tr>
                <td><?= ucfirst($item) ?></td>
                <td>$<?= $usd_price ?> USD</td>
                <td>&pound; <?= $converted_prices['pound'] ?></td>
                <td>&euro;  <?= $converted_prices['euro'] ?></td>
                <td>&yen;   <?= $converted_prices['yen'] ?></td>
                <td>AUD $   <?= $converted_prices['aud'] ?></td>
                <td>CAD $   <?= $converted_prices['cad'] ?></td>
            </tr>
        <?php } ?>
     </table>

</body>

</html>