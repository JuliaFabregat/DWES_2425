<!--PHP-->
<?php
    $nutrition = [
        'fat' => 38,
        'sugar' => 51,
        'salt' => 0.25,
    ];
    // Actualizamos el valor de fat y añadimos fiber + valor
    $nutrition['fat'] = 36;
    $nutrition['fiber'] = 2.1;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A_1.5. Modificando valores almacenados en arrays </title>
    <link rel="stylesheet" href="../RecursosA/css/styles.css">
</head>
<body>
    <h1>The Candy Store</h1>
    <h2>Nutrition (per 100g)</h2>
    <p>Fat:     <?php echo $nutrition['fat']; ?>%</p>
    <p>Sugar:   <?php echo $nutrition['sugar']; ?>%</p>
    <p>Salt:    <?php echo $nutrition['salt']; ?>%</p>
    <p>Fiber:   <?php echo $nutrition['fiber']; ?>%</p>
</body>
</html>