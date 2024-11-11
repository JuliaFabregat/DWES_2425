<?php
    // VARIABLES
    $name = 'Carlos';           // Guardamos el nombre del usuario
    $greeting = 'Hi';           // Saludo
    $membership_cost = 40;      // Precio 1 mes de membresía

    // Condición - Operador Condicional
    if ($name) { // Si el $name tiene valor
        $greeting = "Welcome to Sports-lag, $name!"; // Creamos un saludo personalizado
    }

    // Bucle for -> para aplicar los precios con descuento
    for ($months = 1; $months <= 12; $months++) {
        $subtotal = $membership_cost * $months;             // Precio del primer mes sin descuento
        $discount = min(($months - 1) * 5, 50);             // Descuento máximo del 50%
        $precioFinal = $subtotal * (1 - $discount / 100);   // Aplica el descuento
        $precios[$months] = $precioFinal;                   // Guardamos el precio final en el array de precios
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
        </tr>
        <!-- Bucle para mostrar los precios almacenados en el array $precios -->
        <!-- $meses es la CLAVE y $precioMensual es el VALOR-->
        <?php foreach ($precios as $meses => $precioMensual) { ?>
        <tr>
            <td>
                <!-- Nº del mes, ya que es la CLAVE del array -->
                <?= $meses ?>
                <!-- Operador ternario - Identifica si es 1 o más meses -->
                month<?= ($meses === 1) ? '' : 's'; ?>
            </td>
            <td>
                <!-- Precio con descuento -->
                 $<?= number_format($precioMensual, 2) ?>
            </td>
        </tr>
        <?php } ?>
    </table>

<!-- FOOTER -->
<?php include 'includes/footer.php' ?>