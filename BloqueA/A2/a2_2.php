<!-- PHP -->
<?php
    // VARIABLES    
    $stock = 0;

    // Condición
    if($stock > 0){
        $message = 'In stock';
    } else{
        $message = 'More stock coming soon';
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A2_2. IF...ELSE</title>
    <link rel="stylesheet" href="../RecursosA/css/styles.css">
</head>
<body>
    <h1>The Candy Store</h1>
    <h2>Chocolate</h2>
    <p> <?= $message ?> </p>
</body>
</html>