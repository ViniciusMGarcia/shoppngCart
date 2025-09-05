<?php

class Product
{
    public $price;
    public $id;
    public $name;
    public $stock;

    public function __construct(float $price, int $id, string $name, int $stock)
    {
        $this->price = $price;
        $this->id = $id;
        $this->name = $name;
        $this->stock = $stock;
    }

    public function updateStock(int $quantity): bool
    {
        if ($this->stock >= $quantity) {
            $this->stock -= $quantity;
            return true;
        }
        return false;
    }
    
    public function returnStock(int $quantity)
    {
        $this->stock += $quantity;
    }
}