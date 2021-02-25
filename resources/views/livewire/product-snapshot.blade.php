<div>
<table class="table-auto w-full text-sm text-gray-500 mt-2">
	<tr>
		<th class="text-left p-2">
			Name
		</th>
		<th class="text-left p-2">
			Quantity
		</th>
	</tr>

	@foreach($products as $product)
	<tr>
		<td class="p-2">
		
			<a href="{{ route('admin.products.edit', ['product' => $product->id ]) }}">{{ $product->product_name }}</a>
		
  		</td>
		<td class="p-2">
			@php
				$class = '';
				$class = $product->product_qty < 300 ? 'p-1 bg-yellow-600 text-white font-semibold rounded' : $class;
				$class = $product->product_qty < 100 ? 'p-1 bg-red-600 text-white font-semibold rounded' : $class;	
			@endphp

				<a href="/products/{{ $product->id}}/edit" class="{{ $class }}">{{ $product->product_qty }}</a>
				
				
		</td>
	</tr>
	@endforeach

</table>

</div>
