<?php
class Book{
    // PROPIEDADES
    public string $titulo;
    public string $autor;
    public int $paginas;

    // CONSTRUCTORES
    public function __construct(string $titulo, string $autor, int $paginas){
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->paginas = $paginas;
    }

    // MÉTODOS GETTER
    public function getTitle(): string {
        return $this->titulo;
    }

    public function getAuthor(): string {
        return $this->autor;
    }

    public function getPages(): int {
        return $this->paginas;
    }    
}
?>