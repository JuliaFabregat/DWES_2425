<!-- Ejercicio 7. Comprobar que se ha enviado un formulario (Pag. 120) -->

<?php include '../includes/header.php'; ?>

<h1>Formulario de Registro para CordobitaFC</h1>

<form>
    <p>Nombre:      <input type="text" name="nombre"></p>
    <p>Apellido:    <input type="text" name="apellido"></p>
    <p>Edad:        <input type="text" name="edad"></p>
    <p>Posición:    <input type="text" name="posicion"></p>

    <p><input type="submit" value="Save"></p>
</form>

<?php include '../includes/footer.php'; ?>