<?php

class Fleet {
    // Propiedades
    public string $name;
    public array $vehicles;

    // Constructor
    public function __construct(string $name, array $vehicles = []) {
        $this->name = $name;
        $this->vehicles = $vehicles;
    }

    // Métodos
    public function addVehicle($vehicle): void {
        $this->vehicles[] = $vehicle;
    }

    public function listVehicles() {
        // return $this->vehicles.

        // Variables
        $msj = "";

        // Mostramos la lista de vehículos
        foreach ($this->vehicles as $vehicle) {
            $msj .= $vehicle->getDetails() . "<br>";
        }

        // Mensaje de salida
        return $msj;
    }

    public function listAvailableVehicles() {
        // Variables
        $msj = "";

        // Comprueba si tiene la propiedad isAvailable()
        foreach ($this->vehicles as $vehicle) {
            if ($vehicle->isAvailable()) {

                // Formateamos el mensaje
                $msj .= $vehicle->getDetails() . "<br>";
            }
        }

        // Mensaje de salida
        return $msj;
    }
}
?>
