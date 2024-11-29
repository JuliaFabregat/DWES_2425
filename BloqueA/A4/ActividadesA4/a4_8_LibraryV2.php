<?php
// Incluimos las clases
require_once './classes/LibraryV2.php';
require_once './classes/Book.php';

// Creamos el objeto Book ya que es necesario para la clase Library
$libros = [
    new Book('El Quijote', 'Cervantes', 200),
    new Book('1984', 'George Orwell', 328),
    new Book('To Kill a Mockingbird', 'Harper Lee', 281)
];

// Creamos una instancia de la clase Cuenta + sus propiedades
$biblioAthenas = new Library($libros, 'Athenas');

// Añadimos más libros
// Forma 1: $newBook = new Book("Hola Caracola", "Carmela", 150);
//          $biblioAthenas->addBook($newBook);
// Forma 2:
$biblioAthenas->addBook(new Book("Hola Caracola", "Carmela", 150));



// Eliminamos un libro
$biblioAthenas->removeBook(new Book("1984", "George Orwell", 328));

?>


<!-- HTML -->
<?php include 'includes/header.php'; ?>

    <!-- Mostramos el nombre de la librería -->
    <h2><?= $biblioAthenas->libraryName ?> Library</h2>

    <!-- Usamos el método showBooks para mostrar los libros -->
    <?php $biblioAthenas->showBooks(); ?>

<?php include 'includes/footer.php'; ?>