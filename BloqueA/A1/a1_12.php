 <!--PHP-->
 <?php
    // VARIABLES
    $username='Julia';
    $greeting="Hi, $username";
    $offer=[
        'item'=>'Chocolate',
        'cantidad'=>3,
        'precio_normal'=>6,
        'precio_descuento'=>4,
    ];

    // Calcular el precio usual sin descuento
    $usual_price= $offer['cantidad'] * $offer['precio_normal'];
    // Calcular el precio de los artículos con el descuento aplicado
    $offer_price= $offer['cantidad'] * $offer['precio_descuento'];
    // Calcular el ahorro total
    $saving = $offer['precio_normal'] - $offer['precio_descuento'];
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A_1.12. Creación de una página PHP básica</title>
    <link rel="stylesheet" href="../RecursosA/css/styles.css">
</head>
<body>
    <h1>The Candy Store</h1>
    <h2>Multi-buy Offer</h2>
    <p><?= $greeting ?></p>
    <p class="sticker">Save $<?= $saving ?></p>
    <p>Buy <?= $offer['cantidad'] ?> packs of <?= $offer['item'] ?> for $<?= $offer_price ?><br> (usual price: $<?= $usual_price ?>)</p>
</body>
</html>