<?php

use Livewire\Livewire;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\productController;
use App\Http\Livewire\Home;
use App\Http\Livewire\About;
use App\Http\Livewire\Boxes;
use App\Http\Livewire\Box;
use App\Http\Livewire\Faq;
use App\Http\Livewire\Contact;
use App\Http\Livewire\ViewBasket;
use Illuminate\Support\Facades\Storage;
use App\Http\Livewire\Delivery;
use App\Http\Livewire\Checkout;
use App\Http\Livewire\OrderSuccess;
use App\Http\Livewire\OrderCancelled;
use App\Models\Basket;
use App\Http\Controllers\ordersController;
use App\Http\Livewire\Admin\OrderShow;
use App\Http\Controllers\stripeController;
use App\Http\Controllers\customerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', Home::class)->name('home');
Route::get('/about', About::class)->name('about');
Route::get('/products', Boxes::class)->name('products');
Route::get('/products/{product:slug}', Box::class)->name('product');
Route::get('/faq', Faq::class)->name('faq');
Route::get('/contact', Contact::class)->name('contact');

Route::get('/view-basket', ViewBasket::class)->name('viewbasket');
Route::get('/delivery', Delivery::class)->name('delivery');
Route::get('/checkout', Checkout::class)->name('checkout');



Route::prefix('/admin')->middleware(['auth:sanctum', 'verified'])->group(function(){
	Route::get('dashboard', function () {
		    return view('dashboard');
		})->name('admin.dashboard');

	Route::get('products', [productController::class,'index'])->name('admin.products');
	Route::get('products/create', [productController::class, 'create'])->name('admin.products.create');
	Route::get('products/{product}/edit', function($product){
		return view('products.edit',[
			'product' => $product
		]);
	})->name('admin.products.edit');

	Route::get('orders', [ordersController::class, 'index'])->name('admin.orders');
	Route::get('orders/{order:order_no}', function($order){
		return view('orders.show', [
			'order' => $order
		]);
	})->name('admin.orders.show');

	Route::get('customers', [customerController::class, 'index'])->name('admin.customers');
	Route::get('customers/{customer}', [customerController::class, 'show'])->name('admin.customers.show');
});




// Stripe paymet gateway setup session
Route::post('/stripe/create-checkout-session', [stripeController::class, 'index']);
Route::get('/payment/success', OrderSuccess::class)->name('success');
Route::get('/payment/cancelled', OrderCancelled::class)->name('success');

//Route::get('/products',[productController::class, 'index']);
//Route::get('/customers',[customerController::class, 'index']);

Route::get('/mail', function(){
	return view('contact.emails.message');
});