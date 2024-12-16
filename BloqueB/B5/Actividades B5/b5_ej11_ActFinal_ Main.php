<?php
// INCLUDES
include_once './class/RedSocial.php'; // Incluir la clase RedSocial desde la carpeta 'class'
include './includes/header.php';

// Crear un objeto de la clase RedSocial
$miRedSocial = new RedSocial();

// Verificar si hay un nuevo interés a través de la URL
if (isset($_GET['nuevo_interes'])) {
    // Agregar el nuevo interés a la lista
    $nuevoInteres = $_GET['nuevo_interes'];
    $miRedSocial->agregarInteres($nuevoInteres);
    // Redirigir a la misma página para evitar reenvío del formulario
    header("Location: b5_ej11_ActFinal_Main.php");
    exit();
}

// Mostrar la lista de intereses
echo "<h2>Intereses: </h2>";
echo $miRedSocial->mostrarIntereses() . "<br>";

// Modificar un interés (por ejemplo, cambiamos el índice 2 por "Pintura")
$miRedSocial->modificarInteres(2, "Pintura");

// Mostrar los intereses con ID aleatorio
$interesesConID = $miRedSocial->numerarIntereses();
echo "<h3>Intereses numerados aleatoriamente: </h3>";
foreach ($interesesConID as $id => $interes) {
    echo "ID: $id - Interés: $interes<br>";
}

// Mostrar los intereses ordenados por interés y por ID
$interesesOrdenados = $miRedSocial->ordenarIntereses();
echo "<h3>Intereses ordenados por interés y por ID: </h3>";
foreach ($interesesOrdenados as $id => $interes) {
    echo "ID: $id - Interés: $interes<br>";
}

// Mostrar el nombre de la red social
echo "<h3>Red Social: " . $miRedSocial->obtenerNombreRedSocial() . "</h3>";

// Agregar un nuevo interés a través de la URL
echo "<br><b>Para agregar un nuevo interés, puedes usar esta URL:</b> ";
echo "<pre>" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . "?nuevo_interes=NUEVO_INTERES</pre>";

// Incluimos el footer
include './includes/footer.php';
?>
