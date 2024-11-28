<?php
declare(strict_types = 1);

class Account{
    // PROPIEDADES ----
    public array $numbers; // Actualizamos la propiedad $number por $numbers ya que ahora es un array
    public string $type;
    protected float $balance; // No se puede acceder a esta propiedad fuera de la clase
    protected string $owner;    // Nueva propiedad privada
    public string $surname;




    // CONSTRUCTOR ----
    public function __construct(array $numbers, string $type, float $balance = 0.00, string $owner = '', string $surname = '')
    {
        $this->numbers  = $numbers;
        $this->type    = $type;
        $this->balance = $balance;
        $this->owner = $owner;  // Añadimos la nueva propiedad al constructor
                                // Le ponemos valor por defecto vacío para que no salte error
        $this->surname = $surname;
    }




    // GETTERS Y SETTERS ----
    public function getBalance(): float{
        // Permite acceder al balance, ya que lo hemos protegido
        return $this->balance;
    }

    public function getOwner(): string{
        // Obtenemos el nombre
        return $this->owner;
    }

    public function setOwner($nameOwner): void{
        // Establecemos el nombre
        $this->owner = $nameOwner;
    }




    // MÉTODOS ----
    public function deposit(float $amount): float{
        //Añade el valor pasado por parámetro a la propiedad balance y devuelve su nuevo valor
        $this->balance += $amount;

        return $this->balance;
        }

    public function withdraw(float $amount): float{
    // Quita el valor pasado por parámetro a la propiedad balance y devuelve su nuevo valor
    $this->balance -= $amount;

    return $this->balance;
    }
}
?>