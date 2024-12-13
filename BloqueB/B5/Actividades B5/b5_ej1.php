<!-- Ejemplo: Conversión Mayúsculas/Minúsculas y contando Caracteres -->

<!-- PHP -->
<?php
// Variables
$text = 'Home sweet home';
$txtBlog = 'Bienvenidos a el Blog: ¡Tipos de funciones con cadenas! <br> 
            En este blog vamos a aprender sobre las funciones de cadenas en PHP. <br>
            Esto va a ser muy interesante. ¿Estás listo? ¡Vamos a empezar! Jiji.';

function contarFrecuenciaPalabras($txtBlog): void{
    // Contar la frecuencia de cada palabra en el texto
    // Array -> Añadimos las palabras del texto a un array quitando los espacios
    $arrayPalabrasTxt = array_filter(preg_split("/\s+/", $txtBlog));

    // Array sin palabras repetidas
    $arraySinPalabrasRepetidas = array_unique($arrayPalabrasTxt);

    // Recorremos el array de palabras sin repetir
    foreach ($arraySinPalabrasRepetidas as $palabra) {
        // Contar la frecuencia de cada palabra en el texto
        $frecuenciaPalabra = substr_count($txtBlog, $palabra);
        echo "La palabra '$palabra' aparece $frecuenciaPalabra veces en el texto. <br>";
    }

}

    // foreach ($arraySinPalabrasRepetidas as $word) {
    //     $frecuenciaPalabra = "/{$word}/"; // Expresión regular para buscar la palabra
    //     echo 'Nº Veces de ' . $word . ' = ' . preg_match_all($frecuenciaPalabra, $txtBlog) . '<br>';
    // }
?>

<!-- HTML -->
<?php include './includes/header.php'; ?>

<p>
    <!-- Texto Original -->
    <h1><?= $txtBlog ?></h1>
    
    <hr>

    <!-- Texto en Mayúsculas -->
    <h2>Uppercase:</h2>
    <p><?= strtoupper($txtBlog) ?></p> <br>

    <!-- Texto con Letra Capital para cada palabra -->
    <h2>Uppercase the first letter of each word:</h2>
    <p><?= ucwords($txtBlog) ?></p> <br>

    <!-- Calcula la longitud del texto en Caracteres-->
    <h2>Character count:</h2>
    <p><?= strlen($txtBlog) ?></p> <br>

    <!-- Calcula la longitud del texto en Caracteres sin contar los espacios-->
    <h2>Length of the Text without spaces:</h2>
    <p><?= strlen(str_replace(' ', '', $txtBlog)) ?></p> <br>

    <!-- Calcula el número de palabras en el texto -->
    <h2>Word count:</h2>
    <p><?= str_word_count($txtBlog) ?></p> <br>

    <hr>

    <h1>Advanced Functions:</h1> <br>

    <!-- Calcula el número de palabras en el texto -->
    <h2>Frecuency of each word on the text:</h2>
    <p><?php contarFrecuenciaPalabras($txtBlog) ?></p>

    <hr>

    <h1>Basic Functions:</h1>

    <b>Lowercase:</b>
    <?= strtolower($text) ?> <br>

    <b>Uppercase:</b>
    <?= strtoupper($text) ?> <br>

    <b>Character count:</b>
    <?= strlen($text) ?> <br>

    <b>Word count:</b>
    <?= str_word_count($text) ?>
</p>

<?php include './includes/footer.php' ?>