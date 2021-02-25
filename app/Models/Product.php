<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	use HasFactory;
	
	protected $fillable = [
		'product_name',
		'product_description',
		'product_price',
		'product_qty',
		'photo',
		'active'
	];

	public function basket()
	{
		return $this->belongsTo(Basket::class);
	}

	public function getProductPriceAttribute($value)
    {
        return number_format($value, 2, '.', '');
    }

	public function setProductPriceAttribute($value)
	{
		$this->attributes['product_price'] = number_format($value, 2, '.', '');
	}

	
}
