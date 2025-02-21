<?php 
session_start();

// Inicializar Variables
$msg = '';

// Verificar si se han enviado nuevas cantidades desde el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['productos'])) {

        // Actualizar las cantidades en el carrito
        foreach ($_POST['productos'] as $nombreProducto => $nuevaCantidad) {
            if (isset($_SESSION['carrito'][$nombreProducto])) {
                $_SESSION['carrito'][$nombreProducto]['cantidad'] = max(1, intval($nuevaCantidad)); // Asegurarse de que la cantidad sea válida
            }
        }
    }
}

// Eliminar producto al darle al botón
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['eliminar'])) {

    $productoAEliminar = htmlspecialchars($_POST['eliminar']);

    // Si está en el carrito se hace unset -> eliminar
    if (isset($_SESSION['carrito'][$productoAEliminar])) {
        unset($_SESSION['carrito'][$productoAEliminar]);
    }
}

// Verificar si hay productos en el carrito
if (!isset($_SESSION['carrito']) || empty($_SESSION['carrito'])) {

    // Si el carrito está vacío, mostrar mensaje
    $msg = '<h2>Tu carrito está vacío.</h2>';

} else {
    // Inicializar variables
    $total = 0;

    $msg = '<h2>Productos en tu carrito:</h2>';
    $msg .= '<form method="post">';
    $msg .=     '<table>';
    $msg .=     '<tr>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Total</th>
                </tr>';

    // Mostramos y calculamos los productos del carrito
    foreach ($_SESSION['carrito'] as $nombreProducto => $item) {

        if (isset($item['precio']) && isset($item['cantidad'])) {

            // Calcular subtotal para cada producto
            $subtotal = $item['precio'] * $item['cantidad'];
            $total += $subtotal;

            // Agregar fila del producto - Nombre, Precio, Cantidad, Subtotal
            $msg .= "<tr>";
            $msg .=     "<td>" . htmlspecialchars($nombreProducto) . "</td>";
            $msg .=     "<td>" . htmlspecialchars($item['precio']) . "€</td>";
            $msg .=     "<td><input type='number' name='productos[" . htmlspecialchars($nombreProducto) . "]' value='" . htmlspecialchars($item['cantidad']) . "' min='1'></td>";
            $msg .=     "<td>" . htmlspecialchars($subtotal) . "€</td>";
            $msg .=     "<td><button type='submit' name='eliminar' value='" . htmlspecialchars($nombreProducto) . "'>Eliminar</button></td>";
            $msg .= "</tr>";
        }
    }

    // Total
    $msg .=     '</table>';
    $msg .=     '<p><b>Total:</b> ' . htmlspecialchars($total) . '€</p>';

    // Botón -> Actualizar Cambios
    $msg .=     '<button type="submit">Actualizar Cantidades</button> <br>';
    $msg .= "</form>";

    // Botón -> checkout.php
    $msg .= '<a href="checkout.php" class="proceder-compra">';
    $msg .=     '<button type="button">Proceder a la Compra</button>';
    $msg .= '</a>';
}
?>
<!-- HTML -->
<?php include '../includes/header.php'; ?>

<!-- Mostrar el contenido -->
<?= $msg ?? '' ?>

<!-- Botón para volver a products -->
<a href="products.php" class="ver-carrito"><button>Volver</button></a>

<?php include '../includes/footer.php'; ?>