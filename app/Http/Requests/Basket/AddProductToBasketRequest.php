<?php namespace App\Http\Requests\Basket;

use App\Http\Requests\Request;

class AddProductToBasketRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id'                => 'required|integer',
            'amount'            => 'required|integer|min:1'
        ];
    }
}
