<!--PHP-->
<?php
    // VARIABLES
    $username='Julia';
    $greeting="Bienvenid@: $username.";
    $productos=["Eyeliner", "Sombras", "Base de Maquillaje", "Rimmel"];
    $precios=[
        'Eyeliner'=>9.99,
        'Sombras'=>11.99,
        'Base'=>6.99,
        'Rimmel'=> 12.99,
    ];
    $offer=[
        'item'=>'Eyeliner Sephora Collection',
        'cantidad'=>5,
        'precio_normal'=>9.99,
        'precio_descuento'=>6.99,
        'stock'=>5,
    ];

    // Calcular el precio usual sin descuento
    $usual_price= $offer['cantidad'] * $offer['precio_normal'];
    // Calcular el precio de los artículos con el descuento aplicado
    $offer_price= $offer['cantidad'] * $offer['precio_descuento'];
    // Calcular el ahorro total
    $saving = $usual_price - $offer_price;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A_1.13. Actividad propuesta final</title>
    <link rel="stylesheet" href="RecursosA1/css/styles.css">
</head>
<body>
    <h1>Sephora</h1>
    <p><?= $greeting ?></p>
    <h2>Lista de productos:</h2>
    <ul>
        <li><?= $productos[0] ?> Sephora Collection:  <?= $precios['Eyeliner']?>€</li>
        <li><?= $productos[1] ?> NIX Collection:  <?= $precios['Sombras']?>€</li>
        <li><?= $productos[2] ?> Maybelline:  <?= $precios['Base']?>€</li>
        <li><?= $productos[3] ?> London Paris:  <?= $precios['Rimmel']?>€</li>
    </ul>

    <br>

    <h2>Oferta Eyeliner - Sephora Collection</h2>
    <p>Compra <?= $offer['cantidad'] ?> unidades de <?= $offer['item'] ?> por $<?= $offer_price ?><br> (Precio sin descuento: $<?= $usual_price ?>)</p>
    <p>Y ahorra: $<?= $saving ?>!</p>

    <br>

    <h2>Productos de oferta en stock: <?= $offer['stock']?></h2>

</body>
</html>