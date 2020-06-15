<?php

namespace App\Repositories\Address;

 use App\Models\Address\UserDeliveryAddress;
use Illuminate\Http\Request;
 use Illuminate\Support\Facades\Auth;

 class DeliveryAddressRepository implements DeliveryAddressRepositoryInterface {
    protected $address;
    protected $request;


    public function __construct(
        Request $request,
        UserDeliveryAddress $address
    )
    {
        $this->address = $address;
        $this->request = $request;
    }

    public function addAddress($data)
    {
        $data['user_id'] = Auth::user()->id;
        return $this->address->create($data);
    }
    public function editAddress($data,$id)
    {
        return  $this->address->where('id',$id)->update($data);
    }

}
