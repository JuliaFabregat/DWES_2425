<!--PHP-->
<?php
    // VARIABLES
    $username='Julia';
    $greeting="Bienvenid@: $username.";
    $productos=["Eyeliner", "Sombras", "Base de Maquillaje", "Rimmel"];
    $offer=[
        'item'=>'Eyeliner Sephora Collection',
        'cantidad'=>5,
        'precio_normal'=>9.99,
        'precio_descuento'=>6.99,
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
        <li><?= $productos[0] ?> Sephora Collection</li>
        <li><?= $productos[1] ?> NIX Collection</li>
        <li><?= $productos[2] ?> Maybelline</li>
        <li><?= $productos[3] ?> London Paris</li>
    </ul>

    <br>

    <h2>Oferta Eyeliner - Sephora Collection</h2>
    <p>Compra <?= $offer['cantidad'] ?> packs de <?= $offer['item'] ?> por $<?= $offer_price ?><br> (Precio sin descuento: $<?= $usual_price ?>)</p>
    <p>Y ahorra: $<?= $saving ?>!</p>
</body>
</html>