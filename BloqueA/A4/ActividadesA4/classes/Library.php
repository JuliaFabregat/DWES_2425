<?php
declare(strict_types=1);

class Library{
    // PROPIEDADES
    public array $books;
    public string $libraryName;

    // CONSTRUCTORES
    public function __construct(array $books, string $libraryName)
    {
        $this->books = $books;
        $this->libraryName = $libraryName;
    }

    // GETTER Y SETTER

    // MÉTODOS
    // Método que permita añadir un libro a la biblioteca
    public function addBook(string $title){
        $this->books[] = $title;    // Añadimos el libro al array de libros
    }

    // Método que permita eliminar un libro de la biblioteca por su título
    public function removeBook(string $title){
        // Nuevo array para almacenar los libros que no coincidan con el título
        $updateBooks = [];

        // Recorremos el array de libros
        foreach($this->books as $book){
            // Si el libro no coincide con el título, lo añadimos al nuevo array
            if($book != $title){
                $updateBooks[] = $book;
            }
        }

        // Actualizamos el array de libros con los que no se han borrado
        $this->books = $updateBooks;
    }

    // Método que devuelva la lista de libros en la biblioteca
    public function getBooks(): array{
        return $this->books;
    }
}

?>