<?php
    // Funciones
    function generatedPass($numPass, $long = 8){
        // Variables
        static $contador = 0;
        $listaPass = [];
        $pattern = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $max = strlen($pattern)-1;

        // Bucle
        for($k = 1; $k <= $numPass; $k++){
            $pass = "";

            for($i = 1; $i <= $long; $i++){
                $pass .= $pattern[rand(0, $max)];   
                // rand(0, $max): Genera un número aleatorio entre 0 y $max (el índice máximo de $pattern).
                // $pattern[rand(0, $max)]: selecciona un carácter aleatorio de $pattern usando ese índice.
                // .= Concatena el carácter seleccionado anteriormente a la contraseña
            }

            $listaPass[] = $pass;
            $contador++;
        }

        echo "<h1>Contraseñas generadas: $contador</h1>";
        return $listaPass;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio Extra 4</title>
</head>
<body>
    <?php 
        // Llamamos a la función para generar las contraseñas
        $listaPass = generatedPass(4, 12); // Generar 3 contraseñas de 12 caracteres

        // La función devuelve un array con la cantidad de contraseñas que nos han pedido (3)
        foreach ($listaPass as $i => $pass) {
            echo "<p>Contraseña " . ($i+ 1) . ": $pass</p>";    // Lo recorremos para imprimir cada una
        }
    ?>
</body>
</html>