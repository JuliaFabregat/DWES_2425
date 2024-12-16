<!-- Ejemplo: Comprobación de Caracteres en una cadena (Pag 29)-->
<?php 
// Variables
$text = 'Home sweet home'
?>

<!-- HTML -->
<?php include 'includes/header.php'; ?>

<!-- Busca la primera vez que aparece la subcadena "ho" en la cadena -->
    <b>First match (case-sensitive): </b>
    <?= strpos($text, 'ho') ?>

    <br>

<!-- Busca la primera vez que aparece la subcadena "me" en la cadena -->
    <b>First match (not case-sensitive): </b>
    <?= stripos($text, 'me', 5) ?>

    <br>

<!-- Busca la última vez que aparece la subcadena "Ho" en la cadena -->
    <b>Last match (case-sensitive): </b>
    <?= strrpos($text, 'Ho') ?>
    <!-- Devuelve 0 porque distingue entre Mayus y Minus, es decir, como pone ho y no Ho no lo pilla -->

    <br>

<!-- Busca la última vez que aparece la subcadena "Ho" en la cadena -->
    <b>Last match (not case-sensitive): </b>
    <?= strripos($text, 'Ho') ?>
    <!-- Aquí si lo pilla porque no distingue entre Mayus y Minus -->

    <br>

<!-- Devuelve la primera palabra que encuentre que contenga 'ho', en este caso, devuelve 'Home'  -->
    <b>Text after first match (case-sensitive): </b>
    <?= strstr($text, 'ho') ?>

    <br>

<!-- Devuelve la primera palabra que encuentre que contenga 'ho'-->
    <!-- Devuelve 'Home' porque no distingue entre Mayus y Minus-->
    <b>Text after first match (not case-sensitive): </b>
    <?= stristr($text, 'ho') ?>

    <br>

<!-- Devuelve 5 caracteres empezando por el caracter de la 5º posición -->
    <b>Text between two positions: </b>
    <?= substr($text, 5, 5) ?>

    <br>



<?php include 'includes/footer.php'; ?>