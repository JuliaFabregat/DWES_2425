<?php
// Clases importadas
require_once 'classes/Vehicle.php';
require_once 'classes/Fleet.php';

// Crear el concesionario de vehículos
$fleet = new Fleet("Concesionario Manolo e Hijos");

// Creammos los vehículos del oncesionario
$vehicle1 = new Vehicle("Toyota", "Corolla", "1234ABC", true);
$vehicle2 = new Vehicle("Ford", "Fiesta", "5678DEF", false);
$vehicle3 = new Vehicle("Honda", "Civic", "9012GHI", true);


// Agregar vehículos al concesionario
$fleet->addVehicle($vehicle1);
$fleet->addVehicle($vehicle2);
$fleet->addVehicle($vehicle3);

?>

<!-- // Mostrar la información del parque de vehículos -->
<?php include 'includes/header.php'; ?>
    <h1><b> <?= $fleet->name; ?> </b> <br></h1>

    <h2>Todos los Vehículos:</h2>
    <?= $fleet->listVehicles(); ?>

    <br><br>

    <h2>Vehículos Disponibles:</h2>
    <?= $fleet->listAvailableVehicles(); ?>

<?php include 'includes/footer.php'; ?>

