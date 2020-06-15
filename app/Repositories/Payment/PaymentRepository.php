<?php

namespace App\Repositories\Payment;


use App\Models\Basket;
use App\Models\Sales\Sale;
use App\Models\Sales\SaleProducts;
use Illuminate\Http\Request;

class PaymentRepository implements PaymentRepositoryInterface {
    protected $payment;
    protected $request;


    public function __construct(
        Request $request,
        Sale $payment
    )
    {
        $this->payment = $payment;
        $this->request = $request;
    }

    public function salePayment($getDeliveryAddress,$user_id,$sessionId)
    {
        $getBasket = Basket::where('user_id',$user_id)->where('sesid',$sessionId)->get();

        try {
            $saleId = $this->addSaleData($getBasket,$user_id,$getDeliveryAddress,$sessionId);
            $saleProduct = $this->addSaleProductData($getBasket,$saleId->id);

            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function addSaleData($data,$user_id,$deliveryAddress,$sessionId)
    {
        $saleData= [
            'user_id' =>$user_id,
            'delivery_address_id' => $deliveryAddress,
            'sales_code' => Rand(0,9999999),
            'sales_type' => 1,
            'sesid' => $sessionId,
            'total_price' => $data->sum('price')
        ];
        return Sale::create($saleData);
    }

    public function addSaleProductData($data,$saleId)
    {
        foreach ($data as $item) {
            $saleProductData = [
                'sale_id' => $saleId,
                'product_id' => $item->product_id,
                'quantity' => $item->amount,
            ];
            $save = SaleProducts::create($saleProductData);
        }

        if ($save){
            return true;
        }
    }
}
