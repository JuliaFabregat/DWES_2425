<?php 
// Array con los ID de los productos
$idProductos = [0,1,2];

// Obtener el mensaje de error de la URL si existe
$error = $_GET['error'] ?? 'Por favor, seleccione un juego.';
?>


<!-- HTML -->
<?php include '../Actividades B6/includes/header.php'; ?>

<!-- Si hay un error, que lo muyestre -->
<?php if ($error){ ?>
    <p><?= $error ?></p>
<?php }; ?>

<!-- Lista de juegos -->
<ul>
    <?php foreach ($idProductos as $id ) { ?>
        <li> <a href="b6_ej1y3_product.php?id=<?= $id ?>"> Juego <?= $id + 1 ?> </a></li>
    <?php } ?>
    <li> <a href="b6_ej1y3_product.php?id=3"> Juego <?= $id + 2 ?> </a></li>
</ul>

<?php include '../Actividades B6/includes/footer.php'; ?>