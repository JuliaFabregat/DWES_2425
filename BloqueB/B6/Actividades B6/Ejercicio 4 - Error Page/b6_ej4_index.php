<!-- Redirigir a una página de error (Pag. 60) -->

<?php
// Array con los ID de los productos
$idProductos = [0,1,2];

?>


<!-- HTML -->
<?php include '../includes/header.php'; ?>

<!-- Si hay un error, que lo muestre -->
<p>Por favor, seleccione un juego</p>

<!-- Lista de juegos -->
<ul>
    <?php foreach ($idProductos as $id) { ?>
        <li> <a href="b6_ej4_product.php?id=<?= $id ?>"> Juego <?= $id + 1 ?> </a></li>
    <?php } ?>
    <li> <a href="b6_ej4_product.php?id=3"> Juego 4 </a></li>
    <li> <a href="b6_ej4_product.php?id=4"> Juego 5 </a></li>
</ul>

<?php include '../includes/footer.php'; ?>