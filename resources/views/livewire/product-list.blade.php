<div>
	<div class="p-4 text-right">
		<a href="{{ route('admin.products.create') }}" class="inline-flex justify-center items-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"><i class="fas fa-plus mr-2" ></i> Add a new product</a>
	</div>
	<hr>
	<div class="flex items-center">
		<div class="p-4 w-96">
			<label for="search">Search for products</label>
			<div class="relative">
				<div class="absolute inset-y-0 left-0 pl-3 pt-2 items-center pointer-events-none text-gray-500">
					<span>
						<i class='fas fa-search'></i>
					</span>
				</div>
				<input wire:model="search" type="search" class="block w-full pl-10 pr-3  border border-gray-300 rounded-md leading-5 bg-white placeholder-gray-500 focus:ouline-none focus:placeholder-gray-300 focus:border-blue-300 focus:shadow-outline-blue sm:text-sm transition duration-150 ease-in-out"
			placeholder="Search " autocomplete="off">
			</div>	
		</div>
		<div class="flex-1 text-right mr-4">
			<div class="pt-6 w-full">
				<label for="active" class="mr-2">Show active products</label>
					<input wire:model="active" name="active" id="active" type="checkbox" class="focus:outline-none">
			</div>
		</div>
	</div>
	
	<hr>
    @forelse($products as $product)
    	<div class="relative p-2 @if($product->active == false) bg-gray-100 @endif">
    		<div class="absolute right-2 top-2">
    			<a href="{{ route('admin.products.edit',['product' => $product->id] ) }}" class="text-sm mt-2 text-gray-600">
    				<span class="mr-2">Edit</span>
    			</a>
    		</div>
    		<table>
    			<tr>
    				<td>
    					<div class="w-40 h-40 mr-4 border border-gray-200">
    						<img src="{{ Storage::url($product->photo) }}" alt="" class="object-cover w-full h-full">
    					</div>
    				</td>
    				<td valign="top">
    					<table>
    						<tr>
    							<td class="font-semibold py-2">{{ Str::title($product->product_name) }}</td>
    						</tr>
    						<tr>
    							<td class="py-2">{{ Str::limit($product->product_description, 100) }}</td>
    						</tr>
    						
    						<tr>
    							<td class="py-2">Price: &pound{{ $product->product_price }}</td>
    						</tr>
							<tr>
    							<td class="py-2">
    									<span class="@if($product->product_qty <= 50) bg-red-500 text-white px-2 rounded font-semibold @elseif($product->product_qty > 50 && $product->product_qty <= 100) bg-yellow-500 text-white px-2 rounded font-semibold @else bg-green-500 text-white px-2 rounded font-semibold @endif">
    										Quantity: {{ $product->product_qty }}
    									</span>
    							</td>
    						</tr>
    					</table>
    				</td>
    			</tr>
    		</table>
    		
    		
    	</div>
    	<hr>
    @empty
    	<p class="p-4">
    		No products found!
    	</p>
    @endforelse
    <div class="py-4 px-2">
    	{{ $products->links() }}
    </div>
</div>
