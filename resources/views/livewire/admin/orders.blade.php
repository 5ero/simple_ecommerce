<div>
	<div class="p-4 text-right">
        Orders
    </div>
	<hr>
	<div class="flex items-center">
		<div class="p-4 w-96">
			<label for="search">Search for orders</label>
			<div class="relative mt-1">
				<div class="absolute inset-y-0 left-0 pl-3 pt-3 items-center pointer-events-none text-gray-500">
					<span>
						<i class='fas fa-search'></i>
					</span>
				</div>
				<input wire:model="search" type="search" class="block w-full pl-10 pr-3  border border-gray-300 rounded-md leading-5 bg-white placeholder-gray-500 focus:ouline-none focus:placeholder-gray-300 focus:border-blue-300 focus:shadow-outline-blue sm:text-sm transition duration-150 ease-in-out"
			placeholder="Order Number" autocomplete="off">
			</div>	
		</div>
		<div class="flex-1 text-right mr-4">
			<div class="pt-6 w-full">
				<label for="active" class="mr-2">Orders to be shipped</label>
					<input wire:model="toBeShipped" name="toBeShipped" id="toBeShipped" type="checkbox" class="focus:outline-none">
			</div>
		</div>
	</div>
	
	<hr>
    <table class="table w-full m-3 text-gray-600 font-semibold">
        <tr>
            <th>Order Number</th>
            <th>Customer Name</th>
            <th>Products Ordered</th>
            <th>Order Value</th>
            <th>Date Ordered</th>
        </tr>
        @forelse($orders as $order)
            <tr class="text-center border-b">
                <td class="py-8">
                    <a href="{{ route('admin.orders.show',['order' => $order->order_no]) }}" class="text-blue-500 underline">{{ $order->order_no }}</a>
                </td>
                <td>
                    {{ $order->customer->name }}
                </td>
                <td>
                    <table class="table-auto w-full">
                        @foreach($order->products as $products)
                            <tr class="text-left">
                                <td class="py-1">
                                    {{ $products['product'] }} @ &pound;{{ $products['product_price'] }} each
                                </td>
                                <td>
                                   x {{ $products['product_qty'] }}
                                </td>
                                <td>
                                    &pound;{{ number_format($products['product_price']*$products['product_qty'], 2, '.' ,'') }}
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </td>
                <td>&pound;{{ $order->order_value }}</td>
                <td>{{ \Carbon\Carbon::parse($order->created_at)->diffForHumans() }}</td>
                    
            </tr>
        @empty 
            <tr>
                <td colspan="5">
                    No orders!
                </td>
            </tr>
        @endforelse
    </table>
   
    <div class="py-4 px-2">
    	{{ $orders->links() }}
    </div>
</div>
