<?php
// Incluimos la clase ya que la hemos independizado
include './classes/Library.php';

// Rellenamos el array de la biblioteca con los titulos de los libros
$conjuntoLibros = [
    'El nombre del viento',
    'La vida a veces no es como queremos',
    'No se me ocurren más',
    'Aguacate',
];

// Creamos una biblioteca
$biblioVentura = new Library($conjuntoLibros, 'Ventura Bibli');

// Añadimmos un libro a la biblioteca
$biblioVentura->addBook('La vie et belle');

// Eliminamos un libro de la biblioteca
$biblioVentura->removeBook('No se me ocurren más');

// Obtenemos la lista de libros una vez que hemos añadido y eliminado los que queramos
$librosBibliotecaVentura = $biblioVentura->getBooks();
?>

<?php include 'includes/header.php'; ?>

  <h2><?= $biblioVentura->libraryName ?> Library</h2>   <!-- Mostramos el nombre de la librería -->
    <ul>
        <?php foreach($librosBibliotecaVentura as $libro): ?>  <!-- Recorremos el array de libros -->
            <li><?= $libro ?></li>  <!-- Mostramos el título del libro -->
        <?php endforeach; ?>
    </ul>

<?php include 'includes/footer.php'; ?>