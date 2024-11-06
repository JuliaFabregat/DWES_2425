<!--PHP-->
<?php 
    // ARRAY INDEXADO - Cada elemento tendrá un nº de índice (0, 1, 2)
    // ¿Cuando usarlo?
    //  - No se sabe cuántos datos se van a almacenar
    //  - Desea almacenar una serie de valores en un orden específico
    $shopping_list = ['bread', 'cheese', 'milk'];
    // $shopping_list[2]; -> Mostraría milk
    // Para actualizar el valor:        $shopping_list[2] = 'butter'; -> milk pasaría a ser butter

    $best_sellers = ['Chocolate', 'Mints', 'Fudge', 'Cotton Candy', 'Bubble Gum', 'Toffee', 'Jelly Beans'];
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A_1.4. Arrays indexados </title>
    <link rel="stylesheet" href="RecursosA1/css/styles.css">
</head>
<body>
    <h1>The Candy Store</h1>
    <h2>Best Sellers</h2>
    
    <ul>
        <li><?php echo $best_sellers[0]; ?></li>
        <li><?php echo $best_sellers[1]; ?></li>
        <li><?php echo $best_sellers[2]; ?></li>

        <!--Mostrar también el 4º y 5º elemento -->
        <li><?php echo $best_sellers[3]; ?></li>
        <li><?php echo $best_sellers[4]; ?></li>
    </ul>
</body>
</html>