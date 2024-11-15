<?php declare(strict_types=1);

    // VARIABLES
    $tax_rate = 12;
    // Array de libros
    $inventory = [
        'libro1' => ['titulo' => 'Nacidos de la bruma', 'precio' => 10.99, 'stock' => 20],
        'libro2' => ['titulo' => 'El pozo de la ascensión', 'precio' => 12.95, 'stock' => 10],
        'libro3' => ['titulo' => 'El héroe de las eras', 'precio' => 14.95, 'stock' => 5],
        'libro4' => ['titulo' => 'Aleación de Ley', 'precio' => 19.85, 'stock' => 0],   // Libro sin Stock para comprobar que sale todo 0
    ];

    // FUNCIONES
    function get_total_stock(array $inventory){
        // Variables
        $totalLibros = 0;

        // Bucle para sumar el Stock
        foreach($inventory as $book){
            $totalLibros += $book['stock'];
        }

        return $totalLibros;    // Total de libros en el inventario
    }

    function get_inventory_value(float $price, int $stock): float{
        return $price * $stock;
    }

    function calculate_tax(float $valorTotalInventory, float $tax = 0): float{
        return $valorTotalInventory * ($tax / 100);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A3_12. Actividad Final - JuliaPF</title>
    <link rel="stylesheet" href="../RecursosA/css/styles.css">
</head>
<body>
    <h1>The Book Shop</h1>
    <table>
        <tr>
            <th>Book Name</th> <th>Price</th> <th>Stock</th> <th>Total Inventory Value</th> <th>Tax</th>
        </tr>

        <!-- Bucle para imprimir los datos -->
        <?php foreach ($inventory as $book => $infoBook) { ?>
            <tr>
                <td> <?= $infoBook['titulo'] ?></td>
                <td> <?= $infoBook['precio'] ?></td>
                <td> <?= $infoBook['stock'] ?></td>
                <td>$<?= $total = get_inventory_value($infoBook['precio'], $infoBook['stock']) ?></td>
                <td>$<?= number_format(calculate_tax($total, 4), 2) ?></td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>