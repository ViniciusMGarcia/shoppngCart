<?php

require_once "Cart.php";
require_once "products.php";
require_once "listProducts.php";

$productList = new ProductList();
$product1 = new Product(10.50, 1, 'Caneta', 50);
$product2 = new Product(25.00, 2, 'Caderno', 20);
$product3 = new Product(5.00, 3, 'Borracha', 10);

$productList->addProduct($product1);
$productList->addProduct($product2);
$productList->addProduct($product3);

$cart = new Cart();

echo "--- Caso 1: Adicionar produto valido ---<br>";
$quantity1 = 2;
$productCaneta = $productList->getProductById(1);
if ($productList->hasStock(1, $quantity1)) {
    $cart->addItem($productCaneta->id, $quantity1, $productCaneta->price * $quantity1);
    $productCaneta->updateStock($quantity1);
    echo "{$quantity1}x {$productCaneta->name} adicionado. Estoque restante: {$productCaneta->stock}<br>";
}

echo "<br>--- Estado atual do carrinho ---<br>";
foreach ($cart->getItems() as $item) {
    $product = $productList->getProductById($item['idProduct']);
    echo "Produto: {$product->name}, Quantidade: {$item['quantity']}, Subtotal: R$" . number_format($item['subtotal'], 2, ',', '.') . "<br>";
}

echo "<br>--- Caso 2: Adicionar alem do estoque ---<br>";
$quantity3 = 10;
$productBorracha = $productList->getProductById(3);
if ($productList->hasStock(3, $quantity3)) {
    $cart->addItem($productBorracha->id, $quantity3, $productBorracha->price * $quantity3);
    $productBorracha->updateStock($quantity3);
    echo "{$quantity3}x {$productBorracha->name} adicionado. Estoque restante: {$productBorracha->stock}<br>";
} else {
    echo "Erro: Estoque insuficiente para o produto {$productBorracha->name}<br>";
}

echo "<br>--- Adicionando um caderno para demonstracao do caso 3 ---<br>";
$quantity2 = 1;
$productCaderno = $productList->getProductById(2);
if ($productList->hasStock(2, $quantity2)) {
    $cart->addItem($productCaderno->id, $quantity2, $productCaderno->price * $quantity2);
    $productCaderno->updateStock($quantity2);
    echo "{$quantity2}x {$productCaderno->name} adicionado. Estoque restante: {$productCaderno->stock}<br>";
}

echo "<br>--- Estado do carrinho antes da remocao ---<br>";
foreach ($cart->getItems() as $item) {
    $product = $productList->getProductById($item['idProduct']);
    echo "Produto: {$product->name}, Quantidade: {$item['quantity']}, Subtotal: R$" . number_format($item['subtotal'], 2, ',', '.') . "<br>";
}

echo "<br>--- Caso 3: Remover produto do carrinho ---<br>";
$idToRemove = 2;
$itemToRemove = null;
foreach ($cart->getItems() as $item) {
    if ($item['idProduct'] === $idToRemove) {
        $itemToRemove = $item;
        break;
    }
}
if ($itemToRemove && $cart->removeItem($idToRemove)) {
    $productToRemove = $productList->getProductById($idToRemove);
    $productToRemove->returnStock($itemToRemove['quantity']);
    echo "{$productToRemove->name} removido. Estoque restaurado: {$productToRemove->stock}<br>";
}

echo "<br>--- Estado do carrinho após a remocao ---<br>";
if (empty($cart->getItems())) {
    echo "Carrinho esta vazio.<br>";
} else {
    foreach ($cart->getItems() as $item) {
        $product = $productList->getProductById($item['idProduct']);
        echo "Produto: {$product->name}, Quantidade: {$item['quantity']}, Subtotal: R$" . number_format($item['subtotal'], 2, ',', '.') . "<br>";
    }
}

echo "<br>--- Caso 4: Aplicacao de cupom de desconto ---<br>";
$totalWithoutDiscount = $cart->calculateTotal();
echo "Total do carrinho (sem desconto): R$" . number_format($totalWithoutDiscount, 2, ',', '.') . "<br>";

$discountedTotal = $cart->calculateTotal('DESCONTO10');
echo "Total com cupom 'DESCONTO10' (10% de desconto): R$" . number_format($discountedTotal, 2, ',', '.') . "<br>";