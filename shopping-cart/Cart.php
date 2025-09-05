<?php

class Cart
{
    private $items = [];

    public function addItem(int $idProduct, int $quantity, float $subtotal)
    {
        foreach ($this->items as &$item) {
            if ($item['idProduct'] === $idProduct) {
                $item['quantity'] += $quantity;
                $item['subtotal'] += $subtotal;
                return;
            }
        }
        $this->items[] = [
            'idProduct' => $idProduct,
            'quantity'  => $quantity,
            'subtotal'  => $subtotal
        ];
    }
    
    public function removeItem(int $idProduct): bool
    {
        foreach ($this->items as $key => $item) {
            if ($item['idProduct'] === $idProduct) {
                unset($this->items[$key]);
                $this->items = array_values($this->items);
                return true;
            }
        }
        return false;
    }
    
    public function updateItem(int $idProduct, int $newQuantity, float $newSubtotal): bool
    {
        foreach ($this->items as &$item) {
            if ($item['idProduct'] === $idProduct) {
                $item['quantity'] = $newQuantity;
                $item['subtotal'] = $newSubtotal;
                return true;
            }
        }
        return false;
    }

    public function getItems(): array
    {
        return $this->items;
    }

    public function calculateTotal(string $coupon = null): float
    {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item['subtotal'];
        }

        if ($coupon === 'DESCONTO10') {
            $total *= 0.90;
        }

        return $total;
    }
}