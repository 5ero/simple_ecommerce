
<div>
	    <div class="grid md:grid-cols-5 gap-3 max-w-7xl">

			<div></div>
	    	
	        <div class="md:col-span-4 md:border-l">
				
				<div class="text-3xl p-4 bg-white text-gray-600 border-r-2 border-l-2 border-white">
					{{ $product->product_name }}
				</div>
				<div class="md:flex">
                    <div class="md:w-96 m-4">
                        <img src="{{ Storage::url($product->photo) }}" alt="" class="object-cover">
                    </div>
                   
                    <div class="p-4 leading-8">
            
                        <p>
                            {{ $product->product_description }}
                        </p>
    
                        
                        <br>

                        <span class="font-semibold">Stock</span>: 
                        @if($product->product_qty < 100)
                            <span class="text-white bg-yellow-600 px-2 text-sm rounded">Low</span>
                            Hurry selling fast, 
                            only {{ $product->product_qty }} left. <br>
                        @elseif($product->product_qty < 5) 
                            <span class="text-white bg-red-600 px-2 text-sm rounded">Out of stock</span>
                            <br>
                        @elseif($product->product_qty > 100 ) 
                            <span class="text-white bg-green-600 px-2 text-sm rounded">Healthy</span>
                            <br>
                        @endif

                        <span class="font-semibold text-gray-500 text-lg leading-tight">Price: &pound;{{ App\Helpers\Money::money($product->product_price) }} each.</span>
                    
                         <span class="text-gray-400 text-sm ">Prices shown are ex Vat.</span>       <br>
                        <hr>

                        <div class="mb-1">
                            Choose a quantity: <br>
                            <div class="flex items-center">
                                <input wire:model="qty" id="qty" wire:key="qty"  pattern="[0-9]*" type="text" name="qty" class="text-sm w-16 border border-gray-200 mr-1">
                                <button wire:click="decrement" @if($qty == 0) disabled @endif wire:key="increment" class="w-10 h-10 rounded bg-gray-200 text-2xl m-1 border border-gray-300">-</button>
                                <button wire:click="increment"  wire:key="decrement" class="w-10 h-10 rounded bg-gray-200 text-2xl m-1 border border-gray-300">+</button>
                           
                            </div>
                        </div>
                        <x-input.button wire:click="addtobasket" label="Add to basket"/>
                 
                </div>
                

	        </div>
	    </div>
    </div>
</div>