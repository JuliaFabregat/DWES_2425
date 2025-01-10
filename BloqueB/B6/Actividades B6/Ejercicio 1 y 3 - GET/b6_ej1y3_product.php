<?php
// Array de los productos con los datos
$productos = [
    ['nombre'=>'Marvel Rivals', 'personajes'=>'33'],
    ['nombre'=>'League of Legends', 'personajes'=>'140'],
    ['nombre'=>'World of Warcraft', 'personajes'=>'13'],
];

// Hacemos la consulta obteniendo el id del enlace
$id = $_GET['id'] ?? ''; // Operador de Coalescencia Nula: Si no existe valor a la izq del ?? se coge el valor de la derecha (0 en este caso)


// Si el id existe, mostramos el producto, sino mostramos los errores
if (array_key_exists($id, $productos)) {
    $status = 'Juego encontrado.';
    $producto = $productos[$id];
} else {
    $status = 'Juego no encontrado.';
}

?>



<!-- HTML -->
<?php include '../includes/header.php'; ?>



<?php if (isset($producto)) { ?>
    <p><?= $status ?></p>
    <ul>
        <li>Juego: <?= $producto['nombre'] ?> </li>
        <li>Nº Personajes: <?= $producto['personajes'] ?> </li>
    </ul>
    <a href="b6_ej1y3_indexGET.php">Volver</a>
    
<?php } else{ ?>
    <p><?= $status ?></p>
    <a href="b6_ej1y3_indexGET.php">Volver</a>
<?php }?>




<?php include '../includes/footer.php'; ?>