<?php
// PROCESAMIENTO PHP - LOGICA
include_once './class/RedSocial.php';

// Array
$intereses = [
    "Fotografía",
    "Lectura",
    "Deportes",
    "Cine",
    "Música"
];

// Crear un objeto de la clase RedSocial
$miRedSocial = new RedSocial($intereses);

// Procesar nuevo interes si existe en la URL
$nuevoInteres = filter_input(INPUT_GET, 'nuevo_interes', FILTER_SANITIZE_STRING);

if ($nuevoInteres) {
    $miRedSocial->agregarInteres($nuevoInteres);
    header("Location: b5_ej11_ActFinal_Main.php");
    exit();
}

// Obtener datos para la vista
$interesesLista = $miRedSocial->mostrarIntereses();

$miRedSocial->modificarInteres(2, "Pintura");

$interesesConID = $miRedSocial->numerarIntereses();

$interesesOrdenados = $miRedSocial->ordenarIntereses();

$nombreRedSocial = $miRedSocial->obtenerNombreRedSocial();

?>

// MOSTRAR LA VISTA
<?php include './includes/header.php'; ?>

<h2>Intereses:</h2>
<p><?php echo $interesesLista; ?></p>

<h3>Intereses numerados aleatoriamente:</h3>
<?php foreach ($interesesConID as $id => $interes): ?>
    <p>ID: <?php echo $id; ?> - Interés: <?php echo $interes; ?></p>
<?php endforeach; ?>

<h3>Intereses ordenados por interés y por ID:</h3>
<?php foreach ($interesesOrdenados as $id => $interes): ?>
    <p>ID: <?php echo $id; ?> - Interés: <?php echo $interes; ?></p>
<?php endforeach; ?>

<h3>Red Social: <?php echo $nombreRedSocial; ?></h3>

<p><b>Para agregar un nuevo interés, usa esta URL:</b></p>
<pre><?php echo $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>?nuevo_interes=NUEVO_INTERES</pre>

<?php include './includes/footer.php'; ?>
