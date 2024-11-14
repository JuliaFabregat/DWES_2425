<?php
    // VARIABLES
    $name = 'Carlos';           // Guardamos el nombre del usuario
    $greeting = 'Hi';           // Saludo
    $membership_cost = 40;      // Precio 1 mes de membresía, la vida está cara

    // Condición - Operador Condicional
    if ($name) { // Si el $name tiene valor
        $greeting = "<br>Welcome to Sports-lag, $name!"; // Creamos un saludo personalizado
    }

    // Bucle for -> para aplicar los precios con descuento
    for ($months = 1; $months <= 12; $months++) {
        $subtotal = $membership_cost * $months;             // Precio del primer mes sin descuento
        $percentDiscount = min(($months - 1) * 5, 50);      // Descuento máximo del 50%
        $discount = ($percentDiscount / 100) * $subtotal;   // Descuento de cada producto
        $priceWithDiscount = $subtotal - $discount;        // Precio final con el descuento aplicado
        $finalPrices[$months] = [$priceWithDiscount, $discount, $subtotal]; // Guardamos el precio final en el array de precios
    }
?>

<!-- HEADER -->
<?php require 'includes/header.php'; ?>

    <!-- Mostramos el saludo y el producto a descontar -->
    <p><?= $greeting ?></p>
    <h2>Memberships & Discounts</h2>
    <!-- Creamos la tabla para recoger la información -->
    <table>
        <tr>
            <th>Duration (months)</th>
            <th>Price</th>
            <!-- Añadir columna del ahorro -->
            <th>Save</th>
            <!-- Añadir columna del precio sin descuento -->
            <th>Without Discount</th>
        </tr>
        <!-- Bucle para mostrar los precios almacenados en el array $precios -->
        <!-- $meses es la CLAVE y $precioMensual es el VALOR-->
        <?php foreach ($finalPrices as $months => $prices) { ?>
            <tr>
                <td>
                    <!-- Nº del mes, ya que es la CLAVE del array -->
                    <?= $months ?>
                    <!-- Operador ternario - Identifica si es 1 o más meses -->
                    month<?= ($months === 1) ? '' : 's'; ?>
                </td>

                <!-- Precio con descuento: $precioConDescuento -->
                <td> $<?= $prices[0]; ?> </td>
                
                <!-- Cantidad que te ahorras: $discount -->
                <td> $<?= $prices[1]; ?> </td>

                <!-- Precio sin descontar nada: $subtotal
                        number_format($prices[2], 2): Elegir num. decimales a redondear-->
                <td> $<?= $prices[2]; ?> </td>

            </tr>
        <?php } ?>

    </table>

<!-- FOOTER -->
<?php include 'includes/footer.php' ?>