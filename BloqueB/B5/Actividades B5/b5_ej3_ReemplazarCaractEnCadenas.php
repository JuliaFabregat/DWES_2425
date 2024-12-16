<!-- Ejemplo: Reemplazando Caracteres en una cadena (Pag 41)
1. Configura el Script PHP:
    - Crea un archivo PHP llamado procesar_datos.php
    - Define variables para simular datos de entrada de un usuario:
    $nombre, $correo , y $mensaje

2. Muestra los Datos Originales:
    - Utiliza echo para mostrar en pantalla los datos originales.

3. Realiza las Siguientes Operaciones de Manipulación de Cadenas:
    - Eliminar Espacios en Blanco Adicionales: Utiliza trim() para eliminar los
    espacios en blanco al inicio y al final de las cadenas.
    - Asegurar que el Correo Está en Minúsculas: Aplica strtolower()  para convertir
    toda la cadena a minúsculas.
    - Reemplazar Ciertas Palabras en el Mensaje: Utiliza str_replace()  para
    reemplazar palabras inapropiadas con "****".
    - Reemplazo Insensible a Mayúsculas/Minúsculas: Emplea str_ireplace()  para
    reemplazar "urgente" con "Prioridad Alta".
    - Repetir una Cadena para Enfatizar: Añade "!!!" al final del mensaje usando
    str_repeat() .

4. Muestra los Datos Procesados:
    - Utiliza echo para mostrar en pantalla los datos después de haber sido
    procesados. 
-->

<?php
// Variables
$nombre = 'Pepito';
$correo = 'pepitoOo69@gmail.com';
$mensaje = 'Hola, soy tu Pepito favorito.';
// Variable para la cadena completa
$frase = "Nombre: $nombre <br> Correo: $correo <br> Mensaje: $mensaje<br>";

// Eliminar Espacios en Blanco Adicionales
$nombre = trim($nombre);
$correo = trim($correo);
$mensaje = trim($mensaje);

// Asegurar que el Correo Está en Minúsculas
$correo = strtolower($correo);

// Reemplazar Ciertas Palabras en el Mensaje - Reemplaza el texto 'tu' por '**'
$mensaje = str_replace('tu', '**', $mensaje);

// Reemplazo Insensible a Mayúsculas/Minúsculas
$mensaje = str_ireplace('favorito', 'Mega Favorito', $mensaje);

// Repetir una Cadena para Enfatizar
$mensaje = str_repeat($mensaje . "!!! <br>", 2);

// Variable para la cadena completa
$fraseEditada = "Nombre: $nombre <br> Correo: $correo <br> Mensaje: $mensaje<br>";

?>

<!-- HTML -->
<?php include './includes/header.php'; ?>

<!-- Mostramos la salida de datos -->
<?= $frase ?>

<br><hr><br>

<?= $fraseEditada ?>

<?php include './includes/footer.php'; ?>
