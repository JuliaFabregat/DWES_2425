<?php
class Account {
    // PROPIEDADES ----
    public int $number;
    public string $type;
    protected float $balance;

    // CONSTRUCTOR ----
    public function __construct(int $number, string $type, float $balance = 0.00)
    {
        $this->number = $number;
        $this->type = $type;
        $this->balance = $balance;
    }


    // GETTERS Y SETTERS ----
    public function getBalance(): float
    {
        return $this->balance;
    }

    // MÉTODOS ----
    public function deposit(float $amount): float
    {
        $this->balance += $amount;
        return $this->balance;
    }

    public function withdraw(float $amount): float
    {
        $this->balance -= $amount;
        return $this->balance;
    }
}
?>