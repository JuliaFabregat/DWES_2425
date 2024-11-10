<?php
    // VARIABLES
    $name = 'Ivy';          // Guardamos el nombre del usuario
    $greeting = 'Hello';    // Valor inicial para el saludo
    $product = 'Lollipop';  // Nombre del producto
    $cost = 10;             // Precio de cada pack/ud

    // Condición - Operador Condicional
    if ($name) { // Si el $name tiene valor
        $greeting = 'Welcome back, ' . $name; // Creamos un saludo personalizado
    }

    // Bucle for -> para aplicar los precios con descuento
    //      $i == a la cantidad de packs de caramelos
    //      $i <= 10 - comprueba si el contador es menor o igual que 10 packs de caramelos
    //      incrementamos el contador
    for ($i = 1; $i <= 20; $i++) {
        $subtotal = $cost * $i;                     // $subtotal -> precio de 1 pack * $i que es 1 pack
        $discount = ($subtotal / 100) * ($i * 4);   // $discount -> calcula el descuento que tiene esa cantidad
        $totals[$i] = $subtotal - $discount;        // $totals[$i] -> clave = valor actual del contador
                                                    //                valor = $subtotal(precio) de ese num de packs - el $discount
    }
?>

<!-- HEADER -->
<?php require 'includes/header.php'; ?>
    <!-- Mostramos el saludo y el producto a descontar -->
    <p><?= $greeting ?></p>
    <h2><?= $product ?> Discounts</h2>
    <!-- Creamos la tabla para recoger la información -->
    <table>
        <tr>
            <th>Packs</th>
            <th>Price</th>
        </tr>
        <!-- Bucle para mostrar los precios almacenados en el array que hemos creado $totals -->
        <?php foreach ($totals as $quantity => $price) { ?>
        <tr>
            <td>
                <?= $quantity ?>
                <!-- Operador ternario - Muestra pack cuando la $quantity sea 1 -->
                <!-- PACKS cuando la $quantity sea más de 1 -->
                pack<?= ($quantity === 1) ? '' : 's'; ?>
            </td>
            <td>
                <!-- Precio con descuento -->
                 $<?= $price ?>
            </td>
        </tr>
        <?php } ?>
    </table>

<!-- FOOTER -->
<?php include 'includes/footer.php' ?>