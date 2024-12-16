<!-- Ejemplo: Comprobación de Caracteres en una cadena (Pag 30) -->
<?php

// Variables
$text = '<h1>Mejora tu Productividad con 3 Pasos Sencillos<h1>
        <p>Establece prioridades claras, elimina distracciones y utiliza técnicas como el método Pomodoro.
        Reflexiona al final del día para ajustar y mejorar. ¡Tu tiempo vale oro! <p>';

// 1. Detectar la Primera y última aparición de la palabra "Tu"
$palPrimeraAparicion = stripos($text, 'tu');
$palUltimaAparicion = strripos($text, 'tu');

// 2. Encontrar la palabra clave "Pomodoro"
$palabraClave = str_contains($text, "Pomodoro");

// 3. Extraer partes del texto basadas en subcadenas específicas
$textoExtraido = strstr($text, "Reflexiona");

// 4. Comprobar si el texto comienza o termina con ciertas palabras
$comienzo = str_starts_with($text, "!");
$final = str_ends_with($text, "!");

?>

<!-- HTML -->
<?php include 'includes/header.php'; ?>

<?= $text ?>

<h1>Primera y última aparición de la palabra "Tu"</h1>
<ul>
    <li>Primera: <?= $palPrimeraAparicion ?></li>
    <li>Última: <?= $palUltimaAparicion ?></li>
</ul>

<br>

<h1>Encontrar Palabras Clave</h1>
<p>¿El texto contiene la palabra clave "Pomodoro"?: <?= $palabraClave ?></p>

<br>

<h1>Extraer partes del texto</h1>

<p>Reflexiona... <?= $textoExtraido ?></p>

<br>

<h1> Comprobar si el texto comienza o termina con "!"</h1>
<ul>
    <li>¿Comienza con "!"?: <?= $comienzo ?></li>
    <li>¿Termina con "!"?: <?= $final ?></li>
</ul>


<?php include 'includes/footer.php'; ?>