<?php
    function calcularArea($dimension1, $dimension2 = null, $figura = "cuadrado"){
        // Variables
        $area = 0;
        $msj = "";

        // Lógica para calcular el área según el tipo de figura
        switch($figura){
            case "cuadrado":
                $area = $dimension1 * $dimension1;
                break;
            case "rectangulo":
                $area = $dimension1 * $dimension2;
                break;
            case "triangulo":
                $area = ($dimension1 * $dimension2) / 2;
                break;
        }

        // Mensaje final para todos
        $msj = "El area del $figura es: $area";

        // Devolvemos el mensaje
        return $msj;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio Extra 2</title>
</head>
<body>
    <h1>Cálculo de Área</h1>
    <?= calcularArea(2,4, $figura="rectangulo") ?>
</body>
</html>