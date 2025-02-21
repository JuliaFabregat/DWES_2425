<?php 
session_start();

// Verificar si se ha solicitado vaciar el carrito o proceder a la compra
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['vaciar'])) {

        // Vaciar el carrito eliminando la variable de sesión
        unset($_SESSION['carrito']);

        $msg = '<p>Tu carrito ha sido vaciado exitosamente.</p>';
        $msg .= '<button><a href="./products.php">Volver a la Tienda</a></button>';

    } elseif (isset($_POST['comprar'])) {

        // Proceder a la compra y eliminar los datos de la sesión
        unset($_SESSION['carrito']);

        $msg = '<p>Gracias por tu compra. Tu pedido ha sido procesado exitosamente.</p>';
    }
}
?>

<!-- HTML -->
<?php include '../includes/header.php'; ?>

<h2>Checkout</h2>

<!-- Mostrar el msg si existe -->
<?php if (isset($msg)): ?>

    <div style="color: green; font-weight: bold;">
        <?= $msg ?>
    </div>

<?php else: ?>

    <p>¿Deseas proceder con la compra o vaciar el carrito?</p>
    <form method="post">
        <button type="submit" name="comprar">Proceder a la Compra</button>
        <button type="submit" name="vaciar">Vaciar Carrito</button>
    </form>

<?php endif; ?>

<?php include '../includes/footer.php'; ?>