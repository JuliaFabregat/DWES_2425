<!--PHP-->
<?php
    // 1. Operador de concatenación .
    //  $forename = 'Sergio';
    //  $surname = 'Diaz';
    //  $name = $forename . '' . $surname;  // Añadimos el espacio para que no aparezca como: SergioDiaz
    // 2. Operador de asignación de concatenación .=   -> Lo mismo que en el ejemplo anterior pero en menos líneas
    //  $greeting = 'Hola';
    //  $greeting .= 'Pablo';

    // 3. Operadores de cadenas
    //  $name = "$forename $surname";

    // -- EJEMPLO --
    $prefix = 'Thank you';
    $name = 'Jules';
    // Creamos la variable en la que concatenar el mensaje
    $message = "$prefix, $name";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A_1.9. Operadores de Cadenas </title>
    <link rel="stylesheet" href="RecursosA1/css/styles.css">
</head>
<body>
    <h1>The Candy Store</h1>
    <h2><?= $name ?>'s Order</h2>
    <p><?= $message ?></p>
</body>
</html>