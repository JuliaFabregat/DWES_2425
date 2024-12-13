<!-- Ejemplo: Reemplazando Caracteres en una cadena -->
<?php
// Variables
$text = '/images/uploads/';
?>

<!-- HTML -->
<?php include './includes/header.php'; ?>

    <b>Remove '/' from boths ends: </b> <br>
    <?= trim($text, '/') ?>

    <br>

    <b>Remove '/' from the left of the string: </b> <br>
    <?= ltrim($text, '/') ?>

    <br>

    <b>Remove '/' from the right of the string: </b> <br>
    <?= rtrim($text, '/') ?>

    <br>

    <b>Replace 'images' with 'img': </b> <br>
    <?= str_replace('images', 'img', $text) ?>

    <br>

    <b>As above but case-insensitive</b> <br>
    <?= str_ireplace('IMAGES', 'img', $text) ?>

    <br>

    <b>Repeat the string:</b> <br>
    <?= str_repeat($text, 2) ?>

<?php include './includes/footer.php'; ?>