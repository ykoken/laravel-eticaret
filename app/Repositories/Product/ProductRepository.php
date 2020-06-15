<?php

namespace App\Repositories\Product;



use App\Concerns\FileUploadTrait;
use App\Models\Products\Product;
use Illuminate\Http\Request;

class ProductRepository implements ProductRepositoryInterface{
    protected $product;
    protected $request;

    use FileUploadTrait;

    public function __construct(
        Request $request,
        Product $product
    )
    {
        $this->product = $product;
        $this->request = $request;
    }

    public function addProduct($data)
    {
        if ($data['product_image']){
            $data['product_image'] = $this->__fileuploads($data['product_image'],'products');
        }
        return Product::create($data);
    }
    public function editProduct($data,$id)
    {
        return Product::where('id',$id)->update($data);
    }

    public function getProductList()
    {
        return Product::all();
    }
    public function findProduct($id)
    {
        return Product::find($id);
    }

    public function deleteProduct($id)
    {
        return Product::find($id)->delete();
    }
}
