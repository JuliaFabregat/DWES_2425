<!--PHP-->
<?php
    $name = 'Julia';
    $favorites = ['Marshmallows', 'Chocolate', 'Toffee', 'Fudge'];

    // Forma de abreviar: 
    /*
        <?php echo $variable ?>
        <?= $variable ?>
    */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A_1.7. Abreviatura de echo </title>
</head>
<body>
    <h1>The Candy Store</h1>
    <h2>Welcome <?= $name ?></h2>
    <p>
        Your favorite type of candy is: <?= $favorites[0] ?>
    </p>
    
</html>