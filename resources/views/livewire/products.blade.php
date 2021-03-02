<div class="flex flex-wrap justify-around md:justify-start">
		@foreach($products as $product)
	
		<div class="w-44 md:w-64 m-1 md:m-3  border border-gray-200 bg-gray-50 shadow-lg ">
			<div class="bg-white ">
				 <img class="object-cover w-full h-full" src="{{ Storage::url($product->photo)}}" alt="{{ $product->product_title }}">
			</div>
		   
		    <div class="mt-2 p-2">
		      <div>
		        <div class="text-xs text-gray-500 uppercase font-bold">{{ $product->category->name }}</div>
		        <div class="font-bold text-gray-700 leading-snug">
		          <a href="/products/{{ Str::slug($product->product_name) }}" class="hover:underline text-gray-800">{{ $product->product_name }}</a>
		        </div>
		        <hr>
		        <div class="flex items-center pt-2">
		        	<div class="text-sm text-gray-600"><span class="font-bold">Price</span>: &pound;{{ $product->product_price }}</div>
			        <div class="flex-grow text-right"><button wire:click="selectProduct({{ $product->id }})" class="bg-gray-800 text-xs font-semibold px-2 py-1 rounded text-white">Buy</button></div>
		        </div>
		        
		      </div>
		    </div>
		  </div>

@endforeach
</div>
