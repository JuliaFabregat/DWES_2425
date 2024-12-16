<!-- Ejemplo: redirigir usuarios usando cabeceras HTTP (Pag 139) -->

<!-- // redirect.php -->
<?php
// Variables
// $logged_in = true;
$logged_in = false; // Si está en false, redirige a la página de login.php

// Confirmamos si el usuario está registrado
if ($logged_in == false) {
  header('Location: b5_ej9_Ejheader_login.php');
  exit;
}
?>

<?php include 'includes/header.php'; ?>
  <h1>Members Area</h1>
  <p>Welcome to the members area</p>
<?php include 'includes/footer.php'; ?>