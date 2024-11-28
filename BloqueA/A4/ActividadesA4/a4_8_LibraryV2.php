<?php
// Incluimos las clases
include './classes/Library_v2.php';
include './classes/Book.php';

// Creamos el objeto Book ya que es necesario para la clase Library
$libros = [
    new Book('El Quijote', 'Cervantes', 200),
    new Book('1984', 'George Orwell', 328),
    new Book('To Kill a Mockingbird', 'Harper Lee', 281)
];

// Creamos una instancia de la clase Cuenta + sus propiedades
$biblioAthenas = new Library($libros, 'Athenas');

?>

<?php include 'includes/header.php'; ?>

    <!-- Mostramos el nombre de la librería -->
    <h2><?= $biblioAthenas->libraryName ?> Library</h2>
    <ul>
        <!-- Recorremos el array de libros -->
        <?php foreach($biblioAthenas->getBooks() as $libro): ?>
            <!-- Mostramos las propiedades de la clase Book con sus getter, ya que los hemos realizado esta vez -->
            <li><?= $libro->getTitle() ?> by <?= $libro->getAuthor() ?> (<?= $libro->getPages() ?> pages) </li>
        <?php endforeach; ?>
    </ul>

<?php include 'includes/footer.php'; ?>