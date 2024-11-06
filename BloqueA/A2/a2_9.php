<!-- PHP -->
<?php
    // VARIABLES
    $price = 2.99;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A2_9. Bucle FOR</title>
    <link rel="stylesheet" href="../A1/RecursosA1/css/styles.css">
</head>
<body>
    <h1>The Candy Store</h1>
    <h2>Prices for Multiple Packs</h2>
    <p>
        <?php
            for ($i = 1; $i <= 20; $i++) {
                echo $i;
                echo ' packs cost $';
                echo $price * $i;
                echo '<br>';
            }
        ?>
    </p>
</body>
</html>