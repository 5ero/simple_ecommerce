<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use HiHaHo\EncryptableTrait\Encryptable;

class Customer extends Model
{
    use HasFactory, Encryptable;

    protected $encryptable = [
    	'name',
    	'address_1',
    	'address_2',
    	'address_3',
    	'city',
    	'county',
    	'postcode',
    	'telephone',
    	'email'
    ];

    protected $fillable = [
        'name',
        'address_1',
        'address_2',
        'address_3',
        'city',
        'county',
        'postcode',
        'telephone',
        'email'
    ];

    public function order()
    {
        return $this->hasMany(Order::class);
    }
}
