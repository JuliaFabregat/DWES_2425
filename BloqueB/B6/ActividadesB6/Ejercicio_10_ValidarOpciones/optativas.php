<!-- Ejercicio 10. Validando Opciones (Pag. 164) -->

<?php
// Variables
$asignatura = '';
$msj = '';

// Array con asignaturas optativas
$optativas = ['Matemáticas', 'Física', 'Historia', 'Arte'];

// La Validación vale para ambas ya que es la misma
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // Captamos los datos
    $asignatura = $_POST['asignatura'] ?? '';

    // Comprobamos que es una opción válida
    $valid = in_array($asignatura, $optativas);

    if($valid){
        $msj = "Has seleccionado la Optativa: " . htmlspecialchars($asignatura);
    } else {
        $msj = "Por favor, selecciona una asignatura válida.";
    }
}

?>




<!-- HTML -->
<?php include '../includes/header.php'; ?>

<!-- Con RADIO BUTTON -->
<form action="optativas.php" method="POST">
    <h1>Asignaturas Optativas</h1>

    <?php foreach($optativas as $opcion) { ?>
        <?= $opcion ?> <input type="radio" name="asignatura" value="<?= $opcion ?>" <?= ($asignatura == $opcion) ? 'checked' : ''?>> <br>
    <?php } ?>
    
    <br>

    <input type="submit" value="Save">
</form>
<br>

<!-- Con SELECTED -->
<form action="optativas.php" method="POST">
    <h1>Asignaturas Optativas</h1>

    <select name="asignatura">
        <?php foreach($optativas as $opcion) { ?>
            <option value="<?= $opcion ?>" <?= ($asignatura == $opcion) ? 'selected' : '' ?>><?= $opcion ?></option>
        <?php } ?>
    </select>
    
    <br><br>

    <input type="submit" value="Save"> 
</form>

<br>

<!-- Mostramos mensaje del Selected -->
<?= $msj ?>

<?php include '../includes/footer.php'; ?>