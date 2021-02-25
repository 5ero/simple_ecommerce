<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

	public function getRouteKeyName()
	{	
    	return 'order_no';
	}

    protected $fillable = [
    	'order_no',
    	'products',
    	'customer_id',
    	'status',
		'order_value',
    	'shipped',
    	'shipped_date'
    ];

    protected $casts = [
    	'products' => 'array',
	];

	public function setOrderValueAttribute($value)
	{
		$this->attributes['order_value'] = number_format($value, 2, '.', '');
	}

	public function getOrderValueAttribute($value)
	{
		return number_format($value, 2, '.', '');
	}

	public function customer()
	{
		return $this->belongsTo(Customer::class);
	}


}
