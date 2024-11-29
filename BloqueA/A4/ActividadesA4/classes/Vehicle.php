<?php
// Clase que representa 1 vehículo
class Vehicle {
    // Propiedades
    public string $make;
    public string $model;
    public string $licensePlate;
    public bool $available;

    // Constructor
    public function __construct(string $make, string $model, string $licensePlate, bool $available) {
        $this->make = $make;
        $this->model = $model;
        $this->licensePlate = $licensePlate;
        $this->available = $available;
    }

    // Métodos
    public function getDetails(): string {
        return "<b>Marca:</b> {$this->make} <br>
                <b>Modelo:</b> {$this->model} <br>
                <b>Matrícula:</b> {$this->licensePlate} <br>
                <b>Disponible:</b> " . ($this->available ? 'Sí' : 'No') . "<br>";
    }

    public function isAvailable(): bool {
        // Devolvemos si está disponible o no
        return $this->available;
    }
}
?>
