<?php 
session_start();    // Iniciamos la sesión
// Variables
$listaCompra = [
    ['nombre' => 'iPhone',  'precio' => 1049.99],
    ['nombre' => 'Xiaomi',  'precio' => 349.99],
    ['nombre' => 'Samsung', 'precio' => 899.99],
    ['nombre' => 'Redmi',   'precio' => 199.99],
];

// Añadimos el producto al carrito
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['producto'])) {
        // Captamos los datos de los productos
        $productoSeleccionado = $_POST['producto'];
        $nombreProducto = htmlspecialchars($productoSeleccionado['nombre']);
        $precioProducto = floatval($productoSeleccionado['precio']);

        // Inicializar el carrito si no existe
        if (!isset($_SESSION['carrito'])) {
            $_SESSION['carrito'] = [];
        }

        // Verificar si el producto ya está en el carrito
        if (isset($_SESSION['carrito'][$nombreProducto])) {
            $_SESSION['carrito'][$nombreProducto]['cantidad'] += 1;
        } else {
            $_SESSION['carrito'][$nombreProducto] = [
                'nombre' => $nombreProducto,
                'precio' => $precioProducto,
                'cantidad' => 1,
            ];
        }
    }
}
?>
<!-- HTML -->
<?php include '../includes/header.php'; ?>
<ul>
    <?php foreach ($listaCompra as $product) { ?>
        <li>Nombre: <?= htmlspecialchars($product['nombre']) ?> - Precio: <?= htmlspecialchars($product['precio']) ?> </li>
        <!-- Formulario individual para cada producto -->
        <form action="" method="post">
            <input type="hidden" name="producto[nombre]" value="<?= htmlspecialchars($product['nombre']) ?>">
            <input type="hidden" name="producto[precio]" value="<?= htmlspecialchars($product['precio']) ?>">
            <button type="submit">Añadir al Carrito</button>
        </form>
    <?php } ?>
</ul>

<!-- Botón para ver el carrito -->
<a href="cart.php" class="ver-carrito"><button>Ver Carrito</button></a>

<?php include '../includes/footer.php'; ?>