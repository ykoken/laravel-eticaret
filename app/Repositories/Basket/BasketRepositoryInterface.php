<?php

namespace App\Repositories\Basket;

interface BasketRepositoryInterface
{
    public function addProductToBasket($productId,$amount =1);

}
