<?php

require_once "products.php";

class ProductList
{
    private array $products = [];

    public function addProduct(Product $product)
    {
        $this->products[] = $product;
    }

    public function getProductById($id): ?Product
    {
        foreach ($this->products as $product) {
            if ($product->id === $id) {
                return $product;
            }
        }
        return null;
    }

    public function hasStock($id, $quantity): bool
    {
        $product = $this->getProductById($id);
        if ($product) {
            return $product->stock >= $quantity;
        }
        return false;
    }
}