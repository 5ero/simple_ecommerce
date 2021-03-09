
<div>
	<div class="bg-gray-100 p-4 shadow-md border-t border-b border-r">
	Sort by: <select wire:model="sortDirection" wire:change="sort" name="sortDirection" id="sortDirection" class="border-gray-300 focus:outline-none ml-2">
				<option value="asc">Default</option>
				<option value="asc">Price low to high</option>
				<option value="desc">Price high to low</option>
			</select>
	</div>

	<div class="flex flex-wrap justify-around md:justify-start md:p-5 bg-white">
			@forelse($products as $product)
		
			<div wire:loading.class.delay="opacity-50" class="w-44 md:w-64 m-1 md:m-5   border border-gray-300 bg-gray-50 shadow-lg ">
				<div class="bg-white shadow-md ">
					<img class="object-cover w-full h-full " src="{{ Storage::url($product->photo)}}" alt="{{ $product->product_title }}">
				</div>
			
				<div class="mt-2 p-2">
				<div>
					<div class="text-xs text-gray-500 uppercase font-bold">{{  $product->category->name }}</div>
					<div class="font-bold text-gray-700 leading-snug">
					<a href="{{ route('product', Str::slug($product->product_name)) }}" class="hover:underline text-blue-800">{{ $product->product_name }}</a>
					</div>
					<div class="text-gray-500 text-sm pb-1"><span class="font-bold">Size</span>: 370 x 370 x 250</div>
					<hr>
					<div class="flex items-center pt-2">
						<div class="text-sm text-gray-600"><span class="font-bold">Price</span>: &pound;{{ $product->product_price }}</div>
						<div class="flex-grow text-right"><button wire:click="selectProduct({{ $product->id }})" class="bg-blue-500 text-xs font-semibold px-2 py-1 rounded text-white">Buy</button></div>
					</div>
					
				</div>
				</div>
			</div>
			@empty 
				No products available
	@endforelse
	</div>
</div>