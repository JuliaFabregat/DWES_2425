<!-- PHP -->
<?php
    // VARIABLES
    $stock = 0;
    $ordered = 3;

    if ($stock > 0){
        $message = 'In Stock';
    } elseif ($ordered > 0){
        $message = 'Coming soon';
    } else{
        $message = 'Sold out';
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A2_4. IF...ELSEIF</title>
    <link rel="stylesheet" href="../A1/RecursosA1/css/styles.css">
</head>
<body>
    <h1>The Candy Store</h1>
    <h2>Chocolate</h2>
    <p> <?= $message ?> </p>
</body>
</html>