<!-- PHP -->
<?php
    // VARIABLES
    $best_sellers = ['Toffee', 'Mints', 'Fudge', 'Enchilada', 'Popcorn',];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A2_12. Bucle FOREACH 2</title>
    <link rel="stylesheet" href="../RecursosA/css/styles.css">
</head>
<body>
    <h1>The Candy Store</h1>
    <h2>Best Sellers</h2>
    <?php foreach ($best_sellers as $candy) { ?>
        <p><?= $candy ?></p>
    <?php } ?>
</body>
</html>