<?php

namespace App\Repositories\Payment;


interface PaymentRepositoryInterface
{
    public function salePayment($getDeliveryAddress,$user_id,$sessionId);


}
