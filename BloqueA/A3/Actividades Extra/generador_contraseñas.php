<?php
// Variables
//$contar=0;
// Generar contraseñas aleatorias
/*function generar_contraseñas($cantidad,$longitud=4){
    global $contar;
    for($i=0;$i<=$cantidad;$i++){
        $numeros=rand(1,10);
        $contar+=1;
    }
    return $numeros;
}*/

function generatePassword($longitud)
{
    static $contador=1;

    $contrasena = "";
    $codigos = "1234567890abcdefghijklmnopqrstuvwxyz";
    // Longitud max que se va a crear
    $max = strlen($codigos)-1;
    for($i = 0; $i < $longitud; $i++){
        // El punto te concatena un numero detras de otro el mt_rand (es lo mismo pero mas rapido)
        $contrasena .= substr($codigos, rand(0,$max), 1);
    }
    echo "Contraseñas creadas: ".$contador++."<br>";
    return $contrasena;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generador de Contraseñas</title>
</head>
<body>
    <h1>Generar contraseñas</h1>
    <?php for ($i=1;$i<=4;$i++){?>
    <p><?= generatePassword(8)?></p>
    <?php }?>
    
</body>
</html>