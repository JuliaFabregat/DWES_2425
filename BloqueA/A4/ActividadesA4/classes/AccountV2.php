<?php
declare(strict_types = 1);

class Account {
    // PROPIEDADES ----
    public AccountNumber $number; // Cambiado a singular
    public string $type;
    protected float $balance;

    // CONSTRUCTOR ----
    public function __construct(AccountNumber $number, string $type, float $balance = 0.00) {
        $this->number = $number; // Cambiado a singular
        $this->type = $type;
        $this->balance = $balance;
    }

    // GETTERS Y SETTERS ----
    public function getBalance(): float {
        // Permite acceder al balance, ya que lo hemos protegido
        return $this->balance;
    }

    // MÉTODOS ----
    public function deposit(float $amount): float {
        // Añade el valor pasado por parámetro a la propiedad balance y devuelve su nuevo valor
        $this->balance += $amount;
        return $this->balance;
    }

    public function withdraw(float $amount): float {
        // Quita el valor pasado por parámetro a la propiedad balance y devuelve su nuevo valor
        $this->balance -= $amount;
        return $this->balance;
    }
}
?>

<?php
class AccountNumber {
    // PROPIEDADES
    public int $accountNumber;
    public int $routingNumber;

    // CONSTRUCTOR
    public function __construct(int $accountNumber, int $routingNumber) {
        $this->accountNumber = $accountNumber;
        $this->routingNumber = $routingNumber;
    }
}
?>