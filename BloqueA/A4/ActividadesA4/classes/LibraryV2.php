<?php
declare(strict_types=1);

class Library{

    // PROPIEDADES
    public array $books;
    public string $libraryName;

    // CONSTRUCTORES
    public function __construct(array $books, string $libraryName)  // Array -> Clase Libro
    {
        $this->books = $books;
        $this->libraryName = $libraryName;
    }


    // GETTER Y SETTER
    // Método que obtiene la lista de libros en la biblioteca
    public function getBooks(): array{
        return $this->books;
    }


    // MÉTODOS
    // Método que permita añadir un libro a la biblioteca
    public function addBook(Book $objetoLibro){
        $this->books[] = $objetoLibro;    // Añadimos el libro al array de libros
    }

    // Método que permita eliminar un libro de la biblioteca por su título
    public function removeBook(Book $objetoLibro): bool{

        // Recorremos el array de libros con sus claves
        foreach ($this->books as $key => $b) {
            // Si encontramos un libro que coincide con el título, lo eliminamos
            if ($b->titulo === $objetoLibro->titulo) {
                unset($this->books[$key]);

                // Actualizamos el array de libros con los que no se han borrado
                $this->books = array_values($this->books);  // Reemplaza el "nuevo" array con los libros borrados con el antiguo

                return true;
            }
        }
        return false;
    }

    // Función que muestre los libros
    public function showBooks(): void {

        // Creamos la Unordered List
        echo "<ul>";

        // Bucle que muestra cada libro
        foreach ($this->books as $book) {
            echo "<li>" . $book->getTitle() . " by " . $book->getAuthor() . " (" . $book->getPages() . " pages)</li>";
        }

        echo "</ul>";
    }
}

?>