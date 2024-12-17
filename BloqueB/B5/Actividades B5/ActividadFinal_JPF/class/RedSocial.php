<?php
// Definir la constante de la red social
define('RED_SOCIAL', 'NoSoyTikTokUwU');

// Clase RedSocial
class RedSocial {

    // Propiedad privada para almacenar los intereses
    private array $intereses;
    private array $interesesConID;

    // Constructor
    public function __construct(array $intereses = []) {
        $this->intereses = $intereses;
        $this->interesesConID = [];
    }

    // Método para mostrar la lista de intereses como un string, separados por comas
    public function mostrarIntereses(): string {
        return implode(', ', $this->intereses);
    }

    // Método para agregar un nuevo interés
    public function agregarInteres($nuevoInteres): void {
        $this->intereses[] = $nuevoInteres;
    }

    // Método para modificar un interés
    public function modificarInteres($indice, $nuevoInteres): void {
        if (array_key_exists($indice, $this->intereses)) {
            $this->intereses[$indice] = $nuevoInteres;
        }
    }

    // Método para numerar aleatoriamente los intereses con ID
    public function numerarIntereses(): array {
        $this->interesesConID = [];
        
        foreach ($this->intereses as $interes) {
            do {
                $newID = rand(1, count($this->intereses) * 2); // Generar un ID aleatorio
            } while (array_key_exists($newID, $this->interesesConID));
            
            $this->interesesConID[$newID] = $interes;
        }
        
        return $this->interesesConID;
    }

    // Método para ordenar los intereses alfabéticamente y devolverlos
    public function ordenarIntereses(): array {
        $interesesConID = $this->numerarIntereses();
        asort($interesesConID); // Ordenar por valor (intereses) alfabéticamente
        return $interesesConID;
    }

    // Método para obtener el nombre de la red social
    public function obtenerNombreRedSocial(): string {
        return RED_SOCIAL;
    }
}
