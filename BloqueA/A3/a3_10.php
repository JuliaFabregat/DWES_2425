<!-- PHP -->
<?php
    // Lista de productos
    $products = [
        ["name" => "Dark Chocolate", "cost" => 5, "quantity" => 10, "discount" => 2, "tax" => 5, "shipping" => "Yes"],
        ["name" => "Milk Chocolate", "cost" => 5, "quantity" => 10, "discount" => 0, "tax" => 5, "shipping" => "Yes"],
        ["name" => "White Chocolate", "cost" => 10, "quantity" => 5, "discount" => 0, "tax" => 5, "shipping" => "Soon"],
        ["name" => "Milka Chocolate", "cost" => 7, "quantity" => 5, "discount" => 10, "tax" => 2.1, "shipping" => "No"],
        ["name" => "Oreo Chocolate", "cost" => 6, "quantity" => 3, "discount" => 0, "tax" => 0.21, "shipping" => "No"],
    ];

    // FUNCIONES
    // Como hemos dicho, las variables igualadas son opcionales, ya que ya tienen valor por defecto
    function calculate_cost($cost, $quantity, $discount = 0, $tax = 20, $shipping = 0,){
        $cost = $cost * $quantity;
        $tax = $cost * ($tax / 100);

        return ($cost + $tax) - $discount;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A3_10. Argumentos con nombre</title>
    <link rel="stylesheet" href="../RecursosA/css/styles.css">
</head>
<body>
    <h1>The Candy Store</h1>
    <h2>Chocolates</h2>
    <!-- Al ser algumentos con nombre pueden ser nombrados en cualquier orden
    <p>Dark chocolate $<?= calculate_cost(quantity: 10, cost: 5, tax: 5, discount: 2) ?></p>
    <p>Milk chocolate $<?= calculate_cost(quantity: 10, cost: 5, tax: 5) ?></p>
    - Podemos mezclar ambos tipos de argumentos
    <p>White chocolate $<?= calculate_cost(5, 10, tax: 5) ?></p>
    <p>Milka chocolate $<?= calculate_cost(7, 5, tax: 2.1, discount:10) ?></p>
    <p>Oreo chocolate $<?= calculate_cost(6, 3, 0, 0.21) ?></p> -->

    <!-- Tabla para mostrar los costes calculados -->
    <table>
        <tr>
            <th>Product</th> <th>Cost</th> <th>Quantity</th> <th>Discount</th> <th>Taxes</th> <th>Shipping</th> <th>Total</th>
        </tr>

        <!-- Bucle para imprimir los datos -->
        <?php foreach($products as $itemInfo) { ?>
            <tr>
                <td><?= $itemInfo['name']; ?></td>
                <td><?= $itemInfo['cost']; ?></td> 
                <td><?= $itemInfo['quantity']; ?></td> 
                <td><?= $itemInfo['discount']; ?></td> 
                <td><?= $itemInfo['tax']; ?></td>
                <td><?= $itemInfo['shipping']; ?></td>
                <td>$<?= number_format(calculate_cost(cost: $itemInfo['cost'], quantity: $itemInfo['quantity'], discount:$itemInfo['discount'], tax:$itemInfo['tax']), 2) ?></td>
                <!-- Podemos utilizar los propios datos del array para pasarlos como parámetros -->
            </tr>
        <?php } ?>
    </table>
</body>
</html>