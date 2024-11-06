<!-- PHP -->
<?php
    // VARIABLES
    $products = [
        'Toffee' => 2.99,
        'Mints' => 1.99,
        'Fudge' => 3.49,
        'Enchiladas' => 4.99,
        'Popcorn' => 3.99,
    ];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A2_11. Bucle FOREACH</title>
    <link rel="stylesheet" href="../A1/RecursosA1/css/styles.css">
</head>
<body>
    <h1>The Candy Store</h1>
    <h2>Price List</h2>
    <table>
        <tr>
            <th>Item</th>
            <th>Price</th>
        </tr>

        <?php foreach($products as $item => $price) { ?>
            <tr>
                <td> <?= $item ?> </td>
                <td> $ <?= $price ?> </td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>