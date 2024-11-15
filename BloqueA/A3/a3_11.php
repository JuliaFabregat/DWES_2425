<?php declare(strict_types=1);

    // VARIABLES
    $tax = 20;
    // Array de productos
    $candy = [
        'Toffee' => ['price' => 3.00, 'stock' => 12],
        'Mints' => ['price' => 2.00, 'stock' => 26],
        'Fudge' => ['price' => 4.00, 'stock' => 8],
    ];

    // FUNCIONES
    function get_reorder_message(int $stock): string {
        return ($stock < 10) ? 'Yes' : 'No';
    }

    function get_total_value(float $price, int $quantity): float{
        return $price * $quantity;
    }

    function get_tax_due(float $price, int $quantity, int $tax = 0): float{
        return ($price * $quantity) * ($tax / 100);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A3_11. Ejemplo final</title>
    <link rel="stylesheet" href="../RecursosA/css/styles.css">
</head>
<body>
    <h1>The Candy Store</h1>
    <h2>Stock Control</h2>
    <table>
        <tr>
            <th>Candy</th><th>Stock</th><th>Re-order?</th><th>Total value</th><th>Tax due</th>
        </tr>
        
        <!-- Bucle para imprimir los datos -->
        <?php foreach ($candy as $product_name => $data) { ?>
            <tr>
                <td> <?= $product_name ?></td>
                <td> <?= $data['stock'] ?></td>
                <td> <?= get_reorder_message($data['stock']) ?></td>
                <td>$<?= get_total_value($data['price'], $data['stock']) ?></td>
                <td>$<?= number_format(get_tax_due($data['price'], $data['stock'], $tax), 2) ?></td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>