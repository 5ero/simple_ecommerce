<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateProductRequest;
use App\Models\Product;

class productController extends Controller
{

	public function index()
	{
		return view('products.index');
	}

	public function create()
	{
		return view('products.create');
	}


    public function store(CreateProductRequest $request)
    {
   //  	$product = Product::updateOrCreate(
			// [
			// 'product_name' => $request['product_name'], 
   //  		'product_description' => $request['product_description']
   //  		],
   //  		[
   //  		'product_name' => $request['product_name'], 
   //  		'product_descriptio' => $request['product_description'],
   //  		'product_price' => $request['product_price'], 
   //  		'product_qty' => $request['product_qty'],
   //  		'photo' => $request['photo']
   //  		]
    //	);
    //	
    
    	$product = Product::create($request->all());

    	return $request;
    	
    }
}
