<?php
// Definir constante para el nombre de la red social
define("NOMBRE_REDSOCIAL", "Intereses Juveniles");

// INCLUDES - Clase RedSocial
include 'RedSocial.php';

// OBJETO - Nuevo objeto RedSocial
$myInterests = array("Música", "Deportes", "Lectura", "Tecnología", "Cine", "Viajes");  // Array de intereses
$RS = new RedSocial($myInterests);

// Mostrar el nombre de la red social
// echo "<h1>Bienvenido a " . NOMBRE_REDSOCIAL . "!</h1>"; // USAMOS LA CONSTANTE

?>

<!-- HTML -->
<!-- Obtenemos el nombre de la RedSocial -->
<h1> Bienvenido a <?= $RS->getNameRS() ?> !</h1>

<!-- Muestra intereses en una línea -->
<h2>Muestra el listado de intereses en una sola línea separados por guiones</h2>
<p><?= $RS->getInterestsString() ?></p>

<!-- Muestra intereses con ID -->
<h2> Muestra el listado de intereses con ID </h2>
<?php
    $RS->generateIDs();
    $RS->showInterestsWithIDs();
?>

<!-- Muestra intereses ordenados por su ID -->
<h2> Ordena el listado de intereses por su ID </h2>
<?php
    $RS->orderByID();
    $RS->showInterestsWithIDs();
?>

<!-- Muestra intereses ordenados por el nombre del interés -->
<h2> Ordena el listado de intereses por el nombre del interés </h2>
<?php
    $RS->orderByInterestName();
    $RS->showInterestsWithIDs();
?>

<!-- Añadir un nuevo interés -->
<?php
    $numInterests = $RS->getNumInterests();

    // Modificar manualmente para ver el efecto (Cambiar > para que funcione)
    if ($RS->addInterest("Fotografía") < $numInterests) {
        header("Location: agradecimiento.php");
        exit();
    }

?>