<!-- PHP -->
<?php
    // VARIABLES
    // ----------------------------------------
    // Array de los alumnos
    $alumnos=[
        ['alexgarcia'=>['Alex García', '14-03-2005', 'Madrid', '698997763', 'alex.garcia@example.com', 'No', 'Aprobado']],
        ['marialopez'=>['María López', '20-05-2005', 'Barcelona', '612321147', 'maria.lopez@example.com', 'Sí', 'Aprobado']],
        ['juanperez'=>['Juan Pérez', '08-11-2004', 'Sevilla', '677998844', 'juan.perez@example.com', 'No', 'Aprobado']],
        ['luciasanchez'=>['Lucía Sánchez', '22-09-2005', 'Valencia', '664889977', 'lucia.sanchez@example.com', 'Sí', 'Suspenso']],
        ['carlosmartinez'=>['Carlos Martinez', '05-01-2005', 'Zaragoza', '618997755', 'carlos.martinez@example.com', 'No', 'Suspenso']],
    ];

    // Array de Notas
    $notas=[
        ['alexgarcia'=>[[6,7,8,6,7],[5,6,7],[6,7,6,6],[8,7]]],
        ['marialopez'=>[[5,6,7,6,6],[6,5,7],[6,6,5,6],[6,7]]],
        ['juanperez' =>[[7,6,8,7,7],[6,7,6],[7,6,7,6],[8,6]]],
        ['luciasanchez' =>[[4,5,4,3,4],[5,5,6],[4,4,5,4],[5,4]]],
        ['carlosmartinez'=>[[5,4,5,4,5],[4,4,5],[5,4,4,4],[4,5]]],
    ];

    // ANTES -> Dividido por alumnos
    /* $notasAlex=[
        [6,7,8,6,7],
        [5,6,7],
        [6,7,6,6],
        [8,7]
    ]; */


    // LÓGICA
    // ----------------------------------------
    // ESTUDIANTE 1: Alex García (Aprobado)
    // Cálculos Finales
    //$finalMatAlex = ($notasAlex[0][0] + $notasAlex[0][1] + $notasAlex[0][2] + $notasAlex[0][3] + $notasAlex[0][4]) / 5;
    //$finalLengAlex = (($notasAlex[1][0] + $notasAlex[1][1]) * 0.4) + ($notasAlex[1][2] * 0.6);
    //$finalIngAlex = (($notasAlex[2][0] + $notasAlex[2][1] + $notasAlex[2][2] + $notasAlex[2][3])) / 5;
    //$finalTecAlex = (($notasAlex[3][0] * 0.8) + ($notasAlex[3][1] * 0.2));

    $finalMatAlex = (($notas[0]['alexgarcia'][0][0] + $notas[0]['alexgarcia'][0][1] + $notas[0]['alexgarcia'][0][2] + $notas[0]['alexgarcia'][0][3] + $notas[0]['alexgarcia'][0][4]) / 5);
    $finalLengAlex = ((($notas[0]['alexgarcia'][1][0] + $notas[0]['alexgarcia'][1][1]) * 0.4) + ($notas[0]['alexgarcia'][1][2]) * 0.6);
    $finalIngAlex = (($notas[0]['alexgarcia'][2][0] + $notas[0]['alexgarcia'][2][1] + $notas[0]['alexgarcia'][2][2] + $notas[0]['alexgarcia'][2][3]) / 4);
    $finalTecAlex = (($notas[0]['alexgarcia'][3][0] * 0.8) + ($notas[0]['alexgarcia'][3][1] * 0.2));

    // ESTUDIANTE 2: Maria Lopez (Aprobada)
    // Cálculos Finales
    //$finalMatMaria = ($notasMaria[0][0] + $notasMaria[0][1] + $notasMaria[0][2] + $notasMaria[0][3] + $notasMaria[0][4]) / 5;
    //$finalLengMaria = (($notasMaria[1][0] + $notasMaria[1][1]) * 0.4) + ($notasMaria[1][2] * 0.6);
    //$finalIngMaria = (($notasMaria[2][0] + $notasMaria[2][1] + $notasMaria[2][2] + $notasMaria[2][3])) / 5;
    //$finalTecMaria = (($notasMaria[3][0] * 0.8) + ($notasMaria[3][1] * 0.2));

    $finalMatMaria = (($notas[1]['marialopez'][0][0] + $notas[1]['marialopez'][0][1] + $notas[1]['marialopez'][0][2] + $notas[1]['marialopez'][0][3] + $notas[1]['marialopez'][0][4]) / 5);
    $finalLengMaria = ((($notas[1]['marialopez'][1][0] + $notas[1]['marialopez'][1][1]) * 0.4) + ($notas[1]['marialopez'][1][2]) * 0.6);
    $finalIngMaria = (($notas[1]['marialopez'][2][0] + $notas[1]['marialopez'][2][1] + $notas[1]['marialopez'][2][2] + $notas[1]['marialopez'][2][3]) / 4);
    $finalTecMaria = (($notas[1]['marialopez'][3][0] * 0.8) + ($notas[1]['marialopez'][3][1] * 0.2));
    

    // ESTUDIANTE 3: Juan Pérez (Aprobado)        
    // Cálculos Finales
    //$finalMatJuan = ($notasJuan[0][0] + $notasJuan[0][1] + $notasJuan[0][2] + $notasJuan[0][3] + $notasJuan[0][4]) / 5;
    //$finalLengJuan = (($notasJuan[1][0] + $notasJuan[1][1]) * 0.4) + ($notasJuan[1][2] * 0.6);
    //$finalIngJuan = (($notasJuan[2][0] + $notasJuan[2][1] + $notasJuan[2][2] + $notasJuan[2][3])) / 5;
    //$finalTecJuan = (($notasJuan[3][0] * 0.8) + ($notasJuan[3][1] * 0.2));

    $finalMatJuan = (($notas[2]['juanperez'][0][0] + $notas[2]['juanperez'][0][1] + $notas[2]['juanperez'][0][2] + $notas[2]['juanperez'][0][3] + $notas[2]['juanperez'][0][4]) / 5);
    $finalLengJuan = ((($notas[2]['juanperez'][1][0] + $notas[2]['juanperez'][1][1]) * 0.4) + ($notas[2]['juanperez'][1][2]) * 0.6);
    $finalIngJuan = (($notas[2]['juanperez'][2][0] + $notas[2]['juanperez'][2][1] + $notas[2]['juanperez'][2][2] + $notas[2]['juanperez'][2][3]) / 4);
    $finalTecJuan = (($notas[2]['juanperez'][3][0] * 0.8) + ($notas[2]['juanperez'][3][1] * 0.2));

    // ESTUDIANTE 4: Lucía Sánchez (Suspenso)        
    // Cálculos Finales
    //$finalMatLucia = ($notasLucia[0][0] + $notasLucia[0][1] + $notasLucia[0][2] + $notasLucia[0][3] + $notasLucia[0][4]) / 5;
    //$finalLengLucia = (($notasLucia[1][0] + $notasLucia[1][1]) * 0.4) + ($notasLucia[1][2] * 0.6);
    //$finalIngLucia = (($notasLucia[2][0] + $notasLucia[2][1] + $notasLucia[2][2] + $notasLucia[2][3])) / 5;
    //$finalTecLucia = (($notasLucia[3][0] * 0.8) + ($notasLucia[3][1] * 0.2));

    $finalMatLucia = (($notas[3]['luciasanchez'][0][0] + $notas[3]['luciasanchez'][0][1] + $notas[3]['luciasanchez'][0][2] + $notas[3]['luciasanchez'][0][3] + $notas[3]['luciasanchez'][0][4]) / 5);
    $finalLengLucia = (($notas[3]['luciasanchez'][1][0] + $notas[3]['luciasanchez'][1][1]) * 0.4) + ($notas[3]['luciasanchez'][1][2] * 0.6);
    $finalIngLucia = (($notas[3]['luciasanchez'][2][0] + $notas[3]['luciasanchez'][2][1] + $notas[3]['luciasanchez'][2][2] + $notas[3]['luciasanchez'][2][3]) / 4);
    $finalTecLucia = (($notas[3]['luciasanchez'][3][0] * 0.8) + ($notas[3]['luciasanchez'][3][1] * 0.2));
   

    // ESTUDIANTE 5: Carlos Martinez (Suspenso)
    // Cálculos Finales
    //$finalMatCarlos = ($notasCarlos[0][0] + $notasCarlos[0][1] + $notasCarlos[0][2] + $notasCarlos[0][3] + $notasCarlos[0][4]) / 5;
    //$finalLengCarlos = (($notasCarlos[1][0] + $notasCarlos[1][1]) * 0.4) + ($notasCarlos[1][2] * 0.6);
    //$finalIngCarlos = (($notasCarlos[2][0] + $notasCarlos[2][1] + $notasCarlos[2][2] + $notasCarlos[2][3])) / 4;
    //$finalTecCarlos = (($notasCarlos[3][0] * 0.8) + ($notasCarlos[3][1] * 0.2));
    $finalMatCarlos = (($notas[4]['carlosmartinez'][0][0] + $notas[4]['carlosmartinez'][0][1] + $notas[4]['carlosmartinez'][0][2] + $notas[4]['carlosmartinez'][0][3] + $notas[4]['carlosmartinez'][0][4]) / 5);
    $finalLengCarlos = (($notas[4]['carlosmartinez'][1][0] + $notas[4]['carlosmartinez'][1][1]) * 0.4) + ($notas[4]['carlosmartinez'][1][2] * 0.6);
    $finalIngCarlos = (($notas[4]['carlosmartinez'][2][0] + $notas[4]['carlosmartinez'][2][1] + $notas[4]['carlosmartinez'][2][2] + $notas[4]['carlosmartinez'][2][3]) / 4);
    $finalTecCarlos = (($notas[4]['carlosmartinez'][3][0] * 0.8) + ($notas[4]['carlosmartinez'][3][1] * 0.2));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exámen - Ejercicio 1</title>
</head>
<body>
    <!-- ESTUDIANTE 1: Alex García (Aprobado) -->
    <h1>Estudiante: <?= $alumnos[0]['alexgarcia'][0] ?></h1>
    <p><b>Fecha de Nacimiento:</b> <?= $alumnos[0]['alexgarcia'][1] ?></p>
    <p><b>Lugar de Residencia:</b> <?= $alumnos[0]['alexgarcia'][2] ?></p>
    <p><b>Teléfono:</b> <?= $alumnos[0]['alexgarcia'][3] ?></p>
    <p><b>Correo Electrónico:</b> <?= $alumnos[0]['alexgarcia'][4] ?></p>
    <p><b>Estado Repetidor:</b> <?= $alumnos[0]['alexgarcia'][5] ?></p>
    <br>
    <p>Nota Final Matematicas: <?= $finalMatAlex ?></p>
    <p>Nota Final Lengua: <?= $finalLengAlex ?></p>
    <p>Nota Final Ingles: <?= $finalIngAlex ?></p>
    <p>Nota Final Tecnología: <?= $finalTecAlex ?></p>
    <p>Estado: <b><?= $alumnos[0]['alexgarcia'][6] ?></b></p>
    <br>

    <!-- ESTUDIANTE 2: María López (Aprobado) -->
    <h1>Estudiante: <?= $alumnos[1]['marialopez'][0] ?></h1>
    <p><b>Fecha de Nacimiento:</b> <?= $alumnos[1]['marialopez'][1] ?></p>
    <p><b>Lugar de Residencia:</b> <?= $alumnos[1]['marialopez'][2] ?></p>
    <p><b>Teléfono:</b> <?= $alumnos[1]['marialopez'][3] ?></p>
    <p><b>Correo Electrónico:</b> <?= $alumnos[1]['marialopez'][4] ?></p>
    <p><b>Estado Repetidor:</b> <?= $alumnos[1]['marialopez'][5] ?></p>
    <br>
    <p>Nota Final Matematicas: <?= $finalMatMaria ?></p>
    <p>Nota Final Lengua: <?= $finalLengMaria ?></p>
    <p>Nota Final Ingles: <?= $finalIngMaria ?></p>
    <p>Nota Final Tecnología: <?= $finalTecMaria ?></p>
    <p>Estado: <b><?= $alumnos[1]['marialopez'][6] ?></b></p>
    <br>

    <!-- ESTUDIANTE 3: Juan Pérez (Aprobado) -->
    <h1>Estudiante: <?= $alumnos[2]['juanperez'][0] ?></h1>
    <p><b>Fecha de Nacimiento:</b> <?= $alumnos[2]['juanperez'][1] ?></p>
    <p><b>Lugar de Residencia:</b> <?= $alumnos[2]['juanperez'][2] ?></p>
    <p><b>Teléfono:</b> <?= $alumnos[2]['juanperez'][3] ?></p>
    <p><b>Correo Electrónico:</b> <?= $alumnos[2]['juanperez'][4] ?></p>
    <p><b>Estado Repetidor:</b> <?= $alumnos[2]['juanperez'][5] ?></p>
    <br>
    <p>Nota Final Matematicas: <?= $finalMatJuan ?></p>
    <p>Nota Final Lengua: <?= $finalLengJuan ?></p>
    <p>Nota Final Ingles: <?= $finalIngJuan ?></p>
    <p>Nota Final Tecnología: <?= $finalTecJuan ?></p>
    <p>Estado: <b><?= $alumnos[2]['juanperez'][6] ?></b></p>
    <br>
    
    <!-- ESTUDIANTE 4: Lucía Sánchez (Suspenso) -->
    <h1>Estudiante: <?= $alumnos[3]['luciasanchez'][0] ?></h1>
    <p><b>Fecha de Nacimiento:</b> <?= $alumnos[3]['luciasanchez'][1] ?></p>
    <p><b>Lugar de Residencia:</b> <?= $alumnos[3]['luciasanchez'][2] ?></p>
    <p><b>Teléfono:</b> <?= $alumnos[3]['luciasanchez'][3] ?></p>
    <p><b>Correo Electrónico:</b> <?= $alumnos[3]['luciasanchez'][4] ?></p>
    <p><b>Estado Repetidor:</b> <?= $alumnos[3]['luciasanchez'][5] ?></p>
    <br>
    <p>Nota Final Matematicas: <?= $finalMatLucia ?></p>
    <p>Nota Final Lengua: <?= $finalLengLucia ?></p>
    <p>Nota Final Ingles: <?= $finalIngLucia ?></p>
    <p>Nota Final Tecnología: <?= $finalTecLucia ?></p>
    <p>Estado: <b><?= $alumnos[3]['luciasanchez'][6] ?></b></p>
    <br>
    
    <!-- ESTUDIANTE 5: Carlos Martínez (Suspenso) -->
    <h1>Estudiante: <?= $alumnos[4]['carlosmartinez'][0] ?></h1>
    <p><b>Fecha de Nacimiento:</b> <?= $alumnos[4]['carlosmartinez'][1] ?></p>
    <p><b>Lugar de Residencia:</b> <?= $alumnos[4]['carlosmartinez'][2] ?></p>
    <p><b>Teléfono:</b> <?= $alumnos[4]['carlosmartinez'][3] ?></p>
    <p><b>Correo Electrónico:</b> <?= $alumnos[4]['carlosmartinez'][4] ?></p>
    <p><b>Estado Repetidor:</b> <?= $alumnos[4]['carlosmartinez'][5] ?></p>
    <br>
    <p>Nota Final Matematicas: <?= $finalMatCarlos ?></p>
    <p>Nota Final Lengua: <?= $finalLengCarlos ?></p>
    <p>Nota Final Ingles: <?= $finalIngCarlos ?></p>
    <p>Nota Final Tecnología: <?= $finalTecCarlos ?></p>
    <p>Estado: <b><?= $alumnos[4]['carlosmartinez'][6] ?></b></p>
    <br>
    
</body>
</html>