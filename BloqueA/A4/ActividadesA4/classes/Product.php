<?php

class Product{
    // PROPIEDADES
    public int $id;
    public string $name;
    public float $price;
    public int $stock;

    // CONSTRUCTOR
    public function __construct(int $id, string $name, float $price = 4.99, int $stock = 20)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->stock = $stock;
    }
}

?>