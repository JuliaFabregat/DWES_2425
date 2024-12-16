<!-- Ejemplo: funciones que actualizan arrays (Pag 98) -->
<?php
// Lista de canciones inicial
$arrayCanciones = [
    "Blinding Lights" => "The Weeknd",
    "Estoy enfermo" => "Pignoise",
    "Levitating" => "Dua Lipa",
    "One more night" => "Maroon 5",
    "Feel Good Inc." => "Gorillaz"
];

$arrayCanciones2 = [
    "No One Left To Love" => "ROOS+BERG",
    "VOYS" => "BROCKHAMPTON",
    "Apple" => "Charli xcx",
    "Megan's Piano" => "Meghan Thee Stallion",
];

// FUNCIÓN AGREGAR
// 1. Agregar Canciones a la Lista: Utilizar array_key_exists , array_unshift  y
// array_push  para agregar canciones al inicio y al final de la lista.
function agregarCancion(&$arrayCanciones, $titulo, $artista, $posicion){    
    if (!array_key_exists($titulo, $arrayCanciones)) {
        if ($posicion === "inicio"){
            $arrayCanciones = array_merge([$titulo => $artista], $arrayCanciones);  // Agrega al inicio
        }
        else if ($posicion === "final"){
            $arrayCanciones[$titulo] = $artista;     // Agrega al final
        }
        $mensaje = "Se ha agregado satisfactoriamente la canción '$titulo' de '$artista' al $posicion.";
    }
    else{
        $mensaje = "La canción ya existe en la lista, no se puede añadir.";
    }

    return "<p>$mensaje</p>";
}

// FUNCIÓN ELIMINAR
// 2. Eliminar Canciones de la Lista: Utilizar array_shift y array_pop para eliminar
// canciones del inicio y del final de la lista.
function eliminarCancion(&$arrayCanciones, $titulo) {
    // Obtener la primera y la última clave del array
    $primeraClave = array_key_first($arrayCanciones);
    $ultimaClave = array_key_last($arrayCanciones);

    // Mensaje por defecto
    $mensaje = "La canción '$titulo' no coincide con la primera ni la última en la lista.";

    // Verificar si el título coincide con la primera canción
    if ($primeraClave === $titulo) {
        array_shift($arrayCanciones); // Elimina la primera canción
        $mensaje = "La canción '$titulo' fue eliminada (primera posición).";
    }
    // Verificar si el título coincide con la última canción
    elseif ($ultimaClave === $titulo) {
        array_pop($arrayCanciones); // Elimina la última canción
        $mensaje = "La canción '$titulo' fue eliminada (última posición).";
    }

    return "<p>$mensaje</p>";
}

// FUNCIÓN BUSCAR
// 3. Buscar Canciones en la Lista: Utilizar array_search para buscar canciones
function buscarCancion($arrayCanciones, $titulo){
    if(array_key_exists($titulo, $arrayCanciones)){
        $mensaje = "La canción '$titulo' se encuentra en la lista.";
    }
    else{
        $mensaje = "La canción '$titulo' no se encuentra en la lista.";
    }

    return "<p>$mensaje</p>";
}

// FUNCIÓN VERIFICAR
// 4. Verificar si una canción existe en la lista: Utilizar in_array para comprobarlo
function verificarCancion($arrayCanciones, $titulo){
    // Extraer todas las claves del array
    $titulos = array_keys($arrayCanciones);

    // Verificar si el título se encuentra en la lista
    if(in_array($titulo, $titulos)){
        $mensaje = "La canción '$titulo' se encuentra en la lista.";
    }
    else{
        $mensaje = "La canción '$titulo' no se encuentra en la lista.";
    }

    return "<p>$mensaje</p>";
}

// FUNCIÓN CONTAR
// 5. Contar Canciones en la Lista: Utilizar count para contar el número de canciones
function numCanciones($arrayCanciones){
    // Contamos el numero de canciones del array
    $numCanciones = count($arrayCanciones);

    return "<p>El número de canciones en la lista es: $numCanciones</p>";
}

// FUNCIÓN ALEATORIA
// 6. Seleccionar Canciones Aleatorias: Utilizar array_rand para seleccionar canciones
function cancionAleatoria($arrayCanciones){
    // Obtenemos la canción aleatoria
    $cancionAleatoria = array_rand($arrayCanciones, 1);
    // Obtenemos el artista de la canción aleatoria
    $artista = $arrayCanciones[$cancionAleatoria];

    return "<p>La canción aleatoria es: $cancionAleatoria - $artista</p>";
}

// FUNCIÓN IMPLODE
// 7. Imprimir la lista de canciones: Utilizar implode para mostrar la lista de canciones
function mostrarListaReproducción($arrayCanciones){
    // Convertimos el array en cadena de texto (implode)
    $arrayCanciones = implode(" - ", $arrayCanciones);

    return "<p>$arrayCanciones</p>";
}

// FUNCIÓN EXPLODE
// 8. Convertir la lista de canciones en un array: Utilizar explode para convertir la lista en un array
function convertirListaArray($arrayCanciones){
    // Convertimos la cadena de texto en array (explode)
    $arrayCanciones = explode(" - ", $arrayCanciones);

    return $arrayCanciones;
}

// FUNCIÓN ELIMINAR DUPLICADOS
// 9. Eliminar Canciones Duplicadas: Utilizar array_unique para eliminar canciones duplicadas
function eliminarDuplicados($arrayCanciones){
    // Eliminamos los elementos duplicados del array
    return array_unique($arrayCanciones);
}

// FUNCIÓN FUSIONAR LISTAS
// 10. Fusionar Listas de Canciones: Utilizar array_merge para fusionar dos listas de canciones
function fusionarListas($arrayCanciones1, $arrayCanciones2){
    // Fusionamos los dos arrays
    return array_merge($arrayCanciones1, $arrayCanciones2);
}
?>




<!-- HTML -->
<?php include './includes/header.php'; ?>

<h2>Lista de Canciones</h2>
<ul>
    <?php foreach ($arrayCanciones as $titulo => $artista) : ?>
        <li><?= $titulo ?> - <?= $artista ?></li>
    <?php endforeach; ?>
</ul>

<h2>Agregar Canciones</h2>
<?= agregarCancion($arrayCanciones, "Dance Monkey", "Tones and I", "final") ?>
<?= agregarCancion($arrayCanciones, "Dance Monkey", "Tones and I", "final") ?>
<!-- Volvemos a agregar la misma canción para comprobar que luego se elimina -->

<h2>Eliminar Canciones</h2>
<?= eliminarCancion($arrayCanciones, "Blinding Lights"); ?>
<?= eliminarCancion($arrayCanciones, "Feel Good Inc."); ?>
<!-- No coincide, porque al añadir una canción al final debe dar error -->

<h2>Lista de Canciones Actualizada</h2>
<ul>
    <?php foreach ($arrayCanciones as $titulo => $artista) : ?>
        <li><?= $titulo ?> - <?= $artista ?></li>
    <?php endforeach; ?>
</ul>

<h2>Buscar Canciones</h2>
<?= buscarCancion($arrayCanciones, "Levitating"); ?>

<h2>Verificar Canciones</h2>
<?= verificarCancion($arrayCanciones, "Dance Monkey"); ?>

<h2>Contar canciones: </h2>
<?= numCanciones($arrayCanciones); ?>

<h2>Canción Aleatoria</h2>
<?= cancionAleatoria($arrayCanciones); ?>

<h2>Lista de Reproducción</h2>
<?= mostrarListaReproducción($arrayCanciones); ?>

<h2>Convertir Lista en Array (Array Convertido)</h2>
<?php
    // Generar cadena de canciones sin etiquetas HTML
    $cadenaCanciones = implode(" - ", array_keys($arrayCanciones));

    // Convertimos la cadena de texto en array
    $arrayCanciones = convertirListaArray($cadenaCanciones);
    
    echo "<ul>";
    // Mostramos el array convertido
    foreach ($arrayCanciones as $key => $value) {
        echo "<li>$value</li>";
    }
    echo "</ul>";
?>

<h2>Eliminar Canciones Duplicadas</h2>
<?php
    // Eliminamos las canciones duplicadas
    $arrayCancionesSinDuplicados = eliminarDuplicados($arrayCanciones);

    echo "<ul>";
    // Mostramos el array sin duplicados
    foreach ($arrayCancionesSinDuplicados as $key => $value) {
        echo "<li>$value</li>";
    }
    echo "</ul>";
?>

<h2>Fusionar Listas de Canciones</h2>
<?php
    // Fusionamos las dos listas de canciones
    $arrayCancionesDefinitivo = fusionarListas($arrayCanciones, $arrayCanciones2);

    echo "<ul>";
    // Mostramos el array fusionado
    foreach ($arrayCancionesDefinitivo as $key => $value) {
        echo "<li>$value</li>";
    }
    echo "</ul>";
?>

<?php include './includes/footer.php'; ?>
