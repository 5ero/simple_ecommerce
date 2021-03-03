<div>
    <livewire:toast-messenger />

    <livewire:navbar-top />

   <div class="hidden md:block w-full h-72 bg-gray-50 border">
	        
	</div>

	<div class="grid md:grid-cols-3 gap-3 max-w-7xl">
	    <div></div>
	    <div class="md:col-span-2 border-l border-gray-200 pb-5">
	    	<div class=" mx-2 rounded bg-white">
	  			<div class="text-3xl text-gray-500 text-center py-3">
	  				<i class="fas fa-shopping-basket fa-1x mr-3"></i>Your basket
	  			</div>
	    		<div class="grid grid-cols-6 gap-2 m-3">
	    	@if($total != 0)		
	    			<div class="col-span-1"></div>
					<div class="col-span-3 font-semibold">Name</div>
					<div class="col-span-1 font-semibold text-center">Qty</div>
					<div class="col-span-1 font-semibold text-center">Total</div>
					<hr class="col-span-6 py-2">
			@endif

			@forelse($basket as $item)
					<div wire:click="removeItemFromBasket({{ $item->id }})" class="col-span-1 text-center block"><i class="fas fa-times-circle text-gray-500 pt-2 fa-xl"></i></div>
					<div class="col-span-3 text-sm">{{ $item->products[0]->product_name }} <br> @ &pound;{{ $item->price }} each</div>
					<div class="col-span-1 text-sm text-center">{{ $item->quantity }}</div>
					<div class="col-span-1 text-sm text-center">&pound;{{ number_format($item->price * $item->quantity, 2, '.','') }}</div>		
					<hr class="col-span-6">		
			@empty
					<div class="p-4 col-span-6 mt-4 text-gray-500 text-center">
						You have nothing in your basket!
						<br>
							<i class="fas fa-shopping-basket mt-10 fa-5x  text-gray-300"></i>
					</div>
			@endforelse
				</div>

				@if($total != 0)
					<div class="grid grid-cols-6 gap-2 m-3">
						<div class="col-span-5 text-right text-sm">Total:</div>
						<div class="col-span-1 text-sm text-center">&pound;{{ number_format($total, 2, '.','') }}</div>
					</div>

					<div class="text-right p-2">
						<a href="/delivery" type="button" class="px-3 py-2 bg-gray-500  text-white rounded">Delivery <i class="fas fa-arrow-right fa-xs"></i></a>
					</div>
				@endif
		</div>
	</div>
	 </div>
</div>
