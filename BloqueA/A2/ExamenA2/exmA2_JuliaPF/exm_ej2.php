<!-- PHP -->
<?php
    // Variables
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examen ejercicio 2 - JuliaPF</title>
</head>
<body>
    <!-- Tabla 1 -->
    <table border="1px">
        <?php for($fila = 1; $fila <= 5; $fila++){ ?>
            <tr align="center">
            <?php for($columna = 1; $columna <= 6; $columna++){?>
                <?php if($fila !=1 && $fila !=5 && $columna > 1 && $columna < 6){ ?>
                    <td><?= " " ?></td>
                <?php } else { ?>
                    <td>(<?="$fila , $columna" ?>)</td>
                <?php } ?>
            <?php } ?>
            </tr>
        <?php } ?>
    </table>

    <hr>
    <br>
    <!-- Tabla 2 -->
    <table border="1px">
        <?php for($fila = 1; $fila <= 10; $fila++){ ?>
            <tr align="center">
            <?php for($columna = 1; $columna <= 12; $columna++){?>
                <?php if($fila !=1 && $fila !=10 && $columna > 1 && $columna < 12){ ?>
                    <td><?= " " ?></td>
                <?php } else { ?>
                    <td>(<?="$fila , $columna" ?>)</td>
                <?php } ?>
            <?php } ?>
            </tr>
        <?php } ?>
    </table>

    <hr>
    <br>
    <!-- Tabla 3 -->
    <table border="1px">
        <?php for($fila = 1; $fila <= 15; $fila++){ ?>
            <tr align="center">
            <?php for($columna = 1; $columna <= 18; $columna++){?>
                <?php if($fila !=1 && $fila !=15 && $columna > 1 && $columna < 18){ ?>
                    <td><?= " " ?></td>
                <?php } else { ?>
                    <td>(<?="$fila , $columna" ?>)</td>
                <?php } ?>
            <?php } ?>
            </tr>
        <?php } ?>
    </table>

</body>
</html>