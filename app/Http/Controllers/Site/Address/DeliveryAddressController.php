<?php

namespace App\Http\Controllers\Site\Address;

use App\Http\Requests\Address\AddAddressRequest;
use App\Repositories\Address\DeliveryAddressRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DeliveryAddressController extends Controller
{

    protected $address;
    protected $request;

    public function __construct(DeliveryAddressRepository $deliveryAddressRepository, Request $request)
    {
        $this->request = $request;
        $this->address = $deliveryAddressRepository;
    }
    public function index()
    {

    }

    public function addAddress(AddAddressRequest $request)
    {
        $validated = $request->validated();
        try {
            $data = $this->request->only(
                'name',
                'mobile_number',
                'address',
                'city',
                'district',
                'idno'
            );

            $this->address->addAddress($data);

            return response()->json([
                'message' => null,
                'success' => true
            ]);
        } catch (RepositoryException $re) {
            return $this->response
                ->message('error', $re->getMessage())
                ->get($re->getStatusCode());
        }
    }
}
