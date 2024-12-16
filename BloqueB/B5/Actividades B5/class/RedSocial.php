<?php
// Definir la constante de la red social
define('RED_SOCIAL', 'NoSoyTikTokUwU');

// Clase RedSocial
class RedSocial {

    // Propiedad privada para almacenar los intereses
    private $intereses = [
        "Fotografía",
        "Lectura",
        "Deportes",
        "Cine",
        "Música"
    ];

    // Método para mostrar la lista de intereses como un string, separados por comas
    public function mostrarIntereses() {
        return implode(', ', $this->intereses);
    }

    // Método para agregar un nuevo interés (simulando la entrada del usuario)
    public function agregarInteres($nuevoInteres) {
        $this->intereses[] = $nuevoInteres;
    }

    // Método para modificar un interés
    public function modificarInteres($indice, $nuevoInteres) {
        if (isset($this->intereses[$indice])) {
            $this->intereses[$indice] = $nuevoInteres;
        }
    }

    // Método para numerar aleatoriamente los intereses con ID
    public function numerarIntereses() {
        $interesesConID = [];
        foreach ($this->intereses as $interes) {
            $idAleatorio = rand(1, 1000); // Generar un ID aleatorio
            $interesesConID[$idAleatorio] = $interes;
        }

        // Ordenar por ID
        ksort($interesesConID);

        return $interesesConID;
    }

    // Método para ordenar los intereses alfabéticamente y por ID
    public function ordenarIntereses() {
        $interesesConID = $this->numerarIntereses();
        asort($interesesConID); // Ordenar por interés alfabéticamente
        return $interesesConID;
    }

    // Método para obtener el nombre de la red social
    public function obtenerNombreRedSocial() {
        return RED_SOCIAL;
    }
}
