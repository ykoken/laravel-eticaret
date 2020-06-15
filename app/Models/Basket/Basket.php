<?php  namespace App\Models;


use App\Models\Products\Product;

class Basket extends \Eloquent{

    protected $table = 'basket';

    protected $fillable = [
        'user_id',
        'product_id',
        'sesid',
        'created_at',
        'amount',
        'price',
    ];

    protected $hidden = [
        'sesid',
        'user_id',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

}
