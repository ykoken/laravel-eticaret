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
        $data = Basket::join('products','products.id','=','basket.product_id')->where('user_id',Auth::user()->id)->where('sesid',Session::getId())->get();
        return view('site.basket.cart',compact('data'));
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


        $product = Product::find($id);
        if(!$product) {
            abort(404);
        }
        $cart = session()->get('cart');
        // if cart is empty then this the first product
        if(!$cart) {
            $cart = [
                $id => [
                    "product_name" => $product->product_name,
                    "quantity" => 1,
                    "price" => $product->price,
                    "product_image" => $product->product_image
                ]
            ];
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "product_name" => $product->product_name,
            "quantity" => 1,
            "price" => $product->price,
            "product_image" => $product->product_image
        ];
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }
    public function update(Request $request)
    {
        if($request->id and $request->quantity)
        {
            $cart = session()->get('cart');

            $cart[$request->id]["quantity"] = $request->quantity;

            session()->put('cart', $cart);

            session()->flash('success', 'Cart updated successfully');
        }
    }

    public function remove(Request $request)
    {
        if($request->id) {

            $cart = session()->get('cart');

            if(isset($cart[$request->id])) {

                unset($cart[$request->id]);

                session()->put('cart', $cart);
            }

            session()->flash('success', 'Product removed successfully');
        }
    }
}
