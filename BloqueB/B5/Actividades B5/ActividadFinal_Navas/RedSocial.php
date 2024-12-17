<?php
class RedSocial
{
    // PROPIEDADES
    private array $interests;           // Array indexado
    private array $interestsWithIDs;    // Array asociativo
    private const NAME_RS = "Intereses Juveniles";



    // CONSTRUCTOR
    public function __construct(array $nIntereses = [])
    {
        $this->interests = $nIntereses; // Se rellena el array indexado
        $this->interestsWithIDs = [];   // Se inicializa el array asociativo a vacío
    }



    // GETTERS
    public function getInterests(): array
    {
        return $this->interests;
    }

    public function getInterestsWithIDs(): array
    {
        return $this->interestsWithIDs;
    }

    public function getNameRS(): string
    {
        return self::NAME_RS;
    }


    // MÉTODOS
    public function generateIDs(): void
    {
        // Inicializamos el array vacío para poder rellenarlo
        $this->interestsWithIDs = [];

        foreach ($this->interests as $int) {
            // Generamos la ID con mt_rand() que elige un número entre el 1
            // y el número de elementos del array de intereses
            $newID = mt_rand(1, count($this->interests));

            // Mientras que la ID generada ya exista en el array de $interestsWithIDs
            // generamos una nueva ID
            while (array_key_exists($newID, $this->interestsWithIDs)) {
                $newID = mt_rand(1, count($this->interests));
            }

            // Añadimos el interés con su ID al array asociativo
            $this->interestsWithIDs[$newID] = $int;
        }
    }

    // Función que devuelve los intereses en una sola línea separados por guiones
    public function getInterestsString(): string
    {
        return implode(" - ", $this->interests);
    }

    public function showInterestsWithIDs(): void
    {
        echo "<ul>";

        foreach ($this->interestsWithIDs as $id => $int) {
            echo "<li>";
            echo "{$int} ({$id})";
            echo "</li>";
        }

        echo "</ul><br>";
    }

    /*
     * Ordena el array de intereses con IDs y lo devuelve
     */
    public function orderByID(): void {
        ksort($this->interestsWithIDs);    
    }

    public function orderByInterestName(): void {
        asort($this->interestsWithIDs);
    }

    // Método para añadir un nuevo interés
    public function addInterest(string $nInterest): int {
        return array_push($this->interests, $nInterest);
    }

    // Método para obtener el número de intereses
    public function getNumInterests(): int {
        return count($this->interests);
    }
}

?>