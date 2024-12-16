<!-- Ejemplo: funciones de ordenación de arrays (Pag 113) -->
<?php
// Array de Canciones
$canciones_con_reproducciones = [
    "Blinding Lights - The Weeknd" => 1500,
    "Estoy enfermo - Pignoise" => 1200,
    "Levitating - Dua Lipa" => 1800,
    "One more night - Maroon 5" => 1600,
    "Feel Good Inc. - Gorillaz" => 1700
];

// FUNCIÓN ALEATORIA
// 1. Función para generar reproducciones aleatorias
function reproduccionesAleatorias($canciones_con_reproducciones) {
    foreach ($canciones_con_reproducciones as $cancion => $rep) {
        // Actualizamos el número de reproducciones
        $canciones_con_reproducciones[$cancion] = mt_rand(500, 2000);
    }

    return $canciones_con_reproducciones;
}

// FUNCIÓN ORDENAR ASC sort() - VALOR (Nombre de Canción)
// 2. Ordenar la Lista por Nombre de Canción Ascendente: Utilizar sort()
function ordenarPorNombreAscSort($cancionesRepAleatoria) {
    sort($cancionesRepAleatoria); // Ordena ASC al ser sort()
    
    return $cancionesRepAleatoria;
}
// FUNCIÓN ORDENAR DESC rsort()
// 3. Ordenar la Lista por Nombre de Canción Descendente: Utilizar rsort()
function ordenarPorNombreDescRsort($cancionesRepAleatoria){
    rsort($cancionesRepAleatoria); // Ordena DESC al ser rsort()
    
    return $cancionesRepAleatoria;
}



// FUNCIÓN ORDENAR ASC asort() - VALOR (Reproducciones)
// 4. Ordenar la Lista por Reproducciones Ascendente: Utilizar asort()
function ordenarPorReproduccionesAscAsort($cancionesRepAleatoria) {
    asort($cancionesRepAleatoria); // Ordena ASC por valor (reproducciones)
    
    return $cancionesRepAleatoria;
}
// FUNCIÓN ORDENAR DESC arsort()
// 5. Ordenar la Lista por Reproducciones Descendente: Utilizar arsort()
function ordenarPorReproduccionesDescArsort($cancionesRepAleatoria){
    arsort($cancionesRepAleatoria); // Ordena DESC por valor (reproducciones)
    
    return $cancionesRepAleatoria;
}



// FUNCIÓN ORDENAR ASC ksort() - CLAVE
// 6. Ordenar la Lista por Nombre de Canción Ascendente: Utilizar ksort()
function ordenarPorNombreAscKsort($cancionesRepAleatoria) {
    ksort($cancionesRepAleatoria); // Ordena ASC por clave (nombre de canción)
    
    return $cancionesRepAleatoria;
}
// FUNCIÓN ORDENAR DESC krsort()
// 7. Ordenar la Lista por Nombre de Canción Descendente: Utilizar krsort()
function ordenarPorNombreDescKrsort($cancionesRepAleatoria){
    krsort($cancionesRepAleatoria); // Ordena DESC por clave (nombre de canción)
    
    return $cancionesRepAleatoria;
}

?>

<!-- HTML -->
<?php include './includes/header.php'; ?>

<h1>Canciones con Reproducciones Aleatorias:</h1>
<ul>
    <?php
        // Actualizamos el array con las reproducciones aleatorias
        $cancionesRepAleatoria = reproduccionesAleatorias($canciones_con_reproducciones);
        
        foreach($cancionesRepAleatoria as $cancion => $numRep): ?>
            <li><?= $cancion ?> | <?= $numRep ?> Reproducciones</li>
    <?php endforeach; ?>
</ul>

<hr>

<h1>Ordenadas por Nombre de Canción Ascendente (sort()):</h1>
<ul>
    <?php 
        // Ordenamos las canciones por su nombre
        $arrayAsc = ordenarPorNombreAscSort($cancionesRepAleatoria);

        foreach($arrayAsc as $cancion => $numRep): ?>
            <li><?= $cancion ?> | <?= $numRep ?> Reproducciones</li>
    <?php endforeach; ?>
</ul>

<h1>Ordenadas por Nombre de Canción Descendente (rsort()):</h1>
<ul>
    <?php 
        // Ordenamos las canciones por su nombre en orden descendente
        $arrayDesc = ordenarPorNombreDescRsort($cancionesRepAleatoria);

        foreach($arrayDesc as $cancion => $numRep): ?>
            <li><?= $cancion ?> | <?= $numRep ?> Reproducciones</li>
    <?php endforeach; ?>
</ul>

<hr>

<h1>Ordenadas por Número de Reproducciones Ascendente (asort()):</h1>
<ul>
    <?php 
        // Ordenamos las canciones por su número de reproducciones en orden ascendente
        $arrayAsc = ordenarPorReproduccionesAscAsort($cancionesRepAleatoria);

        foreach($arrayAsc as $cancion => $numRep): ?>
            <li><?= $cancion ?> | <?= $numRep ?> Reproducciones</li>
    <?php endforeach; ?>
</ul>

<h1>Ordenadas por Número de Reproducciones Descendente (arsort()):</h1>
<ul>
    <?php 
        // Ordenamos las canciones por su número de reproducciones en orden descendente
        $arrayDesc = ordenarPorReproduccionesDescArsort($cancionesRepAleatoria);

        foreach($arrayDesc as $cancion => $numRep): ?>
            <li><?= $cancion ?> | <?= $numRep ?> Reproducciones</li>
    <?php endforeach; ?>
</ul>

<hr>

<h1>Ordenadas por Nombre de Canción Ascendente (ksort()):</h1>
<ul>
    <?php 
        // Ordenamos las canciones por su nombre
        $arrayAsc = ordenarPorNombreAscKsort($cancionesRepAleatoria);

        foreach($arrayAsc as $cancion => $numRep): ?>
            <li><?= $cancion ?> | <?= $numRep ?> Reproducciones</li>
    <?php endforeach; ?>
</ul>

<h1>Ordenadas por Nombre de Canción Descendente (krsort()):</h1>
<ul>
    <?php 
        // Ordenamos las canciones por su nombre en orden descendente
        $arrayDesc = ordenarPorNombreDescKrsort($cancionesRepAleatoria);

        foreach($arrayDesc as $cancion => $numRep): ?>
            <li><?= $cancion ?> | <?= $numRep ?> Reproducciones</li>
    <?php endforeach; ?>
</ul>

<?php include './includes/footer.php'; ?>

