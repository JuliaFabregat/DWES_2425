<!-- PHP -->
<?php
    // VARIABLES
    $packs = 10;
    $price = 2.99;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A2_8. Bucle DO-WHILE</title>
    <link rel="stylesheet" href="../RecursosA/css/styles.css">
</head>
<body>
    <h1>The Candy Store</h1>
    <h2>Prices for Multiples Packs</h2>
    <p>
        <?php
            do{
                echo "$packs packs cost $";
                echo $price * $packs;
                echo '<br>';
                $packs--;
            }while($packs > 0);
        ?>
    </p>
</body>
</html>