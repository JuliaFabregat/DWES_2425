<?php 
include '../includes/sessions.php';

// Ejecuto el método de sessions.php
logout();

// Redirijo a la página principal
header('Location: index.php');
exit;

?>