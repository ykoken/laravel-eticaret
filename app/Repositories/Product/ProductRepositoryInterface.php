<?php

namespace App\Repositories\Product;

use App\Models\Product;

interface ProductRepositoryInterface
{
    public function addProduct(Product $product);
    public function getProductList();
    public function findProduct($id);
    public function editProduct($data,$id);
    public function deleteProduct($id);

}
