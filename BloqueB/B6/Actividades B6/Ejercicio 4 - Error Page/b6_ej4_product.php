<?php
// Array de los productos con los datos
$productos = [
    ['nombre'=>'Marvel Rivals', 'personajes'=>'33'],
    ['nombre'=>'League of Legends', 'personajes'=>'140'],
    ['nombre'=>'World of Warcraft', 'personajes'=>'13'],
];

// Hacemos la consulta obteniendo el id del enlace
$id = $_GET['id'] ?? ''; // Operador de Coalescencia Nula: Si no existe valor a la izq del ?? se coge el valor de la derecha (0 en este caso)

// NUEVO: Valid
$valid = array_key_exists($id, $productos);

if(!$valid){
    http_response_code(404);
    header('Location: b6_ej4_error-page.php');
    exit;
} else{
    $producto = $productos[$id];
}

?>



<!-- HTML -->
<?php include '../includes/header.php'; ?>

<p>Juego encontrado.</p>
<ul>
    <li>Juego: <?= $producto['nombre'] ?> </li>
    <li>Nº Personajes: <?= $producto['personajes'] ?> </li>
</ul>
<a href="b6_ej4_index.php">Volver</a>

<?php include '../includes/footer.php'; ?>