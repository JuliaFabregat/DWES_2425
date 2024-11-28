<?php
require_once 'Vehicle.php';

class Fleet {
    // Propiedades
    private $name;
    private $vehicles;

    // Constructor
    public function __construct($name) {
        $this->name = $name;
        $this->vehicles = [];
    }

    // Métodos
    public function addVehicle($vehicle) {
        $this->vehicles[] = $vehicle;
    }

    public function listVehicles() {
        $output = "<b>Concesionario</b>: {$this->name}<br><br>";
        foreach ($this->vehicles as $vehicle) {
            $output .= $vehicle->getDetails() . "<br>";
        }
        return $output;
    }

    public function listAvailableVehicles() {
        $output = "<b>Vehículos disponibles en el parque:</b> {$this->name}<br><br>";
        foreach ($this->vehicles as $vehicle) {
            if ($vehicle->isAvailable()) {
                $output .= $vehicle->getDetails() . "<br>";
            }
        }
        return $output;
    }
}
?>
