<?php //declare(strict_types=1);
    // VARIABLES
    //$stock = 25;    // Stock de Chocolate

    // Array para la stock de X productos
    $stock_items = [
        'chocolate' => 25,
        'mint' => 5,
        'toffee' => 15,
        'fudge' => 10,
    ];

    // Funciones
    function get_stock_messsage($stock){
        // Variables
        $msg = "";

        // Condicional
        if($stock == 10){
            $msg = 'Exactly 10 items in stock';
        } else if($stock > 10){
            $msg = 'Good availability';
        } else if ($stock > 0 && $stock < 10){
            $msg = 'Low stock';
        } else {
            $msg = 'Out of stock';
        }

        // Devuelve el mensaje al final
        return $msg;
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A3_8. Retornos múltiples y valores por defecto</title>
    <link rel="stylesheet" href="../RecursosA/css/styles.css">
</head>

<body>

    <h1>The Candy Store</h1>
    <!-- Tabla para recoger los precios de cada producto -->
    <table>
        <tr>
            <!-- Encabezado de la tabla -->
            <th>Product</th>
            <th>Stock</th>
        </tr>

        <!-- Filas y columnas generadas dinámicamente con el bucle: -->
        <?php foreach ($stock_items as $item => $stock) { ?>
            <tr>
                <td><?= ucfirst($item) ?></td>  <!-- Nombre del producto con la primera letra en mayúsculas -->
                <td><?= get_stock_messsage($stock) ?> (<?= $stock ?>)</td>  <!-- Mensaje de stock y cantidad -->
            </tr>
        <?php } ?>

        <!-- Forma larga: -->
        <!-- <tr>
            <td>Chocolate</td>
            <td><?= get_stock_messsage($stock_items['chocolate'])?> (<?= $stock_items['chocolate'] ?>)</td>
        </tr> -->

    </table>

    <!-- <p><?= get_stock_messsage($stock) ?></p> -->

</body>

</html>