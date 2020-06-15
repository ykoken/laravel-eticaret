<?php

namespace App\Repositories\Address;

use App\Models\Address\UserDeliveryAddress;

interface DeliveryAddressRepositoryInterface
{
    public function addAddress($data);
    public function editAddress($data,$id);

}
