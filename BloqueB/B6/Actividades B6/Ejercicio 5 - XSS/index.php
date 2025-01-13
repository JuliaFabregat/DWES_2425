<!-- Ejercicio 5.2. Escapando contenido proporcionado por Usuarios (Pag. 86) -->

<!-- HTML -->
<?php include '../includes/header.php'; ?>

    <h1>Ejemplo XSS: Index</h1>
    
    <p>
        <!-- Enlace con un mensaje malicioso -->
        <a href="xss.php?msg=<script src='./js/bad.js'></script>">Link para nada malicioso, de verdad.</a> <br>

        <!-- Enlace con un saludo -->
        <a href="xss.php?msg=Hola Mundo">Hola Mundo</a> <br>

        <!-- Enlace con edición de texto -->
        <a href="xss.php?msg=<b>Mensaje con bold</b>">Holita, soy bold</a> <br>
        
    </p>

<?php include '../includes/footer.php'; ?>
