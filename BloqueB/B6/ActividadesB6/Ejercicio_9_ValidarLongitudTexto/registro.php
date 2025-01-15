<?php 
declare(strict_types = 1);

// Ejercicio 9. Validar Longitud de Texto (Pag. 144) y Validación de Pass (Pag. 152)

// Validando con $_POST
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // Recogemos los datos
    $nombre = $_POST['nombre'];
    $pass = $_POST['pass'];

    // VALIDACIÓN: Captamos el nombre
    $valid = nombreValido($nombre, 3, 8) && validarPass($pass);
    
    // Si la edad es válida mandamos los datos
    if($valid){
        $msg = 'Se ha registrado correctamente!<br>';

        $datos .= 'Nombre: ' . htmlspecialchars($nombre) . '<br>';
        $datos .= 'Password: ' . htmlspecialchars($pass) . '<br>';
    }
    else{
        $msg = '*Longitud del nombre y/o contraseña no válidos.*'; // Si la longitud del nombre o la contraseña no son válidos
    }
}

// Validar NOMBRE
function nombreValido($nombre, int $min = 0, int $max = 0): bool{
    $length = mb_strlen($nombre);
    return ($length >= $min and $length <= $max);
}

// Validar CONTRASEÑA
function validarPass($pass): bool{
    if(
        mb_strlen($pass) >= 8
        && preg_match('/[A-Z]/', $pass)
        && preg_match('/[a-z]/', $pass)
        && preg_match('/[0-9]/', $pass)
    )
    {
        return true;
    }

    return false;
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
    <p>Usuario:     <input type="text" name="nombre" value="<?= htmlspecialchars($nombre ?? '') ?>"></p>
    <p>Password:    <input type="password" name="pass"></p>
    
    <p><input type="submit" value="Registrar"></p>
</form>

<!-- Mostramos los datos -->
<?php if(!empty($datos)): ?>
    <p><?= $datos ?></p>
<?php endif; ?>


<?php include '../includes/footer.php'; ?>