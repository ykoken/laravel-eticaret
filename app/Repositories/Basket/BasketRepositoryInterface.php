<?php

namespace App\Repositories\Basket;

interface BasketRepositoryInterface
{
    public function addProductToBasket($productId,$amount =1);
    public function updateProductBasket($productId,$amount =1);
    public function removeProductBasket($productId);

}
