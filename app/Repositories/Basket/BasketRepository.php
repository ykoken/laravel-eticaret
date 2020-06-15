<?php

namespace App\Repositories\Basket;



use App\Models\Basket;
use App\Models\Products\Product;
use App\Repositories\Basket\BasketRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class BasketRepository implements BasketRepositoryInterface{
    protected $basket;
    protected $product;
    protected $request;

    public function __construct(
        Request $request,
        Basket $basket,
        Product $product
    )
    {
        $this->basket = $basket;
        $this->product = $product;
        $this->request = $request;

    }

    public function addProductToBasket($productId,$amount=1)
    {

        $memberId          = !is_null(Auth::user()) ? Auth::user()->id : 0;
        $sessionId         = Session::getId();

        $product = $this->product->where('id', $productId)->first();

        if (!$product || $product->status != 1) {
            return false;
        }
        $basketProducts = $this->getBasketProducts();

        $basketProducts = $this->basket
            ->where('sesid', $sessionId)
            ->where('product_id', $productId)
            ->get();

        if (sizeof($basketProducts) > 0) {

            $basketProduct              = $basketProducts->first();
            $existId                    = $basketProduct->id;
            $idList[]                   = $existId;
            $productIds                 = $basketProduct->product_id;
            $amounts                    = $basketProduct->amount + $amount;

            $this->updateBasketProduct($idList, $productIds, $amounts);

            return $this->getBasketProducts();
        }


        $basketProduct = $this->basket->create([
            'user_id'          => $memberId,
            'product_id'        => $productId,
            'sesid'            => Session::getId(),
            'created_at'       => Date::now(),
            'amount'           => $amount,
            'price'            => $product->price,
        ]);



        return $this->getBasketProducts();
    }

    public function getBasketProducts()
    {
        $sessionId =session()->getId();
        return $this->product
            ->rightJoin('basket', function ($join) use ($sessionId) {
                $join->on('basket.product_id', '=', 'products.id');
                $join->on('basket.sesid', '=', DB::raw("'" . $sessionId . "'"));
            })
            ->where('products.status', DB::raw(1))
             ->get();
    }

    public function updateBasketProduct($idList, $productIds, $amounts)
    {
        $this->removeProductFromBasket($idList);
        $this->addProductToBasket($productIds,$amounts);
    }

    public function removeProductFromBasket($idList)
    {
        $sessionId       = Session::getId();
        $memberId        = Auth::user() ? Auth::user()->id : null;

        return $baskets = $this->basket->where('user_id',$memberId)->where('sesid',$sessionId)->delete();
    }

    public function updateProductBasket($productId,$amount=1)
    {

        $memberId          = !is_null(Auth::user()) ? Auth::user()->id : 0;
        $sessionId         = Session::getId();

        $product = $this->basket->where('user_id',$memberId)->where('sesid',$sessionId)->first();

        $this->basket->where('id',$product->id)->update(['amount'=>$amount]);
        return $this->getBasketProducts();
    }

    public function removeProductBasket($id)
    {
        $this->basket->find($id)->delete();
        return $this->getBasketProducts();
    }
}

