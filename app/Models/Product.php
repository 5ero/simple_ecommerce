<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Model;
;


class Product extends Model
{
	use HasFactory, sluggable, SluggableScopeHelpers;

	public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'product_name'
            ]
        ];
    }
	
	protected $fillable = [
		'product_name',
		'product_description',
		'product_price',
		'product_qty',
		'photo',
		'slug',
		'active',
		'category_id'
	];

	public function basket()
	{
		return $this->belongsTo(Basket::class);
	}

	public function category()
	{
		return $this->belongsTo(Category::class);
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
