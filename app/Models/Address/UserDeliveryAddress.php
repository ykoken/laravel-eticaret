<?php

namespace App\Models\Address;

use Illuminate\Database\Eloquent\Model;

class UserDeliveryAddress extends Model
{
    protected $table = 'user_delivery_address';
    protected $guarded = ['id'];
}
