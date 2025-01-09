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
    $status = '';
    $producto = $productos[$id];
} else {
    $error = 'Juego no encontrado.';
    header("Location: b6_ej1y3_GET.php?error=" . $error);
    exit;
}

?>



<!-- HTML -->
<?php include '../Actividades B6/includes/header.php'; ?>

<p><?= $status ?></p>

<?php if (isset($producto)) { ?>
    <ul>
        <li>Juego: <?= $producto['nombre'] ?> </li>
        <li>Nº Personajes: <?= $producto['personajes'] ?> </li>
    </ul>
<?php } ?>

<a href="b6_ej1y3_GET.php">Volver</a>

<?php include '../Actividades B6/includes/footer.php'; ?>