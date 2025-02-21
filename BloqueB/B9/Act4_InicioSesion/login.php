<!-- LOGIN -->
<?php 
include '../includes/sessions.php';

// Variables
$msg = '';

// Si ya se ha loggeado, redirigir a la página de cuenta
if ($logged_in) {
    header('Location: account.php');
    exit;
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // Obtenemos los datos del formulario
    $email = $_POST['username'];
    $pass = $_POST['password'];

    // Si el usuario está registrado - Datos en sessions.php
    if($email == $validEmail && $pass == $validPassword){
        // Iniciar sesión - sessions.php
        login();

        // Redirigir a la página de cuenta
        header('Location: account.php');
        exit;
    } else {
        $msg = 'Usuario o contraseña incorrectos';
    }
}

?>

<!-- HTML -->
<?php include '../includes/header.php'; ?>

<h1>Login</h1>

<?= $msg ?>

<form action="login.php" method="POST">
    <label for="username">User:</label>
    <input type="text" name="username" id="username" required>

    <br><br>

    <label for="password">Password:</label>
    <input type="password" name="password" id="password" required>

    <br><br>

    <input type="submit" value="LOG IN">
</form>

<?php include '../includes/footer.php'; ?>


