<!--PHP-->
<?php 
    // Asignamos un nombre a la variable Name
    $name = 'Julia';
    // Ahora le asignamos otro nombre, sobreescribiendo el anterior y quedándonos con Ana
    $name = 'Ana';

    $price = 5;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A_1.2. Actualizando el valor de una variable</title>
    <link rel="stylesheet" href="../RecursosA/css/styles.css">
</head>
<body>
    <h1>The Candy Store</h1>
    <h2>Welcome <?php echo $name; ?></h2>
    <p>The cost of your candy is
        $<?php echo $price; ?> per pack.
    </p>

</body>
</html>