<div>
	<div class="grid md:grid-cols-5 gap-3 max-w-7xl">

		<div></div>
		
		<div class="md:col-span-4 md:border-l pr-4 md:pr-0">
			
			<div class="text-3xl p-4 bg-white text-gray-500 border-r-2 border-l-2 border-white">
				Your basket
			</div>
				
					 
					<div class="grid grid-cols-7 gap-2 m-3 items-center">
						@if($total != 0)		
								<div class="col-span-1"></div>
								<div class="col-span-1"></div>
								<div class="col-span-3 font-semibold">Name</div>
								<div class="col-span-1 font-semibold text-center">Qty</div>
								<div class="col-span-1 font-semibold text-center">Total</div>
								<hr class="col-span-7 py-2">
						@endif
			
						@forelse($basket as $item)
								<div wire:click="removeItemFromBasket({{ $item->id }})" class="col-span-1 text-center block"><i class="fas fa-times-circle text-red-400 pt-2" title="Remove {{ $item->products[0]->product_name }}"></i></div>
								<div class="col-span-1">
									<img src="{{ Storage::url($item->products[0]->photo) }}" alt="{{ $item->products[0]->product_name }}">
								</div>
								<div class="col-span-3 text-sm">{{ $item->products[0]->product_name }} <br> @ &pound;{{ $item->price }} each</div>
								<div class="col-span-1 text-sm text-center">{{ $item->quantity }}</div>
								<div class="col-span-1 text-sm text-center">&pound;{{ number_format($item->price * $item->quantity, 2, '.','') }}</div>		
								<hr class="col-span-7">		
						@empty
								<div class="p-4 col-span-7 mt-4 text-gray-500 text-center">
									You have nothing in your basket!
									<br>
										<i class="fas fa-shopping-basket mt-10 fa-5x  text-gray-300"></i>
								</div>
						@endforelse
					</div>
	
					@if($total != 0)
						<div class="grid grid-cols-7 gap-2 m-3">
							<div class="col-span-6 text-right text-sm">Vat:</div>
							<div class="col-span-1 text-sm text-center">&pound;{{ $vat }}</div>
						</div>

						<div class="grid grid-cols-7 gap-2 m-3">
							<div class="col-span-6 text-right text-sm">Total:</div>
							<div class="col-span-1 text-sm text-center">&pound;{{ $total }}</div>
						</div>
	
						<div class="text-right p-2">
							<a href="/delivery" type="button" class="px-3 py-2 bg-blue-500  text-white rounded">Delivery <i class="fas fa-arrow-right fa-xs"></i></a>
						</div>
					@endif
		</div>
	</div>
</div>

