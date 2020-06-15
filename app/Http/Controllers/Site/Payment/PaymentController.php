<?php

namespace App\Http\Controllers\Site\Payment;

use App\Models\Basket;
use App\Repositories\Payment\PaymentRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller
{
    protected $payment;
    protected $request;

    public function __construct(PaymentRepositoryInterface $payment,Request $request)
    {
        $this->payment       = $payment;
        $this->request       = $request;
    }
    public function payment(Request $request)
    {
        $getDeliveryAddress = $request->get('deliveryAddress');
        $user_id = Auth::user()->id;
        $sessionId = Session::getId();

        try {
            $this->payment->salePayment($getDeliveryAddress,$user_id,$sessionId);
            $deleteBasket = Basket::where('user_id',$user_id)->where('sesid',$sessionId)->delete();
            return redirect()->back()->with('success', 'Siparişiniz Alındı.');
        } catch (Exception $e) {
            return redirect()->back()->with('danger', 'Siparişte Hata Oluştu.');
        }

    }
}
