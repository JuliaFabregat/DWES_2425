<?php
    // Variables
    $lista = ['perro', 'gato', 'conejo', 'hamster'];

    function tipoLista(array $lista, $tipo="ul"){
        // Depende del tipo de lista
        switch($tipo){
            case "ul":
                echo "<ul>";
                    foreach ($lista as $animal) {
                        echo "<li>". ucfirst($animal) ."</li>";
                    }
                echo "</ul>";
                break;

            case "ol":
                echo "<ol>";
                    foreach ($lista as $animal) {
                        echo "<li>". ucfirst($animal) ."</li>";
                    }
                echo "</ol>";
                break;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio Extra 3</title>
</head>
<body>
    <h1>Generar Lista</h1>
    <?php tipoLista($lista); ?>
    <?php tipoLista($lista, "ol"); ?>
</body>
</html>