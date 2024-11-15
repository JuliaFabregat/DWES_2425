<!-- PHP -->
<?php
    // VARIABLES + Arrays
    // Lista de productos
    $products = [
        ["name" => "Dark Chocolate", "cost" => 5, "quantity" => 10, "discount" => 5, "tax" => 0],
        ["name" => "Milk Chocolate", "cost" => 3, "quantity" => 4, "discount" => 0, "tax" => 0],
        ["name" => "White Chocolate", "cost" => 4, "quantity" => 15, "discount" => 20, "tax" => 5],
        ["name" => "Milka Chocolate", "cost" => 7, "quantity" => 5, "discount" => 10, "tax" => 2.1],
        ["name" => "Oreo Chocolate", "cost" => 6, "quantity" => 3, "discount" => 0, "tax" => 0.21],
    ];

    // FUNCIONES
    // $discount = 0 : es opcional, ya que tiene un valor por defecto de 0
    function calculate_cost($cost, $quantity, $discount = 0, $tax = 0){
        $cost = $cost * $quantity;

        return ($cost + $tax) - $discount;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A3_9. Parametros opcionales y valores por defecto</title>
    <link rel="stylesheet" href="../RecursosA/css/styles.css">
</head>
<body>
    <h1>The Candy Store</h1>
    <h2>Chocolates</h2>

    <!-- <p>Dark chocolate $<?= calculate_cost(5, 10, 5) ?></p>
    <p>Milk chocolate $<?= calculate_cost(3, 4) ?></p>
    <p>White chocolate $<?= calculate_cost(4, 15, 20, 5) ?></p>
    <p>Milka chocolate $<?= calculate_cost(7, 5, 10, 2.1) ?></p>
    <p>Oreo chocolate $<?= calculate_cost(6, 3, 0, 0.21) ?></p> -->

    <!-- Tabla -->
    <table>
        <tr>
            <th>Product</th> <th>Cost</th> <th>Quantity</th> <th>Discount</th> <th>Taxes</th> <th>Total</th>
        </tr>

        <!-- Bucle para imprimir los datos -->
        <?php foreach($products as $itemInfo) { ?>
            <tr>
                <td><?= $itemInfo['name']; ?></td>
                <td><?= $itemInfo['cost']; ?></td> 
                <td><?= $itemInfo['quantity']; ?></td> 
                <td><?= $itemInfo['discount']; ?></td> 
                <td><?= $itemInfo['tax']; ?></td>
                <td>$<?= number_format(calculate_cost(cost: $itemInfo['cost'], quantity: $itemInfo['quantity'], discount:$itemInfo['discount'], tax:$itemInfo['tax']), 2) ?></td>
                <!-- Podemos utilizar los propios datos del array para pasarlos como parámetros -->
            </tr>
        <?php } ?>
    </table>
</body>
</html>