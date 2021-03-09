<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Basket;
use Stripe\Stripe;
use DB;



class stripeController extends Controller
{
    public function index(Request $request)
    {
      
      $basket = Basket::where('session_id', session('_token'))->get();
   
      $items = array();
      foreach($basket as $i) {
        $items[] = 
          [
            'price_data' => [
              'currency' => 'gbp',
              'unit_amount' => $i->price*100,
              'product_data' => [
                'name' => $i->products[0]['product_name'],
                'images' =>  [ Storage::url($i->products[0]['photo']) ],
              ],
              ],
            'quantity' => $i->quantity,
            'tax_rates' => ['txr_1IQEwPBuffrI1R52ChUp2nt3'],
            ];
      }   
              

      $basket = [
        'payment_method_types' => ['card'],
          'line_items' => [
            $items,
          ],
          'mode' => 'payment',
          'success_url' => config('app.url').'/payment/success',
          'cancel_url' => config('app.url').'/payment/cancelled',
        ];
        

        $stripe = Stripe::setApiKey(config('stripe.sk'));
        $session = \Stripe\Checkout\Session::create([
            $basket
          ]);
            return response()->json($content=['id' => $session->id], $status="200");
          //return $response->withJson([ 'id' => $session->id ])->withStatus(200);
    }
}

