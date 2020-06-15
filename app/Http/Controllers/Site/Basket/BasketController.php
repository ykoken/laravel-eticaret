<?php

namespace App\Http\Controllers\Site\Basket;

use App\Models\Basket;
use App\Models\Products\Product;
use App\Repositories\Basket\BasketRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class BasketController extends Controller
{
    protected $basket;
    protected $request;
    public function __construct(BasketRepositoryInterface $basket, Request $request)
    {
        $this->basket = $basket;
        $this->request = $request;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function basket()
    {
        $baskets = Basket::join('products','products.id','=','basket.product_id')
            ->where('user_id',Auth::user()->id)
            ->where('sesid',Session::getId())
            ->selectRaw('basket.id as id,user_id,product_id,products.price as price,basket.price as basket_price,sesid,amount, product_name,product_code,stock,product_image,product_description,status')
            ->get();
        return view('site.basket.cart',compact('baskets'));
    }

    public function addBasket()
    {
        try {
            $this->basket->addProductToBasket(
                $this->request->get('id'),
                $this->request->get('amount')
            );

            return redirect()->back()->with('success', 'Ürün Eklendi.');
        } catch (Exception $e) {
            return redirect()->back()->with('danger', 'Ürün Eklenemedi.');
        }

    }
    public function update(Request $request)
    {

        try {
            $this->basket->updateProductBasket(
                $this->request->get('id'),
                $this->request->get('quantity')
            );

            return redirect()->back()->with('success', 'Sepet Güncellendi.');
        } catch (Exception $e) {
            return redirect()->back()->with('danger', 'Sepet Güncellenemedi.');
        }
    }

    public function remove(Request $request)
    {
        try {
            $this->basket->removeProductBasket(
                $this->request->get('id'),
            );

            return redirect()->back()->with('success', 'Ürün Silindi.');
        } catch (Exception $e) {
            return redirect()->back()->with('danger', 'Ürün Silinirken Hata Oluştu.');
        }
    }
}
