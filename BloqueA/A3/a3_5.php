<!-- PHP -->
<?php
    // Variables
    $tax_rate = 0.25;   // Modificamos la tasa de impuestos de 0.20 a 0.25

    // Tipos de variables
    // GLOBAL -> Se nombra al principio del código y permite que la función pueda acceder y actualizar su valor
    // STATIC -> Conserva un valor en una función tras su ejecución

    // FUNCIONES LÓGICAS
    function calculate_running_total($price, $quantity){
        // Variables
        global $tax_rate;           // Convertimos la variable que tenemos fuera en global para poder manipuarla
        static $running_total = 0;  // Marcamos static para guardar su valor y poder seguir actualizandolo

        // Cálculos
        $total = $price * $quantity;
        $tax = $total * $tax_rate;
        $running_total = $running_total + $total + $tax;

        // Devolvemos el valor
        return $running_total;
    }


    // FUNCIONES ESTÉTICAS
    function create_logo(){
        return '<img src="./../RecursosA/img/logo.png" alt="logo" width="50" height="auto"/>';
    }

    function create_copyright_notice(){
        // Variables
        $year = date('Y');
        $message = '&copy; ' . $year . '<i>The Candy Store</i>';

        return $message;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A3_5. Acceder a variables externas a una función</title>
    <link rel="stylesheet" href="../RecursosA/css/styles.css">
</head>

<body>
    <header>
        <h1><?= create_logo()?> The Candy Store</h1>
    </header>

    <table>
        <tr>
            <th>Item</th>       <th>Price</th>  <th>Qty</th>    <th>Running total (Cesta)</th>
        </tr>

        <tr>
            <td>Mints: </td>    <td>$2</td>     <td>5</td>      <td>$<?= calculate_running_total(2,5) ?></td>
        </tr>

        <tr>
            <td>Toffee: </td>   <td>$3</td>     <td>5</td>      <td>$<?= calculate_running_total(3,5) ?></td>
        </tr>

        <tr>
            <td>Fudge: </td>    <td>$5</td>     <td>4</td>      <td>$<?= calculate_running_total(5,4) ?></td>
        </tr>

        <tr>
            <td>Chew-gum: </td>    <td>$1.50</td>     <td>4</td>      <td>$<?= calculate_running_total(1.50,4) ?></td>
        </tr>

        <tr>
            <td>Marshmellows: </td>    <td>$0.5</td>     <td>10</td>      <td>$<?= calculate_running_total(0.5,10) ?></td>
        </tr>
    </table>

    <footer>
        <?= create_logo() ?>
        <?= create_copyright_notice() ?>
    </footer>
</body>

</html>