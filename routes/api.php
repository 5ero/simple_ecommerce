<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\productController;
use App\Http\Controllers\customerController;
use App\Http\Controllers\stripeController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Creates a product
Route::post('/products', [productController::class,'store']);

// Creates a customer
Route::post('/customer', [customerController::class, 'store']);

// Stripe paymet gateway setup session
// Route::post('/create-checkout-session', [stripeController::class, 'index']);
