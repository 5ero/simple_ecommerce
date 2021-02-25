<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCustomerRequest;
use Illuminate\Http\Request;
use App\Models\Customer;

class customerController extends Controller
{

	public function index(){
		$customer = Customer::all();
		return $customer;
	}

    public function store(CreateCustomerRequest $request)
    {
    	$customer = Customer::updateOrCreate(
    		[
    			'email' =>$request['email']
    		],
    		[
    			'name' => $request['name'],
    			'address_1' => $request['address_1'],
    			'address_2' => $request['address_2'],
    			'address_3' => $request['address_3'],
    			'city' => $request['city'],
    			'county' => $request['county'],
    			'postcode' => $request['postcode'],
    			'telephone' => $request['telephone'],
    			'email' => $request['email']
    		]
    	);

    	return redirect('/customers');
    }
}
