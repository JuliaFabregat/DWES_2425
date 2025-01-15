<?php 
declare(strict_types = 1);

// Ejercicio 8. Validar NÚMEROS (Pag. 135)

// Validando con $_POST
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // Recogemos los datos
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $edad = $_POST['edad'];
    $posicion = $_POST['posicion'];
    $email = $_POST['email'];
    $tlf = $_POST['tlf'];

    // VALIDACIÓN: Captamos la edad
    $valid = edadValida($edad, 8, 16);
    
    // Si la edad es válida mandamos los datos
    if($valid){
        $msg = '*Edad válida*';

        $datos = 'Se ha registrado en Cordobita FC!<br>';
        $datos .= 'Nombre: ' . htmlspecialchars($nombre) . '<br>';
        $datos .= 'Apellido: ' . htmlspecialchars($apellido) . '<br>';
        $datos .= 'Edad: ' . htmlspecialchars($edad) . '<br>';
        $datos .= 'Posición: ' . htmlspecialchars($posicion) . '<br>';
        $datos .= 'E-mail: ' . htmlspecialchars($email) . '<br>';
        $datos .= 'Teléfono: ' . htmlspecialchars($tlf) . '<br>';
    }
    else{
        $msg = 'Edad no válida, introduce una edad entre 8-16'; // Si la edad no es válida, se muestra el msj de error
    }
}

// Función para detectar si la edad es válida
function edadValida($number, int $min = 0, int $max = 0): bool{
    return ($number >= $min and $number <= $max);
}
?>




<!-- HTML -->
<?php include '../includes/header.php'; ?>


<!-- Mostramos el mensaje de Error y volvemos a solicitar el formulario -->
<?php if(!empty($msg)): ?>
    <p><?= htmlspecialchars($msg) ?></p>
<?php endif; ?>


<h1>Formulario de Registro para CordobitaFC</h1>

<form action="registro.php" method="POST">
    <p>Nombre:      <input type="text" name="nombre" value="<?= htmlspecialchars($nombre ?? '') ?>"></p>
    <p>Apellido:    <input type="text" name="apellido" value="<?= htmlspecialchars($apellido ?? '') ?>"></p>
    <p>Edad:        <input type="number" name="edad" value="<?= htmlspecialchars($edad ?? '') ?>"></p>
    <p>Posición:    <input type="text" name="posicion" value="<?= htmlspecialchars($posicion ?? '') ?>"></p>
    <p>E-mail:      <input type="email" name="email" value="<?= htmlspecialchars($email ?? '') ?>"></p>
    <p>Teléfono:    <input type="text" name="tlf" value="<?= htmlspecialchars($tlf ?? '') ?>"></p>
    
    <p><input type="submit" value="Registrar"></p>
</form>

<!-- Mostramos los datos -->
<?php if(!empty($datos)): ?>
    <p><?= $datos ?></p>
<?php endif; ?>


<?php include '../includes/footer.php'; ?>