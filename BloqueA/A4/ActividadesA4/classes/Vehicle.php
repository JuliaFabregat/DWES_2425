<?php
// Clase que representa 1 vehículo
class Vehicle {
    // Propiedades
    private $make;
    private $model;
    private $licensePlate;
    private $available;

    // Constructor
    public function __construct($make, $model, $licensePlate, $available) {
        $this->make = $make;
        $this->model = $model;
        $this->licensePlate = $licensePlate;
        $this->available = $available;
    }

    // Métodos
    public function getDetails() {
        return "Marca: {$this->make} || Modelo: {$this->model} || Matrícula: {$this->licensePlate} || Disponible: " . ($this->available ? 'Sí' : 'No');
    }

    public function isAvailable() {
        return $this->available;
    }
}
?>
