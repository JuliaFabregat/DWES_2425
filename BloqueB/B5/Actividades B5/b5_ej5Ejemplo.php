<!-- Ejemplo: funciones numéricas (Pag 76) -->

<!-- HTML -->
<?php include './includes/header.php'; ?>

<!-- Redondea el número al entero más cercano -->
<b>Round: </b>                      <?= round(9876.54321) ?> <br>

<!-- Redondea el número a 2 decimales -->
<b>Round to 2 decimal places: </b>  <?= round(9876.54321, 2) ?> <br>

<!-- Redondea medio hacia arriba (0.5 o mayor al próximo número superior) -->
<b>Round half up: </b>              <?= round(9876.54321, 2, PHP_ROUND_HALF_UP) ?> <br>

<!-- Redondea medio hacia abajo (0.5 o menor al número inferior) -->
<b>Round half down: </b>            <?= round(9876.54321, 2, PHP_ROUND_HALF_DOWN) ?> <br>

<!-- Redondea siempre hacia arriba -->
<b>Round up: </b>                   <?= ceil(1.23) ?> <br>

<!-- Redondea siempre hacia abajo -->
<b>Round down: </b>                 <?= floor(1.23) ?> <br>

<!-- Genera un número aleatorio entre 0 y 10 -->
<b>Random number: </b>              <?= rand(0, 10) ?> <br>

<!-- Calcula la potencia de un número (4^5) -->
<b>Exponential: </b>                <?= pow(4,5) ?> <br>

<!-- Calcula la raíz cuadrada de un número -->
<b>Square root: </b>                <?= sqrt(16) ?> <br>

<!-- Verifica si el valor es numérico -->
<b>Is a number: </b>                <?= is_numeric(123) ?> <br>

<!-- Formatea el número con 2 decimales y separadores personalizados -->
<b>Format number: </b>              <?= number_format(12345.67890, 2, ',', ' ') ?> <br>

<?php include './includes/footer.php'; ?>
