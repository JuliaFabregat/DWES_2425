<?php
    // VARIABLES


    // FUNCIONES
    function tablaMult($num){

        echo '<table>';
        echo '<tr>';
            echo '<th colspan=5>Tabla del '. $num . '</th>';
        echo '</tr>';
            
        for($i = 1; $i <= 10; $i++){
            echo '<tr>';
                echo '<td>'.$num.'</td>';
                echo '<td> * </td>';
                echo '<td>' . $i . '</td>';
                echo '<td> = </td>';
                echo '<td>' . $num * $i . '</td>';
            echo '</tr>';
        }

        echo '</table>';
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio Extra 1</title>

    <style>
        table {
            width: 20%;
            margin: auto;
            border-collapse: collapse;
            font-family: Arial, sans-serif;
            text-align: center;
        }
        /* Estilos para las celdas y bordes */
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        /* Color de fondo para el encabezado */
        th {
            background-color: cadetblue;
            font-weight: bold;
        }
        /* Color alterno para filas */
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        /* Efecto de hover en las filas */
        tr:hover {
            background-color: #e0e0e0;
        }
        /* Estilo de los símbolos */
        td:nth-child(2),
        td:nth-child(4) {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <!-- Llamamos a la función para generar la tabla de multiplicar -->
    <?php tablaMult(7); ?>
</body>
</html>