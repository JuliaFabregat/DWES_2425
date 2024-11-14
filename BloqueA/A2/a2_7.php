<!-- PHP -->
<?php
    // VARIABLES
    $contador = 1;
    $packs = 10;
    $price = 1.99;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A2_7. Bucle WHILE</title>
    <link rel="stylesheet" href="../RecursosA/css/styles.css">
</head>
<body>
    <h1>The Candy Store</h1>
    <h2>Prices for Multiples Packs</h2>
    <p>
        <?php
            while($contador < $packs){
                echo "$contador packs cost $$calculo";
                echo $price * $contador;
                echo '<br>';
                $contador++;
            }
        ?>
    </p>
</body>
</html>