<!-- PHP -->
<?php
    // VARIABLES
    $name = '';
    $greeting = 'Hello';

    // Condición
    if($name !== ''){
        $greeting = "Welcome back, $name";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A2_1. Sentencia IF</title>
    <link rel="stylesheet" href="../A1/RecursosA1/css/styles.css">
</head>
<body>
    <h1>The Candy Store</h1>
    <h2><?= $greeting ?></h2>
</body>
</html>