<?php
// Obtener el mensaje de la cadena de consulta, con un valor predeterminado
$message = $_GET['msg'] ?? 'Haz clic en el enlace para enviar un mensaje.';

// Escapar caracteres especiales usando htmlspecialchars()
$msjEscapado = htmlspecialchars($message, ENT_QUOTES, 'UTF-8');
// $msjEscapado = htmlspecialchars($message, ENT_QUOTES, 'UTF-8');      // Escapa AMBAS comillas (simples y dobles)
// $msjEscapado = htmlspecialchars($message, ENT_NOQUOTES, 'UTF-8');    // NO escapa comillas simples NI dobles
// $msjEscapado = htmlspecialchars($message, ENT_COMPAT, 'UTF-8');      // Escapa SOLO comillas dobles

?>

<!-- HTML -->
<?php include '../includes/header.php'; ?>

    <h1>Ejemplo XSS</h1>
    <p>Mensaje recibido: <?= $msjEscapado; ?></p>

    <a href="index.php">Volver</a>

    <!-- Para comprobar que salta el alert si no escapamos el <p> con $msjEscapado y $msjEscapado = htmlspecialchars() de arriba -->
    <!-- <p> <?//= $message; ?> </p> -->

<?php include '../includes/footer.php'; ?>
