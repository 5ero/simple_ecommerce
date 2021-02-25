<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
    use HasFactory;

    protected $fillable = [
    	'session_id',
    	'product_id',
    	'customer_id',
    	'quantity',
    	'price',
    	'total'
    ];

	public function getPriceAttribute($value)
    {
        return number_format($value, 2, '.', '');
    }

	public function getTotalAttribute($value)
    {
        return number_format($value, 2, '.', '');
    }

    public function products()
    {
    	return $this->hasMany(Product::class, 'id', 'product_id');
    }

}
