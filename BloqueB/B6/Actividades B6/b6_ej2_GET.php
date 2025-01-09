<?php 
// Array de ciudades
$cities = [
    'London'    => '48 Store Street, WC1E 7BS',
    'Sydney'    => '151 Oxford Street, 2021',
    'NYC'       => '1242 7th Street, 10492',
    'Tokio'     => '4 Akihabara, 0660',
];

// Obtenemos la ciudad
$city = $_GET['city'] ?? '';

// Si la ciudad existe, mostramos la dirección, sino mostramos los errores
if ($city === '') {
    $address = 'Please, select a city.';
} elseif (array_key_exists($city, $cities)) {
    $address = $cities[$city];
} else {
    $address = 'City not found.';
}
?>



<!-- HTML -->
<?php include '../Actividades B6/includes/header.php'; ?>


<!-- Mostramos cada ciudad del array -->
<?php foreach ($cities as $key => $value) { ?>
    <a href="b6_ej2_GET.php?city=<?= $key ?>"> <?= $key ?></a>
<?php }?>

<!-- Consultamos Tokio sin tenerlo añadido al Array -->
<!-- <a href="b6_ej2_GET.php?city=Tokio">Tokio</a> -->

<!-- Mostrar mensaje de dirección -->
<p><?= $address ?></p>


<?php include '../Actividades B6/includes/footer.php'; ?>