<!-- PHP -->
<?php
    // ARRAYS - Días de la semana
    // Opción buena :')
    $horario = [
        ['Lunes' => ['DIW', 'DIW', 'EIE', 'EIE', 'DWEC', 'DWEC']],
        ['Martes' => ['DAW', 'DWES', 'DWES', 'DWEC', 'DWEC', 'HLC']],
        ['Miercoles' => ['DWES', 'DWES', 'DWEC', 'DWEC', 'HLC', 'DAW']],
        ['Jueves' => ['DWES', 'DWES', 'DIW', 'DIW', 'EIE', 'EIE']],
        ['Viernes' => ['DWES', 'DWES', 'DIW', 'DIW', 'DAW', 'HLC']]
    ];

    // Mal julia >:(
    $lunes = [
        '1hora'=>'DIW',
        '2hora'=>'DIW',
        '3hora'=>'EIE',
        'Recreo'=>'',
        '4hora'=>'EIE',
        '5hora'=>'DWEC',
        '6hora'=>'DWEC',
    ];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examen - Ejercicio 2</title>

    <!-- CSS - Para tener nuestra tabla, con estilo ;) -->
    <style>
        table {
        border-collapse: collapse;
        width: 100%;
        text-align: center;
        }
        th, td {
        border: 1px solid black;
        padding: 10px;
        }
        th {
        background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <!--Cabecera, habría sido mejor meterla en otro array, pero por si no me daba tiempo aquí estamos -->
            <td><b>Hora</b></td>
            <td><b>Lunes</b></td>
            <td><b>Martes</b></td>
            <td><b>Miércoles</b></td>
            <td><b>Jueves</b></td>
            <td><b>Viernes</b></td>
        </tr>
            
        <tr>
            <!-- Fila: Ponemos 1º Hora y todos nuestros arrays con su 1hora, repetimos el proceso -->
            <th>1ª Hora</th>
            <th><?= $horario[0]['Lunes'][0] ?> </th>
            <th><?= $horario[1]['Martes'][0] ?> </th>
            <th><?= $horario[2]['Miercoles'][0] ?> </th>
            <th><?= $horario[3]['Jueves'][0] ?> </th>
            <th><?= $horario[4]['Viernes'][0] ?> </th>
        </tr>
        <tr>
            <td><b>2ºHora</b></td>
            <th><?= $horario[0]['Lunes'][1] ?> </th>
            <th><?= $horario[1]['Martes'][1] ?> </th>
            <th><?= $horario[2]['Miercoles'][1] ?> </th>
            <th><?= $horario[3]['Jueves'][1] ?> </th>
            <th><?= $horario[4]['Viernes'][1] ?> </th>
        </tr>
        <tr>
            <td><b>3ºHora</b></td>
            <th><?= $horario[0]['Lunes'][2] ?> </th>
            <th><?= $horario[1]['Martes'][2] ?> </th>
            <th><?= $horario[2]['Miercoles'][2] ?> </th>
            <th><?= $horario[3]['Jueves'][2] ?> </th>
            <th><?= $horario[4]['Viernes'][2] ?> </th>
        </tr>
        <tr>
            <!-- En el recreo juntamos las celdas -->
            <td><b>Recreo</b></td>
            <td colspan="5"></td>
        </tr>

        <tr>
            <td><b>4ºHora</b></td>
            <th><?= $horario[0]['Lunes'][3] ?> </th>
            <th><?= $horario[1]['Martes'][3] ?> </th>
            <th><?= $horario[2]['Miercoles'][3] ?> </th>
            <th><?= $horario[3]['Jueves'][3] ?> </th>
            <th><?= $horario[4]['Viernes'][3] ?> </th>
        </tr>

        <tr>
            <td><b>5ºHora</b></td>
            <th><?= $horario[0]['Lunes'][4] ?> </th>
            <th><?= $horario[1]['Martes'][4] ?> </th>
            <th><?= $horario[2]['Miercoles'][4] ?> </th>
            <th><?= $horario[3]['Jueves'][4] ?> </th>
            <th><?= $horario[4]['Viernes'][4] ?> </th>
        </tr>

        <tr>
            <td><b>6ºHora</b></td>
            <th><?= $horario[0]['Lunes'][5] ?> </th>
            <th><?= $horario[1]['Martes'][5] ?> </th>
            <th><?= $horario[2]['Miercoles'][5] ?> </th>
            <th><?= $horario[3]['Jueves'][5] ?> </th>
            <th><?= $horario[4]['Viernes'][5] ?> </th>
        </tr>
    </table>

</body>
</html>